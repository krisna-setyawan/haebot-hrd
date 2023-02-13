<?php

namespace App\Controllers;

use App\Models\ProvinsiModel;
use App\Models\SupplierAlamatModel;
use App\Models\SupplierLinkModel;
use App\Models\SupplierModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Supplier extends ResourcePresenter
{
    protected $helpers = ['form'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $modelSupplier = new SupplierModel();
        $supplier = $modelSupplier->getSuppliers();

        $data = [
            'supplier' => $supplier
        ];

        return view('data_master/supplier/index', $data);
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
        $modelSupplier = new SupplierModel();
        $modelSupplierAlamat = new SupplierAlamatModel();
        $modelSupplierLink = new SupplierLinkModel();
        $modelProvinsi = new ProvinsiModel();

        $supplier = $modelSupplier->find($id);
        $alamat = $modelSupplierAlamat->getAlamatBySupplier($id);
        $link = $modelSupplierLink->where(['id_supplier' => $id])->findAll();
        $provinsi = $modelProvinsi->orderBy('nama')->findAll();

        $data = [
            'supplier' => $supplier,
            'alamat' => $alamat,
            'link' => $link,
            'provinsi' => $provinsi
        ];

        // dd($data);
        return view('data_master/supplier/show', $data);
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        $data = ['validation' => \Config\Services::validation()];
        return view('data_master/supplier/add', $data);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        $validasi = [
            'nama' => [
                'rules' => 'required|is_unique[supplier.nama]',
                'errors' => [
                    'required' => '{field} supplier harus diisi.',
                    'is_unique' => 'nama supplier sudah ada dalam database.'
                ]
            ],
            'pemilik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} supplier harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} supplier harus diisi.',
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No telepon supplier harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/supplier/new')->withInput();
        }

        $modelSupplier = new SupplierModel();

        $slug = url_title($this->request->getPost('nama'), '-', true);

        $data = [
            'nama' => $this->request->getPost('nama'),
            'slug' => $slug,
            'pemilik' => $this->request->getPost('pemilik'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
        ];
        $modelSupplier->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/supplier');
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
        $modelSupplier = new SupplierModel();

        $data = [
            'validation' => \Config\Services::validation(),
            'supplier' => $modelSupplier->where(['id' => $id])->first()
        ];

        return view('data_master/supplier/edit', $data);
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
        $modelSupplier = new SupplierModel();
        $old_supplier = $modelSupplier->find($id);

        if ($old_supplier['nama'] == $this->request->getPost('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[supplier.nama]';
        }

        $validasi = [
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} supplier harus diisi.',
                    'is_unique' => 'nama supplier sudah ada dalam database.'
                ]
            ],
            'pemilik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} supplier harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} supplier harus diisi.',
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No telepon supplier harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/supplier/' . $old_supplier["id"] . '/edit')->withInput();
        }

        $slug = url_title($this->request->getPost('nama'), '-', true);

        $data = [
            'id'        => $id,
            'nama'      => $this->request->getPost('nama'),
            'slug'      => $slug,
            'pemilik'   => $this->request->getPost('pemilik'),
            'alamat'    => $this->request->getPost('alamat'),
            'no_telp'   => $this->request->getPost('no_telp'),
        ];
        $modelSupplier->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');

        return redirect()->to('/supplier');
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
        $modelSupplier = new SupplierModel();

        $modelSupplier->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/supplier');
    }
}
