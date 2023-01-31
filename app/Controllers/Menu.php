<?php

namespace App\Controllers;

class Menu extends BaseController
{
    public function Data_master()
    {
        return view('menu_data_master');
    }

    public function Pembelian()
    {
        return view('menu_pembelian');
    }

    public function Produksi()
    {
        return view('menu_produksi');
    }

    public function Penjualan()
    {
        return view('menu_penjualan');
    }

    public function Akuntansi()
    {
        return view('menu_akuntansi');
    }

    public function SDM()
    {
        return view('menu_sdm');
    }

    public function Laporan()
    {
        return view('menu_laporan');
    }
}
