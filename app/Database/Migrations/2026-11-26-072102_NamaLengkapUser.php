<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NamaLengkapUser extends Migration
{
    public function up()
    {
        $fields = [
            'full_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'username',
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'full_name');
    }
}
