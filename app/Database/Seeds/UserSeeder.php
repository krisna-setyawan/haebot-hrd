<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Password;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = new UserModel();
        $groups = new GroupModel();


        $users->insert([
            'name' => 'Krisna Super Admin',
            'email' => 'krisna@gmail.com',
            'username' => 'krisna',
            'password_hash' => Password::hash('krisna'),
            'active' => 1
        ]);
        // langsung menambahkan user kedalam group
        $groups->addUserToGroup($users->getInsertID(), 1);


        $users->insert([
            'name' => 'Setyawan Bayu',
            'email' => 'setyawan@gmail.com',
            'username' => 'setyawan',
            'password_hash' => Password::hash('setyawan'),
            'active' => 1
        ]);
        // langsung menambahkan user kedalam group
        $groups->addUserToGroup($users->getInsertID(), 2);


        $users->insert([
            'name' => 'Jonerys',
            'email' => 'jono@gmail.com',
            'username' => 'jono',
            'password_hash' => Password::hash('jono'),
            'active' => 1
        ]);
        // langsung menambahkan user kedalam group
        $groups->addUserToGroup($users->getInsertID(), 3);
    }
}
