<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Produk extends ResourcePresenter
{
    protected $helpers = ['form', 'stok_helper'];
    /**
     * Present a view of resource objects
     *
     * @return mixed
     */
    public function index()
    {
        $modelProduk = new ProdukModel();
        $produk = $modelProduk->findAll();

        $data = [
            'produk' => $produk
        ];

        return view('data_master/produk/index', $data);
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
        $modelProduk = new ProdukModel();
        $produk = $modelProduk->find($id);

        if ($produk['jenis'] == 'SET' || $produk['jenis'] == 'SINGLE') {
            $virtual_stok = hitung_virtual_stok_dari_bahan($id);
            $bisa_membuat = min(array_column($virtual_stok, 'bisa_membuat'));

            if ($virtual_stok['result'] == 'ok') {
                $data = [
                    'jenis_produk'  => $produk['jenis'],
                    'produk'        => $produk,
                    'virtual_stok'  => $virtual_stok,
                    'bisa_membuat'  => $bisa_membuat,
                    'bisa_dipecah'  => 0,
                    'result'        => 'ok',
                ];
            } else {
                $data = [
                    'jenis_produk'  => $produk['jenis'],
                    'produk'        => $produk,
                    'virtual_stok'  => '',
                    'bisa_membuat'  => 0,
                    'bisa_dipecah'  => 0,
                    'result'        => 'tidak memiliki bahan.',
                ];
            }
        } else {
            $virtual_stok = hitung_virtual_stok_dari_set($id);
            $bisa_dipecah = 0;
            foreach ($virtual_stok as $stok) {
                $bisa_dipecah += $stok['bisa_dipecah'];
            }

            if ($virtual_stok['result'] == 'ok') {
                $data = [
                    'jenis_produk'  => $produk['jenis'],
                    'produk'        => $produk,
                    'virtual_stok'  => $virtual_stok,
                    'bisa_membuat'  => 0,
                    'bisa_dipecah'  => $bisa_dipecah,
                    'result'        => 'ok',
                ];
            } else {
                $data = [
                    'jenis_produk'  => $produk['jenis'],
                    'produk'        => $produk,
                    'virtual_stok'  => '',
                    'bisa_membuat'  => 0,
                    'bisa_dipecah'  => 0,
                    'result'        => 'tidak memiliki set.',
                ];
            }
        }



        return view('data_master/produk/show', $data);
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        $data = ['validation' => \Config\Services::validation()];
        return view('data_master/produk/add', $data);
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
                'rules' => 'required|is_unique[produk.nama]',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_unique' => 'nama produk sudah ada dalam database.'
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk harus dipilih.',
                ]
            ],
            'harga_beli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga beli produk harus diisi.',
                ]
            ],
            'harga_jual' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga beli produk harus diisi.',
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Stok produk awal harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/produk/new')->withInput();
        }

        $modelProduk = new ProdukModel();

        $slug = url_title($this->request->getPost('nama'), '-', true);

        $harga_beli = str_replace(".", "", $this->request->getPost('harga_beli'));
        $harga_jual = str_replace(".", "", $this->request->getPost('harga_jual'));

        $data = [
            'nama' => $this->request->getPost('nama'),
            'slug' => $slug,
            'jenis' => $this->request->getPost('jenis'),
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual,
            'stok' => $this->request->getPost('stok'),
        ];
        $modelProduk->save($data);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/produk');
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
        $modelProduk = new ProdukModel();

        $data = [
            'validation' => \Config\Services::validation(),
            'produk' => $modelProduk->where(['slug' => $id])->first()
        ];

        return view('data_master/produk/edit', $data);
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
        $modelProduk = new ProdukModel();
        $old_produk = $modelProduk->find($id);

        if ($old_produk['nama'] == $this->request->getPost('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[produk.nama]';
        }

        $validasi = [
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_unique' => 'nama produk sudah ada dalam database.'
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk harus dipilih.',
                ]
            ],
            'harga_beli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga beli produk harus diisi.',
                ]
            ],
            'harga_jual' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga beli produk harus diisi.',
                ]
            ],
        ];

        if (!$this->validate($validasi)) {
            return redirect()->to('/produk/' . $old_produk["slug"] . '/edit')->withInput();
        }

        $slug = url_title($this->request->getPost('nama'), '-', true);

        $harga_beli = str_replace(".", "", $this->request->getPost('harga_beli'));
        $harga_jual = str_replace(".", "", $this->request->getPost('harga_jual'));

        $data = [
            'id'            => $id,
            'nama'          => $this->request->getPost('nama'),
            'slug'          => $slug,
            'jenis'         => $this->request->getPost('jenis'),
            'harga_beli'    => $harga_beli,
            'harga_jual'    => $harga_jual,
        ];
        $modelProduk->save($data);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');

        return redirect()->to('/produk');
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
        $modelProduk = new ProdukModel();

        $modelProduk->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/produk');
    }
}
