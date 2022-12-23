<?php

namespace App\Controllers;

use \Config\Services\session;


class Dashboard extends BaseController
{
    public function __construct()
    {
        // $this->PinjamanDetailModel = new \App\Models\PinjamanDetailModel();
        //  $this->PinjamanModel = new \App\Models\PinjamanModel();
        //  $this->BukuModel = new \App\Models\BukuModel();
    }
    public function index()
    {
        // $data = [            
        //     'dataBuku' => $this->BukuModel->findAll(),
        //     'dataPinjamanSelesai' => $this->PinjamanModel->where('status_pinjaman',1)->findAll(),
        //     'dataPinjamanBerjalan' => $this->PinjamanModel->where('status_pinjaman',0)->findAll(),
        // ];

        return view('/Dashboard/index');
    }
    public function Pengeluaran()
    {
    }
}