<?php

namespace App\Controllers;

use App\Models\SupplierPJModel;
use CodeIgniter\RESTful\ResourcePresenter;
use Myth\Auth\Models\PermissionModel;

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
        $permissionModel = new PermissionModel();
        $id_supplier = $this->request->getPost('id_supplier');

        $data = [
            'id_supplier' => $this->request->getPost('id_supplier'),
            'id_user' => $this->request->getPost('id_user'),
            'urutan' => $this->request->getPost('urutan'),
        ];
        $modelSupplierPJ->save($data);
        $permissionModel->addPermissionToUser(11, intval($this->request->getPost('id_user')));

        session()->setFlashdata('pesan', 'Penanggung Jawab berhasil ditambahkan.');

        return redirect()->to('/supplier/' . $id_supplier . '/edit');
    }


    public function edit($id = null)
    {
        $modelSupplierPJ = new SupplierPJModel();
        echo json_encode($modelSupplierPJ->find($id));
    }


    public function update($id = null)
    {
        $modelSupplierPJ = new SupplierPJModel();
        $id_supplier = $this->request->getPost('id_supplier');

        $data = [
            'id'            => $id,
            'urutan'        => $this->request->getPost('edit-urutan'),
        ];
        $modelSupplierPJ->save($data);

        session()->setFlashdata('pesan', 'Penanggung Jawab berhasil diedit.');

        return redirect()->to('/supplier/' . $id_supplier . '/edit');
    }


    public function remove($id = null)
    {
        //
    }


    public function delete($id = null)
    {
        $id_supplier = $this->request->getPost('id_supplier');
        $permissionModel = new PermissionModel();

        $modelSupplierPJ = new SupplierPJModel();
        $penanggungjawab = $modelSupplierPJ->find($id);

        $permissionModel->removePermissionFromUser(intval(11), intval($penanggungjawab['id_user']));

        $modelSupplierPJ->delete($id);


        session()->setFlashdata('pesan', 'Penanggung Jawab berhasil dihapus.');
        return redirect()->to('/supplier/' . $id_supplier . '/edit');
    }
}
