<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Customer extends ResourcePresenter
{
    protected $helpers = ['form'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $modelCustomer = new CustomerModel();
        $customer = $modelCustomer->findAll();

        $data = [
            'customer' => $customer
        ];

        return view('data_master/customer/index', $data);
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
        return view('data_master/customer/add', $data);
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
                'rules' => 'required|is_unique[customer.nama]',
                'errors' => [
                    'required' => '{field} customer harus diisi.',
                    'is_unique' => 'nama customer sudah ada dalam database.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} customer harus diisi.',
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No telepon customer harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/customer/new')->withInput();
        }

        $modelCustomer = new CustomerModel();

        $slug = url_title($this->request->getPost('nama'), '-', true);

        $data = [
            'nama' => $this->request->getPost('nama'),
            'slug' => $slug,
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
        ];
        $modelCustomer->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/customer');
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
        $modelCustomer = new CustomerModel();

        $data = [
            'validation' => \Config\Services::validation(),
            'customer' => $modelCustomer->where(['id' => $id])->first()
        ];

        return view('data_master/customer/edit', $data);
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
        $modelCustomer = new CustomerModel();
        $old_customer = $modelCustomer->find($id);

        if ($old_customer['nama'] == $this->request->getPost('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[customer.nama]';
        }

        $validasi = [
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} customer harus diisi.',
                    'is_unique' => 'nama customer sudah ada dalam database.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} customer harus diisi.',
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No telepon customer harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/customer/' . $old_customer["id"] . '/edit')->withInput();
        }

        $slug = url_title($this->request->getPost('nama'), '-', true);

        $data = [
            'id'        => $id,
            'nama'      => $this->request->getPost('nama'),
            'slug'      => $slug,
            'alamat'    => $this->request->getPost('alamat'),
            'no_telp'   => $this->request->getPost('no_telp'),
        ];
        $modelCustomer->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');

        return redirect()->to('/customer');
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
        $modelCustomer = new CustomerModel();

        $modelCustomer->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/customer');
    }
}
