<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Buku extends BaseController
{
    // model yang dibutuhkan
    // protected $userModel;
    public function __construct()
    {
    $this->bukuModel = new \App\Models\BukuModel();
    }

    public $controller = 'buku';
    public function index()
    {        
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            // 'data' => $this->$model->findAll(),
             'data' => $this->$model->findAll(),
        ];        
        return view($this->controller . '/index', $data);
    }
    public function exportword()
    {        
        $model = $this->controller . 'Model';
        $data = [
            'judul' => $this->controller,
            // 'data' => $this->$model->findAll(),
             'data' => $this->$model->findAll(),
        ];        
        return view($this->controller . '/exportword', $data);
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
            'kode_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data Tidak Boleh Kosong !',                    
                ]
                ],
                'judul_buku' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Data Tidak Boleh Kosong !',                    
                    ]
                    ],
                    'kategori_buku' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Data Tidak Boleh Kosong !',                    
                        ]
                        ],
                        'stock_buku' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Data Tidak Boleh Kosong !',                    
                            ]
                            ],
                            'tahun_buku' => [
                                'rules' => 'required',
                                'errors' => [
                                    'required' => 'Data Tidak Boleh Kosong !',                    
                                ]
                            ]    
        ])) {
            return redirect()->to('/' . $this->controller . '/tambah')->withInput();
        };
        $model = $this->controller . 'Model';
        $this->$model->save([
            'kode_buku' => $this->request->getVar('kode_buku'),
            'judul_buku' => $this->request->getVar('judul_buku'),
            'kategori_buku' => $this->request->getVar('kategori_buku'),
            'stock_buku' => $this->request->getVar('stock_buku'),
            'tahun_buku' => $this->request->getVar('tahun_buku'),
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
        // if (!$this->validate([
        //     'kode_buku' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Data Tidak Boleh Kosong !',                    
        //         ]
        //         ],
        //         'judul_buku' => [
        //             'rules' => 'required',
        //             'errors' => [
        //                 'required' => 'Data Tidak Boleh Kosong !',                    
        //             ]
        //             ],
        //             'kategori_buku' => [
        //                 'rules' => 'required',
        //                 'errors' => [
        //                     'required' => 'Data Tidak Boleh Kosong !',                    
        //                 ]
        //                 ],
        //                 'stock_buku' => [
        //                     'rules' => 'required',
        //                     'errors' => [
        //                         'required' => 'Data Tidak Boleh Kosong !',                    
        //                     ]
        //                     ],
        //                     'tahun_buku' => [
        //                         'rules' => 'required',
        //                         'errors' => [
        //                             'required' => 'Data Tidak Boleh Kosong !',                    
        //                         ]
        //                     ]    
        // ])) {       
        //     return redirect()->to('/' . $this->controller . '/edit')->withInput();
        // };
        $model = $this->controller . 'Model';        
        $this->$model->save([
            'id_buku' => $id,
            'kode_buku' => $this->request->getVar('kode_buku'),
            'judul_buku' => $this->request->getVar('judul_buku'),
            'kategori_buku' => $this->request->getVar('kategori_buku'),
            'stock_buku' => $this->request->getVar('stock_buku'),
            'tahun_buku' => $this->request->getVar('tahun_buku'),
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
