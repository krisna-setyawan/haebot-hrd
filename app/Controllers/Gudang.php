<?php

namespace App\Controllers;

use App\Models\GudangModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Gudang extends ResourcePresenter
{
    protected $helpers = ['form'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $modelGudang = new GudangModel();
        $gudang = $modelGudang->findAll();

        $data = [
            'gudang' => $gudang
        ];

        return view('data_master/gudang/index', $data);
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
        $data = ['validation' => \Config\Services::validation()];
        return view('data_master/gudang/add', $data);
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
                'rules' => 'required|is_unique[gudang.nama]',
                'errors' => [
                    'required' => '{field} gudang harus diisi.',
                    'is_unique' => 'nama gudang sudah ada dalam database.'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} gudang harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/gudang/new')->withInput();
        }

        $modelGudang = new GudangModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];
        $modelGudang->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/gudang');
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
        $modelGudang = new GudangModel();

        $data = [
            'validation' => \Config\Services::validation(),
            'gudang' => $modelGudang->where(['id' => $id])->first()
        ];

        return view('data_master/gudang/edit', $data);
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
        $modelGudang = new GudangModel();
        $old_gudang = $modelGudang->find($id);

        if ($old_gudang['nama'] == $this->request->getPost('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[gudang.nama]';
        }

        $validasi = [
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} gudang harus diisi.',
                    'is_unique' => 'nama gudang sudah ada dalam database.'
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} gudang harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/gudang/' . $old_gudang["id"] . '/edit')->withInput();
        }

        $data = [
            'id'        => $id,
            'nama'      => $this->request->getPost('nama'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ];
        $modelGudang->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');

        return redirect()->to('/gudang');
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
        $modelGudang = new GudangModel();

        $modelGudang->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/gudang');
    }
}
