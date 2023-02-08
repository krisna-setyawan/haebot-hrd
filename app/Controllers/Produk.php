<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\ProdukPlanModel;
use CodeIgniter\RESTful\ResourcePresenter;
use \Hermawan\DataTables\DataTable;

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
        return view('data_master/produk/index');
    }

    public function getDataProduk()
    {
        if ($this->request->isAJAX()) {

            $modelProduk = new ProdukModel();
            $data = $modelProduk->where(['deleted_at' => null])->select('id, nama, jenis, harga_beli, harga_jual, stok');

            return DataTable::of($data)
                ->addNumbering('no')
                ->add('aksi', function ($row) {
                    return '
                    <a title="Stok Virtual" class="px-2 py-0 btn btn-sm btn-outline-dark" href="' . site_url() . 'produk/' . $row->id . '">
                        <i class="fa-fw fa-solid fa-magnifying-glass"></i>
                    </a>

                    <a title="Edit" class="px-2 py-0 btn btn-sm btn-outline-primary" onclick="showModalEdit(' . $row->id . ')">
                        <i class="fa-fw fa-solid fa-pen"></i>
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
        $modelProdukPlan = new ProdukPlanModel();

        $produk = $modelProduk->find($id);

        if ($produk['jenis'] == 'SET' || $produk['jenis'] == 'SINGLE') {

            $produkPlan = $modelProdukPlan->where(['id_produk_jadi' => $id])->findAll();
            if ($produkPlan) {

                $list_plan = array_column($produkPlan, 'id_produk_bahan');
                array_push($list_plan, $id);

                $builder = $modelProduk->builder();
                $builder->select('*');
                $builder->whereNotIn('id', $list_plan);
                $builder->orderBy('jenis', 'asc');
                $all_plan = $builder->get()->getResultArray();

                $virtual_stok = hitung_virtual_stok_dari_bahan($id);

                $bisa_membuat = min(array_column($virtual_stok, 'bisa_membuat'));

                $data = [
                    'jenis_produk'  => $produk['jenis'],
                    'produk'        => $produk,
                    'all_plan'      => $all_plan,
                    'virtual_stok'  => $virtual_stok,
                    'bisa_membuat'  => $bisa_membuat,
                    'bisa_dipecah'  => 0,
                    'result'        => 'ok',
                ];
            } else {
                $all_plan = $modelProduk->findAll();
                $data = [
                    'jenis_produk'  => $produk['jenis'],
                    'produk'        => $produk,
                    'all_plan'      => $all_plan,
                    'virtual_stok'  => '',
                    'bisa_membuat'  => 0,
                    'bisa_dipecah'  => 0,
                    'result'        => 'tidak memiliki komponen.',
                ];
            }
        } else {

            $produkPlan = $modelProdukPlan->where(['id_produk_bahan' => $id])->findAll();

            if ($produkPlan) {

                $list_plan = array_column($produkPlan, 'id_produk_jadi');
                array_push($list_plan, $id);

                $builder = $modelProduk->builder();
                $builder->select('*');
                $builder->whereNotIn('id', $list_plan);
                $builder->orderBy('jenis', 'asc');
                $all_plan = $builder->get()->getResultArray();

                $virtual_stok = hitung_virtual_stok_dari_set($id);

                $bisa_dipecah = 0;

                foreach ($virtual_stok as $stok) {
                    $bisa_dipecah += $stok['bisa_dipecah'];
                }
                $data = [
                    'jenis_produk'  => $produk['jenis'],
                    'produk'        => $produk,
                    'all_plan'      => $all_plan,
                    'virtual_stok'  => $virtual_stok,
                    'bisa_membuat'  => 0,
                    'bisa_dipecah'  => $bisa_dipecah,
                    'result'        => 'ok',
                ];
            } else {
                $all_plan = $modelProduk->findAll();
                $data = [
                    'jenis_produk'  => $produk['jenis'],
                    'produk'        => $produk,
                    'all_plan'      => $all_plan,
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
        if ($this->request->isAJAX()) {
            $json = [
                'data' => view('data_master/produk/add'),
            ];

            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    public function create()
    {
        if ($this->request->isAJAX()) {
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
                $validation = \Config\Services::validation();

                $error = [
                    'error_nama' => $validation->getError('nama'),
                    'error_jenis' => $validation->getError('jenis'),
                    'error_harga_beli' => $validation->getError('harga_beli'),
                    'error_harga_jual' => $validation->getError('harga_jual'),
                    'error_stok' => $validation->getError('stok'),
                ];

                $json = [
                    'error' => $error
                ];
            } else {
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

                $json = [
                    'success' => 'Berhasil menambah data produk'
                ];
            }

            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
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
        if ($this->request->isAJAX()) {
            $modelProduk = new ProdukModel();
            $produk = $modelProduk->find($id);

            $data = [
                'produk' => $produk,
            ];

            $json = [
                'data' => view('data_master/produk/edit', $data),
            ];

            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
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
        if ($this->request->isAJAX()) {
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
                $validation = \Config\Services::validation();

                $error = [
                    'error_nama' => $validation->getError('nama'),
                    'error_jenis' => $validation->getError('jenis'),
                    'error_harga_beli' => $validation->getError('harga_beli'),
                    'error_harga_jual' => $validation->getError('harga_jual'),
                    'error_stok' => $validation->getError('stok'),
                ];

                $json = [
                    'error' => $error
                ];
            } else {
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

                $json = [
                    'success' => 'Berhasil mengedit data produk'
                ];
            }
            echo json_encode($json);
        } else {
            return 'Tidak bisa load';
        }
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
