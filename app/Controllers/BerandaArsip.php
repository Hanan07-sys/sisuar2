<?php

namespace App\Controllers;

class BerandaArsip extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SISUAR',
            'konten' => 'Selamat datang di beranda'
        ];
        return view('arsip/dashboardarsip.php', $data);
    }
}
