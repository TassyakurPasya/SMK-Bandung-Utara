<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pinjaman extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
         $this->PinjamanModel = new \App\Models\PinjamanModel();
    }

    public $controller = 'Pinjaman';
    public function index()
    {
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            'data' => $this->$model->findAll(),
        ];
        return view($this->controller . '/index', $data);
    }
    public function tambah()
    {
        $data = [
            'judul' => $this->controller,
            'aksi' => ' / Tambah Data',
            'validation' => \Config\Services::validation(),
        ];
        return view($this->controller . '/tambah', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'nama_peminjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data Tidak Boleh Kosong !',                    
                ]
            ]
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';        
        $pieces = explode("/", $this->request->getVar('tgl_meminjam'));
        $tgl_meminjam = $pieces[2] . '-' . $pieces[1] . '-' . $pieces[0];

        $tglpengembalian = date('Y-m-d', strtotime('+3 days', strtotime($tgl_meminjam))); // penjumlahan tanggal sebanyak 7 hari.        
        $this->$model->save([
            'nama_peminjam' => $this->request->getVar('nama_peminjam'),
            'alamat_peminjam' => $this->request->getVar('alamat_peminjam'),
            'telp' => $this->request->getVar('telp'),
            'tanggal_meminjam' => $tgl_meminjam,
            'tanggal_pengembalian' => $tglpengembalian,
            'status_pinjaman' => 0,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/' . $this->controller);
    }
    public function edit($id)
    {
        $model = $this->controller . 'Model';
        $data = [
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
        if (!$this->validate([
            'nama_peminjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data Tidak Boleh Kosong !',                    
                ]
            ]
        ])) {        
            return redirect()->to('/' . $this->controller . '/edit')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'id_pinjaman' => $id,
            'nama_peminjam' => $this->request->getVar('nama_peminjam'),
            'alamat_peminjam' => $this->request->getVar('alamat_peminjam'),
            'telp' => $this->request->getVar('telp'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/' . $this->controller);
    }
    public function delete()
    {
        $model = $this->controller . 'Model';
        $id = $this->request->getVar('id');
        $this->$model->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/' . $this->controller);
    }
}
