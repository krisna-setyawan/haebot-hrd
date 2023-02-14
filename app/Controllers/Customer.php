<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\CustomerRekeningModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Customer extends ResourcePresenter
{
    protected $helpers = ['form'];


    public function index()
    {
        $modelCustomer = new CustomerModel();
        $customer = $modelCustomer->findAll();

        $data = [
            'customer' => $customer
        ];

        return view('data_master/customer/index', $data);
    }


    public function show($id = null)
    {
        if ($this->request->isAJAX()) {
            $modelCustomer = new CustomerModel();
            $modelCustomerRekening = new CustomerRekeningModel();
            $rekening = $modelCustomerRekening->where(['id_customer' => $id])->findAll();

            $data = [
                'customer' => $modelCustomer->where(['id' => $id])->first(),
                'rekening' => $rekening,
            ];

            $json = [
                'data' => view('data_master/customer/show', $data),
            ];

            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
    }


    public function new()
    {
        $data = ['validation' => \Config\Services::validation()];
        return view('data_master/customer/add', $data);
    }


    public function create()
    {
        $validasi = [
            'origin' => [
                'rules' => 'required|is_unique[customer.origin]',
                'errors' => [
                    'required' => '{field} customer harus diisi.',
                    'is_unique' => 'origin customer sudah ada dalam database.'
                ]
            ],
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
            'email' => [
                'rules' => 'required|valid_email|is_unique[customer.email]',
                'errors' => [
                    'required' => '{field} customer harus diisi.',
                    'is_unique' => 'email customer sudah ada dalam database.',
                    'valid_email' => 'format penulisan email salah.'
                ]
            ],
            'saldo_utama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Awal Saldo Utama harus diisi.',
                ]
            ],
            'saldo_belanja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Awal Saldo Belanja harus diisi.',
                ]
            ],
            'saldo_lain' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Awal Saldo Lain harus diisi.',
                ]
            ],
            'tgl_registrasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tgl Registrasi harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/customer/new')->withInput();
        }

        $modelCustomer = new CustomerModel();

        $slug = url_title($this->request->getPost('nama'), '-', true);
        $saldo_utama = str_replace(".", "", $this->request->getPost('saldo_utama'));
        $saldo_belanja = str_replace(".", "", $this->request->getPost('saldo_belanja'));
        $saldo_lain = str_replace(".", "", $this->request->getPost('saldo_lain'));

        $data = [
            'origin'            => $this->request->getPost('origin'),
            'nama'              => $this->request->getPost('nama'),
            'slug'              => $slug,
            'alamat'            => $this->request->getPost('alamat'),
            'no_telp'           => $this->request->getPost('no_telp'),
            'email'             => $this->request->getPost('email'),
            'status'            => 'Active',
            'saldo_utama'       => $saldo_utama,
            'saldo_belanja'     => $saldo_belanja,
            'saldo_lain'        => $saldo_lain,
            'tgl_registrasi'    => $this->request->getPost('tgl_registrasi'),
            'note'              => $this->request->getPost('note'),
        ];
        $modelCustomer->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/customer');
    }


    public function edit($id = null)
    {
        $modelCustomer = new CustomerModel();
        $modelCustomerRekening = new CustomerRekeningModel();

        $rekening = $modelCustomerRekening->where(['id_customer' => $id])->findAll();

        $data = [
            'validation' => \Config\Services::validation(),
            'customer' => $modelCustomer->where(['id' => $id])->first(),
            'rekening' => $rekening,
        ];

        return view('data_master/customer/edit', $data);
    }


    public function update($id = null)
    {
        $modelCustomer = new CustomerModel();
        $old_customer = $modelCustomer->find($id);

        if ($old_customer['origin'] == $this->request->getPost('origin')) {
            $rule_origin = 'required';
        } else {
            $rule_origin = 'required|is_unique[customer.origin]';
        }

        if ($old_customer['nama'] == $this->request->getPost('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[customer.nama]';
        }

        if ($old_customer['email'] == $this->request->getPost('email')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|valid_email|is_unique[customer.email]';
        }

        $validasi = [
            'origin' => [
                'rules' => $rule_origin,
                'errors' => [
                    'required' => '{field} customer harus diisi.',
                    'is_unique' => 'origin customer sudah ada dalam database.'
                ]
            ],
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
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => '{field} customer harus diisi.',
                    'is_unique' => 'email customer sudah ada dalam database.',
                    'valid_email' => 'format penulisan email salah.'
                ]
            ],
            'saldo_utama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Awal Saldo Utama harus diisi.',
                ]
            ],
            'saldo_belanja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Awal Saldo Belanja harus diisi.',
                ]
            ],
            'saldo_lain' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Awal Saldo Lain harus diisi.',
                ]
            ],
            'tgl_registrasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tgl Registrasi harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/customer/' . $old_customer["id"] . '/edit')->withInput();
        }

        $slug = url_title($this->request->getPost('nama'), '-', true);
        $saldo_utama = str_replace(".", "", $this->request->getPost('saldo_utama'));
        $saldo_belanja = str_replace(".", "", $this->request->getPost('saldo_belanja'));
        $saldo_lain = str_replace(".", "", $this->request->getPost('saldo_lain'));

        $data = [
            'id'                => $id,
            'origin'            => $this->request->getPost('origin'),
            'nama'              => $this->request->getPost('nama'),
            'slug'              => $slug,
            'alamat'            => $this->request->getPost('alamat'),
            'no_telp'           => $this->request->getPost('no_telp'),
            'email'             => $this->request->getPost('email'),
            'status'            => $this->request->getPost('status'),
            'saldo_utama'       => $saldo_utama,
            'saldo_belanja'     => $saldo_belanja,
            'saldo_lain'        => $saldo_lain,
            'tgl_registrasi'    => $this->request->getPost('tgl_registrasi'),
            'note'              => $this->request->getPost('note'),
        ];
        $modelCustomer->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');

        return redirect()->to('/customer');
    }


    public function remove($id = null)
    {
        //
    }


    public function delete($id = null)
    {
        $modelCustomer = new CustomerModel();

        $modelCustomer->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/customer');
    }
}
