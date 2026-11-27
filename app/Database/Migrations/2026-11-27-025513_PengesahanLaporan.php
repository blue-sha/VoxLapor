<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengesahanLaporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'      => 'INT',
                'unsigned'  => true,
                'auto_increment' => true,
            ],
            'laporan_id' => [
                'type'      => 'INT',
                'unsigned'  => true,
                'null'      => false,
            ],
            'pihak_role' => [
                'type'      => 'ENUM',
                'constraint'=> ['pelapor', 'petugas', 'kepala_unit'],
                'null'      => false,
            ],
            'pihak_label' => [
                'type'      => 'ENUM',
                'constraint'=> ['Pelapor/Pengguna Ruangan', 'Petugas Penerima Laporan', 'Ketua Laboratorium/Kepala Unit'],
                'null'      => false,
            ],
            'nama' => [
                'type'      => 'VARCHAR',
                'constraint'=> 100,
                'null'      => false,
            ],
            'tanggal' => [
                'type'      => 'DATE',
                'null'      => true,
            ],
            'tanda_tangan' => [
                'type'      => 'VARCHAR',
                'constraint'=> 255,
                'null'      => true,
            ],
            'user_id' => [
                'type'      => 'INT',
                'unsigned'  => true,
                'null'      => true,
            ],
            'created_at' => [
                'type'      => 'DATETIME',
                'null'      => true,
            ],
            'updated_at' => [
                'type'      => 'DATETIME',
                'null'      => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('laporan_id');
        $this->forge->addForeignKey('laporan_id', 'laporan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addKey('user_id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('pengesahan_laporan'); 
    }

    public function down()
    {
        $this->forge->dropTable('pengesahan_laporan');
    }
}
