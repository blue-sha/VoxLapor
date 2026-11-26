<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GrupAuthSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $table = $db->table('auth_groups');

        $groups = [
            [
                'name' => 'user',
                'description' => 'Pengguna / Pelapor',
            ],
            [
                'name' => 'petugas',
                'description' => 'Petugas penerima dan penindak lanjut laporan',
            ],
            [
                'name' => 'admin',
                'description' => 'Administrator sistem dan data master',
            ]
        ];

        foreach($groups as $group) {
            $exists = $table->where('name', $group['name'])->get()->getRow();

            if(! $exists){
                $table->insert($group);
            }
        }
    }
}
