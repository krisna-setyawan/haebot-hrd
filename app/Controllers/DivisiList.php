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
        $karyawan = $modelKaryawan->select('karyawan.nama_lengkap, karyawan.jabatan, karyawan.pendidikan, karyawan.no_telp, karyawan.email')
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
    //         $karyawan = $modelKaryawan->select('karyawan.nama_lengkap, karyawan.jabatan, karyawan.pendidikan, karyawan.no_telp, karyawan.email')
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
            $karyawan = $modelKaryawan->findAll();

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

            $validasi = [
                'nik'  => [
                    'rules'     => 'required|is_unique[karyawan.nik]',
                    'errors'    => [
                        'required' => 'nik harus diisi',
                    ]
                ],
                'jabatan'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'jabatan harus diisi',
                    ]
                ],
                'nama_lengkap'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'nama lengkap harus diisi',
                    ]
                ],
                'alamat'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'alamat harus diisi',
                    ]
                ],
                'jenis_kelamin'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'jenis kelamin harus diisi',
                    ]
                ],
                'tempat_lahir'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'tempat lahir harus diisi',
                    ]
                ],
                'tanggal_lahir'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'tanggal lahir harus diisi',
                    ]
                ],
                'agama'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'agama harus diisi',
                    ]
                ],
                'pendidikan'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'pendidikan harus diisi',
                    ]
                ],
                'no_telp'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'no telepon harus diisi',
                    ]
                ],
                'email'  => [
                    'rules'     => 'required|valid_email|is_unique[karyawan.email]',
                    'errors'    => [
                        'required' => 'email harus diisi',
                    ]
                ],
                'username'  => [
                    'rules'     => 'required|alpha_numeric_punct|min_length[3]|max_length[30]|is_unique[users.username]',
                    'errors'    => [
                        'required' => 'username harus diisi',
                    ]
                ],
                'password'  => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required' => 'password harus diisi',
                    ]
                ],
            ];

            if (!$this->validate($validasi)) {
                $validation = \Config\Services::validation();

                $error = [
                    'error_nik' => $validation->getError('nik'),
                    'error_nama_lengkap' => $validation->getError('nama_lengkap'),
                    'error_jabatan' => $validation->getError('jabatan'),
                    'error_alamat' => $validation->getError('alamat'),
                    'error_jenis_kelamin' => $validation->getError('jenis_kelamin'),
                    'error_tempat_lahir' => $validation->getError('tempat_lahir'),
                    'error_tanggal_lahir' => $validation->getError('tanggal_lahir'),
                    'error_agama' => $validation->getError('agama'),
                    'error_pendidikan' => $validation->getError('pendidikan'),
                    'error_no_telp' => $validation->getError('no_telp'),
                    'error_email' => $validation->getError('email'),
                    'error_username' => $validation->getError('username'),
                    'error_password' => $validation->getError('password'),
                ];

                $json = [
                    'error' => $error
                ];
            } else {
                $modelKaryawan = new KaryawanModel();
                $modelUser = new UserModel();

                $data1 = [
                    'id_grup' => 5,
                    'id_divisi' => 5,
                    'nik' => $this->request->getPost('nik'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'alamat' => $this->request->getPost('alamat'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'agama' => $this->request->getPost('agama'),
                    'pendidikan' => $this->request->getPost('pendidikan'),
                    'no_telp' => $this->request->getPost('no_telp'),
                    'email' => $this->request->getPost('email'),
                ];
                $modelKaryawan->save($data1);


                $data2 = [
                    'id_karyawan' => $modelKaryawan->getInsertID(),
                    'name' => $this->request->getPost('nama_lengkap'),
                    'email' => $this->request->getPost('email'),
                    'username' => $this->request->getPost('username'),
                    'password_hash' => Password::hash($this->request->getPost('password'),),
                    'active' => 1
                ];
                $modelUser->save($data2);

                $json = [
                    'success' => 'Berhasil menambah data karyawan'
                ];
            }

            echo json_encode($json);
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
