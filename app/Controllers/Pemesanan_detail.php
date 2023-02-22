<?php

namespace App\Controllers;

use App\Models\PemesananDetailModel;
use App\Models\PemesananModel;
use App\Models\ProdukModel;
use App\Models\SupplierModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Pemesanan_detail extends ResourcePresenter
{

    public function index()
    {
    }


    public function List_pemesanan($no_pemesanan)
    {
        $modelSupplier = new SupplierModel();
        $supplier = $modelSupplier->findAll();
        $modelProduk = new ProdukModel();
        $produk = $modelProduk->findAll();

        $pemesananModel = new PemesananModel();
        $data = [
            'pemesanan'             => $pemesananModel->getPemesanan($no_pemesanan),
            'supplier'              => $supplier,
            'produk'                => $produk,
        ];
        return view('pembelian/pemesanan/detail', $data);
    }

    public function getListProdukPemesanan()
    {
        if ($this->request->isAJAX()) {

            $id_pemesanan = $this->request->getVar('id_pemesanan');

            $modelPemesananDetail = new PemesananDetailModel();
            $produk_pemesanan = $modelPemesananDetail->getListProdukPemesanan($id_pemesanan);

            if ($produk_pemesanan) {
                $data = [
                    'produk_pemesanan'      => $produk_pemesanan,
                ];

                $json = [
                    'list' => view('pembelian/pemesanan/list_produk', $data),
                ];
            } else {
                $json = [
                    'list' => '<tr><td colspan="7" class="text-center">Belum ada list Produk.</td></tr>',
                ];
            }

            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
    }


    public function show($id = null)
    {
    }


    public function new()
    {
    }


    public function create()
    {
        $id_produk = $this->request->getPost('id_produk');
        $id_pemesanan = $this->request->getPost('id_pemesanan');

        $modelProduk = new ProdukModel();
        $produk = $modelProduk->find($id_produk);

        $modelPemesananDetail = new PemesananDetailModel();
        $cek_produk = $modelPemesananDetail->where(['id_produk' => $id_produk, 'id_pemesanan' => $id_pemesanan])->first();

        if ($cek_produk) {
            $data_update = [
                'id'                    => $cek_produk['id'],
                'id_pemesanan'          => $id_pemesanan,
                'id_produk'             => $this->request->getPost('id_produk'),
                'qty'                   => $cek_produk['qty'] + $this->request->getPost('qty'),
                'harga_satuan'          => $produk['harga_beli'],
                'total_harga_produk'    => $cek_produk['total_harga_produk'] + ($produk['harga_beli'] * $this->request->getPost('qty')),
            ];
            $modelPemesananDetail->save($data_update);
        } else {
            $data = [
                'id_pemesanan'          => $id_pemesanan,
                'id_produk'             => $this->request->getPost('id_produk'),
                'qty'                   => $this->request->getPost('qty'),
                'harga_satuan'          => $produk['harga_beli'],
                'total_harga_produk'    => ($produk['harga_beli'] * $this->request->getPost('qty')),
            ];
            $modelPemesananDetail->save($data);
        }

        $json = [
            'notif' => 'Berhasil menambah list produk pemesanan',
        ];

        echo json_encode($json);
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
        $id_pemesanan = $this->request->getPost('id_pemesanan');

        $modelPemesananDetail = new PemesananDetailModel();

        $modelPemesananDetail->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/list_pemesanan/' . $id_pemesanan);
    }
}
