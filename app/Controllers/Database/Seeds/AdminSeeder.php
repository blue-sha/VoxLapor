<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // buat group admin kalau belum ada
        $ada = $this->db->table('auth_groups')->where('name', 'admin')->countAllResults();
        if (! $ada) {
            $this->db->table('auth_groups')->insert([
                'name'        => 'admin',
                'description' => 'Administrator',
            ]);
        }

        // buat akun admin kalau belum ada
        $users = new UserModel();
        if (! $users->where('username', 'admin')->first()) {
            $admin = new User([
                'email'    => 'admin@pengaduan.test',
                'username' => 'admin',
                'password' => 'Admin#12345',
                'active'   => 1,
            ]);
            $users->withGroup('admin')->insert($admin);
        }
    }
}