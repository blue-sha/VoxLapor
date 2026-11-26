<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TanggapanLaporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'laporan_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
            'petugas_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => false],
            'tanggal_pemeriksaan' => ['type' => 'DATE', 'null' => false],
            'hasil_pemeriksaan' => ['type' => 'TEXT', 'null' => false],
            'tindakan_dilakukan' => ['type' => 'TEXT', 'null' => false],
            'status_penanganan' => ['type' => 'VARCHAR', 'constraint' => 60, 'null' => false],
            'target_penyelesaian' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('laporan_id');
        $this->forge->addKey('petugas_id');
        $this->forge->addForeignKey('laporan_id', 'laporan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('petugas_id', 'users', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('tanggapan_laporan');
    }

    public function down()
    {
        $this->forge->dropTable('tanggapan_laporan');
    }
}
