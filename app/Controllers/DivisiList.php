<?php

namespace App\Controllers;
use App\Models\KaryawanModel;
use App\Models\DivisiModel;
use CodeIgniter\RESTful\ResourceController;


class DivisiList extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index($id_divisi = null)
    {
        $modelKaryawan = new KaryawanModel();
        $modelDivisi = new DivisiModel();
        $karyawan = $modelKaryawan->select('karyawan.nama_lengkap, karyawan.jabatan, karyawan.pendidikan, karyawan.no_telp, karyawan.email')
            ->join('divisi', 'divisi.id = karyawan.id_divisi')
            ->where('divisi.id', $id_divisi)
            ->findAll();
        $data = [
            'karyawan' => $karyawan
        ];
        return view('divisi/list/index', $data);
    }


    public function getDataList($id_divisi=null)
    {
        if ($this->request->isAJAX()) {

            $modelKaryawan = new KaryawanModel();
            $modelDivisi = new DivisiModel();
            $karyawan = $modelKaryawan->select('karyawan.nama_lengkap, karyawan.jabatan, karyawan.pendidikan, karyawan.no_telp, karyawan.email')
            ->join('divisi', 'divisi.id = karyawan.id_divisi')
            ->where('divisi.id', $id_divisi)
            ->findAll();
                                

            return DataTable::of($data)
                ->addNumbering('no')
                ->add('aksi', function ($row) {
                    return '
                    <a title="Detail" class="px-2 py-0 btn btn-sm btn-outline-dark" onclick="showModalDetail(' . $row->id . ')">
                        <i class="fa-fw fa-solid fa-magnifying-glass"></i>
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

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
