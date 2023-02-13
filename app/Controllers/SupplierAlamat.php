<?php

namespace App\Controllers;

use App\Models\SupplierAlamatModel;
use CodeIgniter\RESTful\ResourcePresenter;

class SupplierAlamat extends ResourcePresenter
{
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * Present a view to present a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $modelSupplierAlamat = new SupplierAlamatModel();
        $id_supplier = $this->request->getPost('id_supplier');

        $data = [
            'id_supplier' => $this->request->getPost('id_supplier'),
            'nama' => $this->request->getPost('nama'),
            'id_provinsi' => $this->request->getPost('id_provinsi'),
            'id_kota' => $this->request->getPost('id_kota'),
            'id_kecamatan' => $this->request->getPost('id_kecamatan'),
            'id_kelurahan' => $this->request->getPost('id_kelurahan'),
            'detail_alamat' => $this->request->getPost('detail_alamat'),
        ];
        $modelSupplierAlamat->save($data);

        session()->setFlashdata('pesan', 'Alamat Baru berhasil ditambahkan.');

        return redirect()->to('/supplier/' . $id_supplier);
    }

    /**
     * Present a view to edit the properties of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Present a view to confirm the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
