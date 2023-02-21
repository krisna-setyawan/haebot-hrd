<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use CodeIgniter\RESTful\ResourcePresenter;
use \Hermawan\DataTables\DataTable;

class Pemesanan extends ResourcePresenter
{
    public function index()
    {
        return view('pembelian/pemesanan/index');
    }


    public function getDataPemesanan()
    {
        if ($this->request->isAJAX()) {

            $modelPemesanan = new PemesananModel();
            $data = $modelPemesanan->where(['deleted_at' => null])->select('id, nama, tipe, harga_beli, harga_jual, stok');

            return DataTable::of($data)
                ->addNumbering('no')
                ->add('aksi', function ($row) {
                    return '
                    <a title="Detail" class="px-2 py-0 btn btn-sm btn-outline-dark" onclick="showModalDetail(' . $row->id . ')">
                        <i class="fa-fw fa-solid fa-magnifying-glass"></i>
                    </a>

                    <a title="Edit" class="px-2 py-0 btn btn-sm btn-outline-primary" href="' . site_url() . 'produk/' . $row->id . '/edit">
                        <i class="fa-fw fa-solid fa-pen"></i>
                    </a>

                    <form id="form_delete" method="POST" class="d-inline">
                        ' . csrf_field() . '
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                    <button onclick="confirm_delete(' . $row->id . ')" title="Hapus" type="button" class="px-2 py-0 btn btn-sm btn-outline-danger"><i class="fa-fw fa-solid fa-trash"></i></button>
                    ';
                }, 'last')
                ->toJson(true);
        } else {
            return "Tidak bisa load data.";
        }
    }


    public function show($id = null)
    {
        //
    }


    public function new()
    {
        //
    }


    public function create()
    {
    }


    public function edit($id = null)
    {
        //
    }


    public function update($id = null)
    {
        //
    }


    public function remove($id = null)
    {
        //
    }


    public function delete($id = null)
    {
    }
}
