<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nama_pelapor'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'no_identitas'      => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
            'jabatan'           => ['type' => 'VARCHAR', 'constraint' => 100],
            'unit_program'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'kontak'            => ['type' => 'VARCHAR', 'constraint' => 100],
            'gedung'            => ['type' => 'VARCHAR', 'constraint' => 100],
            'lantai'            => ['type' => 'VARCHAR', 'constraint' => 20],
            'ruangan'           => ['type' => 'VARCHAR', 'constraint' => 100],
            'objek'             => ['type' => 'VARCHAR', 'constraint' => 100],
            'keluhan'           => ['type' => 'TEXT'],
            'tanggal_ditemukan' => ['type' => 'DATE', 'null' => true],
            'dampak'            => ['type' => 'VARCHAR', 'constraint' => 150],
            'prioritas'         => ['type' => 'VARCHAR', 'constraint' => 20],
            'foto'              => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status'            => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'baru'],
            'id_petugas'        => ['type' => 'INT', 'unsigned' => true, 'null' => true],
            'tanggapan'         => ['type' => 'TEXT', 'null' => true],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('laporan');
    }

    public function down()
    {
        $this->forge->dropTable('laporan');
    }
}