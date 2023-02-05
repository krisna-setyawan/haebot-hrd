<?php

namespace App\Controllers;

use App\Models\JasaModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Jasa extends ResourcePresenter
{
    protected $helpers = ['form'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $modelJasa = new JasaModel();
        $jasa = $modelJasa->findAll();

        $data = [
            'jasa' => $jasa
        ];

        return view('data_master/jasa/index', $data);
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
        return view('data_master/jasa/add', $data);
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
                'rules' => 'required|is_unique[jasa.nama]',
                'errors' => [
                    'required' => '{field} jasa harus diisi.',
                    'is_unique' => 'nama jasa sudah ada dalam database.'
                ]
            ],
            'biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} jasa harus diisi.',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} jasa harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/jasa/new')->withInput();
        }

        $modelJasa = new JasaModel();

        $slug = url_title($this->request->getPost('nama'), '-', true);

        $biaya = str_replace(".", "", $this->request->getPost('biaya'));

        $data = [
            'nama' => $this->request->getPost('nama'),
            'slug' => $slug,
            'biaya' => $biaya,
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];
        $modelJasa->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/jasa');
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
        $modelJasa = new JasaModel();

        $data = [
            'validation' => \Config\Services::validation(),
            'jasa' => $modelJasa->where(['slug' => $id])->first()
        ];

        return view('data_master/jasa/edit', $data);
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
        $modelJasa = new JasaModel();
        $old_jasa = $modelJasa->find($id);

        if ($old_jasa['nama'] == $this->request->getPost('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[jasa.nama]';
        }

        $validasi = [
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} jasa harus diisi.',
                    'is_unique' => 'nama jasa sudah ada dalam database.'
                ]
            ],
            'biaya' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} jasa harus diisi.',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} jasa harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/jasa/' . $old_jasa["slug"] . '/edit')->withInput();
        }

        $slug = url_title($this->request->getPost('nama'), '-', true);

        $biaya = str_replace(".", "", $this->request->getPost('biaya'));

        $data = [
            'id'        => $id,
            'nama'      => $this->request->getPost('nama'),
            'slug'      => $slug,
            'biaya'     => $biaya,
            'deskripsi'    => $this->request->getPost('deskripsi'),
        ];
        $modelJasa->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');

        return redirect()->to('/jasa');
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
        $modelJasa = new JasaModel();

        $modelJasa->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/jasa');
    }
}
