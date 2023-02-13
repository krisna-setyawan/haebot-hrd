<?php

namespace App\Controllers;

use App\Models\SupplierPJModel;
use CodeIgniter\RESTful\ResourcePresenter;

class SupplierPJ extends ResourcePresenter
{
    public function index()
    {
        //
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
        $modelSupplierPJ = new SupplierPJModel();
        $id_supplier = $this->request->getPost('id_supplier');

        $data = [
            'id_supplier' => $this->request->getPost('id_supplier'),
            'id_user' => $this->request->getPost('id_user'),
            'urutan' => $this->request->getPost('urutan'),
        ];
        $modelSupplierPJ->save($data);

        session()->setFlashdata('pesan', 'Penanggung Jawab berhasil ditambahkan.');

        return redirect()->to('/supplier/' . $id_supplier);
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
        //
    }
}
