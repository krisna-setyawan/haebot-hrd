<?php

namespace App\Database\Seeds;

use App\Models\KaryawanModel;
use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Password;

class UserSeeder extends Seeder
{
    public function run()
    {
        $karyawan = new KaryawanModel();
        $users = new UserModel();
        $groups = new GroupModel();

        // Menambah superadmin
        $users->insert([
            // 'id_karyawan' => 0,
            'name' => 'KRISNA SUPER ADMIN',
            'email' => 'krisna@gmail.com',
            'username' => 'krisna',
            'password_hash' => Password::hash('krisna'),
            'active' => 1
        ]);
        // langsung menambahkan user kedalam group
        $groups->addUserToGroup($users->getInsertID(), 1);



        // OWNER
        $karyawan->insert([
            'id_grup'          => 2,
            'id_divisi'        => 1,
            'nik'              => '001',
            'jabatan'          => 'DIREKTUR',
            'nama_lengkap'     => 'FARHAN',
            'alamat'           => 'BLITAR',
            'jenis_kelamin'    => 'LAKI-LAKI',
            'tempat_lahir'     => 'BLITAR',
            'tanggal_lahir'    => '2001-01-01',
            'agama'            => 'ISLAM',
            'pendidikan'       => 'D IV / S I',
            'no_telp'          => '085123123123',
            'email'            => 'farhan@gmail.com',
        ]);
        // tambahkan user aplikasinya
        $users->insert([
            'id_karyawan' => $karyawan->getInsertID(),
            'name' => 'FARHAN',
            'email' => 'farhan@gmail.com',
            'username' => 'farhan',
            'password_hash' => Password::hash('farhan'),
            'active' => 1
        ]);
        // langsung menambahkan user kedalam group
        $groups->addUserToGroup($users->getInsertID(), 2);



        // SDM
        $karyawan->insert([
            'id_grup'          => 3,
            'id_divisi'        => 2,
            'nik'              => '002',
            'jabatan'          => 'HRD',
            'nama_lengkap'     => 'ALIM',
            'alamat'           => 'NGANJUK',
            'jenis_kelamin'    => 'LAKI-LAKI',
            'tempat_lahir'     => 'NGANJUK',
            'tanggal_lahir'    => '1999-01-01',
            'agama'            => 'ISLAM',
            'pendidikan'       => 'D IV / S I',
            'no_telp'          => '085123123123',
            'email'            => 'alim@gmail.com',
        ]);
        $users->insert([
            'id_karyawan' => $karyawan->getInsertID(),
            'name' => 'ALIM',
            'email' => 'alim@gmail.com',
            'username' => 'alim',
            'password_hash' => Password::hash('alim'),
            'active' => 1
        ]);
        // langsung menambahkan user kedalam group
        $groups->addUserToGroup($users->getInsertID(), 3);



        // KEPALA DIVISI
        $karyawan->insert([
            'id_grup'          => 4,
            'id_divisi'        => 4,
            'nik'              => '003',
            'jabatan'          => 'KEPALA DIVISI',
            'nama_lengkap'     => 'KARYAWAN KEPALA GUDANG',
            'alamat'           => 'GARUM',
            'jenis_kelamin'    => 'LAKI-LAKI',
            'tempat_lahir'     => 'BLITAR',
            'tanggal_lahir'    => '2000-01-01',
            'agama'            => 'ISLAM',
            'pendidikan'       => 'SMA / SMK',
            'no_telp'          => '085123123123',
            'email'            => 'kadiv_gudang@gmail.com',
        ]);
        $users->insert([
            'id_karyawan' => $karyawan->getInsertID(),
            'name' => 'KARYAWAN KEPALA GUDANG',
            'email' => 'kadiv_gudang@gmail.com',
            'username' => 'kadiv_gudang',
            'password_hash' => Password::hash('kadiv_gudang'),
            'active' => 1
        ]);
        // langsung menambahkan user kedalam group
        $groups->addUserToGroup($users->getInsertID(), 4);



        // RND
        $karyawan->insert([
            'id_grup'          => 5,
            'id_divisi'        => 5,
            'nik'              => '004',
            'jabatan'          => 'STAFF RND',
            'nama_lengkap'     => 'KARYAWAN RND',
            'alamat'           => 'BLITAR',
            'jenis_kelamin'    => 'LAKI-LAKI',
            'tempat_lahir'     => 'BLITAR',
            'tanggal_lahir'    => '1997-01-01',
            'agama'            => 'ISLAM',
            'pendidikan'       => 'SMA / SMK',
            'no_telp'          => '085123123123',
            'email'            => 'rnd@gmail.com',
        ]);
        $users->insert([
            'id_karyawan' => $karyawan->getInsertID(),
            'name' => 'KARYAWAN RND',
            'email' => 'rnd@gmail.com',
            'username' => 'rnd',
            'password_hash' => Password::hash('rnd'),
            'active' => 1
        ]);
        // langsung menambahkan user kedalam group
        $groups->addUserToGroup($users->getInsertID(), 5);



        // KARYAWAN PENJUALAN
        $karyawan->insert([
            'id_grup'          => 6,
            'id_divisi'        => 6,
            'nik'              => '005',
            'jabatan'          => 'STAFF CS',
            'nama_lengkap'     => 'KARYAWAN CS PENJUALAN',
            'alamat'           => 'PONGGOK',
            'jenis_kelamin'    => 'PEREMPUAN',
            'tempat_lahir'     => 'BLITAR',
            'tanggal_lahir'    => '1999-01-01',
            'agama'            => 'ISLAM',
            'pendidikan'       => 'SMA / SMK',
            'no_telp'          => '085123123123',
            'email'            => 'penjualan@gmail.com',
        ]);
        $users->insert([
            'id_karyawan' => $karyawan->getInsertID(),
            'name' => 'KARYAWAN CS PENJUALAN',
            'email' => 'penjualan@gmail.com',
            'username' => 'penjualan',
            'password_hash' => Password::hash('penjualan'),
            'active' => 1
        ]);
        // langsung menambahkan user kedalam group
        $groups->addUserToGroup($users->getInsertID(), 6);



        // KARYAWAN PEMBELIAN
        $karyawan->insert([
            'id_grup'          => 7,
            'id_divisi'        => 6,
            'nik'              => '005',
            'jabatan'          => 'STAFF CS',
            'nama_lengkap'     => 'KARYAWAN CS PEMBELIAN',
            'alamat'           => 'PONGGOK',
            'jenis_kelamin'    => 'PEREMPUAN',
            'tempat_lahir'     => 'BLITAR',
            'tanggal_lahir'    => '1999-01-01',
            'agama'            => 'ISLAM',
            'pendidikan'       => 'SMA / SMK',
            'no_telp'          => '085123123123',
            'email'            => 'pembelian@gmail.com',
        ]);
        $users->insert([
            'id_karyawan' => $karyawan->getInsertID(),
            'name' => 'KARYAWAN CS PEMBELIAN',
            'email' => 'pembelian@gmail.com',
            'username' => 'pembelian',
            'password_hash' => Password::hash('pembelian'),
            'active' => 1
        ]);
        // langsung menambahkan user kedalam group
        $groups->addUserToGroup($users->getInsertID(), 7);
    }
}
