<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PinjamanDetail extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
         $this->PinjamanDetailModel = new \App\Models\PinjamanDetailModel();
         $this->PinjamanModel = new \App\Models\PinjamanModel();
         $this->BukuModel = new \App\Models\BukuModel();
    }

    public $controller = 'PinjamanDetail';
    public function index($id)
    {        
        $data = [            
            'aksi' => ' / Detail Data',
            'dataMain' => $this->PinjamanModel->getData($id),
            'data' => $this->PinjamanDetailModel->getPinjaman($id),
            
        ];
        
        return view($this->controller . '/index', $data);
    }
    public function tambah($id)
    {
        $data = [
            'id_pinjaman' => $id,
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
            'databuku' => $this->BukuModel->where('stock_buku != 0')->findAll()
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'id_pinjaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data tidak boleh kosong !',                    
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';

        // tambah pinjaman detail
        $this->$model->save([
            'id_pinjaman' => $this->request->getVar('id_pinjaman'),
            'id_buku' => $this->request->getVar('id_buku'),
            'status_buku' => 0,            
        ]);

        // mengurangi stock 
        $stock_sebelum = $this->BukuModel->where('id_buku',$this->request->getVar('id_buku'))->findColumn('stock_buku')[0];
        $stock_setelah = $stock_sebelum - 1 ;

        $this->BukuModel->save([
            'id_buku' => $this->request->getVar('id_buku'),
            'stock_buku' => $stock_setelah,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller . '/index/'. $this->request->getVar('id_pinjaman'));
    }
    public function edit($id)
    {
        $id_pinjaman = $this->PinjamanDetailModel->where('id_pinjaman_detail', $id)->findColumn('id_pinjaman')[0];        
        $model = $this->controller . 'Model';
        $data = [
            'id_pinjaman' => $id_pinjaman,
            'id_pinjaman_detail' => $id,
            'judul' => $this->controller,
            'aksi' => ' / Ubah Data',
            'validation' => \Config\Services::validation(),
            'data'  => $this->$model->getData($id),
        ];
        return view('/' . $this->controller . '/ubah', $data);                
    }
    public function update($id)
    {
        //Validasi        
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_pinjaman_detail' => $id,            
            'status_buku' => $this->request->getVar('status_buku'),
        ]);

        $stock_sebelum = $this->BukuModel->where('id_buku',$this->request->getVar('id_buku'))->findColumn('stock_buku')[0];
        $stock_setelah = $stock_sebelum + 1 ;

        $this->BukuModel->save([
            'id_buku' => $this->request->getVar('id_buku'),
            'stock_buku' => $stock_setelah,
        ]);

        $id_pinjaman = $this->request->getVar('id_pinjaman');   
        $statusPinjaman = $this->PinjamanDetailModel->GetStatus($id_pinjaman)[0]['status_buku'];    
        if ((int)$statusPinjaman == 1) {
            $this->PinjamanModel->save([
                'id_pinjaman' => $id_pinjaman,
                'status_pinjaman' => 1
            ]);
        };

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller . '/index/' . $this->request->getVar('id_pinjaman'));
    }
    public function delete()
    {
        $model = $this->controller . 'Model';
        $id = $this->request->getVar('id_pinjaman_detail');
        $id_po = $this->request->getVar('id_pinjaman');
        $this->$model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller . '/index/' . $id_po);
    }
}
