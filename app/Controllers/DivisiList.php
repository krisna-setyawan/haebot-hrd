<?php

namespace App\Controllers;
use App\Models\KaryawanModel;
use App\Models\DivisiModel;
use App\Models\UserModel;
use Myth\Auth\Password;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\RESTful\ResourceController;


class DivisiList extends ResourceController
{


    public function index($id_divisi = null)
    {
        $modelKaryawan = new KaryawanModel();
        $modelDivisi = new DivisiModel();
        $karyawan = $modelKaryawan
            ->select('karyawan.id ,karyawan.nama_lengkap, karyawan.jabatan, karyawan.pendidikan, karyawan.no_telp, karyawan.email')
            ->join('divisi', 'divisi.id = karyawan.id_divisi')
            ->where('divisi.id', $id_divisi)
            ->findAll();
        $data = [
            'karyawan' => $karyawan
        ];
        return view('divisi/list/index', $data);
    }


    // public function getDataList($id_divisi=null)
    // {
    //     if ($this->request->isAJAX()) {

    //         $modelKaryawan = new KaryawanModel();
    //         $modelDivisi = new DivisiModel();
    //         $karyawan = $modelKaryawan->select('karyawan.id, karyawan.nama_lengkap, karyawan.jabatan, karyawan.pendidikan, karyawan.no_telp, karyawan.email')
    //         ->join('divisi', 'divisi.id = karyawan.id_divisi')
    //         ->where('divisi.id', $id_divisi)
    //         ->findAll();
                                

    //         return DataTable::of($data)
    //             ->addNumbering('no')
    //             ->add('aksi', function ($row) {
    //                 return '
    //                 <a title="Detail" class="px-2 py-0 btn btn-sm btn-outline-dark" onclick="showModalDetail(' . $row->id . ')">
    //                     <i class="fa-fw fa-solid fa-magnifying-glass"></i>
    //                 </a>

    //                 <form id="form_delete" method="POST" class="d-inline">
    //                     ' . csrf_field() . '
    //                     <input type="hidden" name="_method" value="DELETE">
    //                 </form>
    //                 <button onclick="confirm_delete(' . $row->id . ')" title="Hapus" type="button" class="px-2 py-0 btn btn-sm btn-outline-danger"><i class="fa-fw fa-solid fa-trash"></i></button>
    //                 ';
    //             }, 'last')
    //             ->toJson(true);
    //     } else {
    //         return "Tidak bisa load data.";
    //     }
    // }


    public function show($id = null)
    {
        if ($this->request->isAJAX()) {
            $modelKaryawan = new KaryawanModel();
            $karyawan      = $modelKaryawan->find($id);

            $data = [
                'karyawan' => $karyawan,
            ];
            $json = [
                'data' => view('divisi/list/show', $data),
            ];

            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
    }

    
    public function new()
    {
        if ($this->request->isAJAX()) {

            $modelKaryawan = new KaryawanModel();
            $karyawan = $modelKaryawan->where(['id_divisi' => null])->findAll();

            $data = [
                'karyawan'        => $karyawan,
            ];

            $json = [
                'data'          => view('divisi/list/add', $data),
            ];

            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
    }

    
    public function create()
    {
        if ($this->request->isAJAX()) {
            $modelKaryawan = new KaryawanModel();
            $modelDivisi = new DivisiModel();
            $data = [
                'id_karyawan' => $modelKaryawan->getInsertID(),
            ];
            return json_encode($data);
        } else {
            return 'Tidak bisa load';
        }
    }

    
    public function edit($id = null)
    {
        //
    }

    
    public function update($id = null)
    {
        //
    }

    
    public function delete($id = null)
    {
        //
    }
}
