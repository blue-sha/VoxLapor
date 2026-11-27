<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LaporanExample extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        $petugas = $db->table('users')
            ->where('email', 'petugas.demo@kampus.ac.id')
            ->get()
            ->getRow();
        
        $petugasId = $petugas ? $petugas->id : null;
        $now = date('Y-m-d H:i:s');

        $laporanData = [
            [
                'nomor_laporan'     => 'LAP-202611-0001',
                'nama_pelapor'      => 'Budi Santoso',
                'no_identitas'      => '199001012020011001',
                'jabatan'           => 'Dosen',
                'unit_program'      => 'Rekayasa Perangkat Lunak',
                'kontak'            => '081234567890',
                'gedung'            => 'Gedung A',
                'lantai'            => '2',
                'ruangan'           => 'Lab Komputer 2',
                'objek'             => 'Proyektor',
                'keluhan'           => 'Proyektor di lab tidak menampilkan gambar saat kabel HDMI disambungkan.',
                'tanggal_ditemukan' => '2026-11-25',
                'dampak'            => 'Mengganggu kegiatan praktikum kelas',
                'prioritas'         => 'tinggi',
                'foto'              => null,
                'status'            => 'menunggu',
                'petugas_id'        => null,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'nomor_laporan'     => 'LAP-202611-0002',
                'nama_pelapor'      => 'Budi Santoso',
                'no_identitas'      => '199001012020011001',
                'jabatan'           => 'Dosen',
                'unit_program'      => 'Rekayasa Perangkat Lunak',
                'kontak'            => '081234567890',
                'gedung'            => 'Gedung B',
                'lantai'            => '1',
                'ruangan'           => 'Ruang Rapat 101',
                'objek'             => 'AC',
                'keluhan'           => 'AC ruangan menyala tetapi udara tidak dingin dan meneteskan air.',
                'tanggal_ditemukan' => '2026-11-23',
                'dampak'            => 'Ruangan terasa panas saat digunakan',
                'prioritas'         => 'sedang',
                'foto'              => 'uploads/laporan/sample_ac.jpg',
                'status'            => 'diproses',
                'petugas_id'        => $petugasId,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'nomor_laporan'     => 'LAP-202611-0003',
                'nama_pelapor'      => 'Budi Santoso',
                'no_identitas'      => '199001012020011001',
                'jabatan'           => 'Dosen',
                'unit_program'      => 'Rekayasa Perangkat Lunak',
                'kontak'            => '081234567890',
                'gedung'            => 'Gedung A',
                'lantai'            => '3',
                'ruangan'           => 'Lab Jaringan',
                'objek'             => 'Stop Kontak / Listrik',
                'keluhan'           => 'Stop kontak di meja praktikum nomor 4 longgar dan tidak mengalirkan arus.',
                'tanggal_ditemukan' => '2026-11-18',
                'dampak'            => 'PC praktikum di meja tersebut tidak bisa dinyalakan',
                'prioritas'         => 'tinggi',
                'foto'              => 'uploads/laporan/sample_stopkontak.jpg',
                'status'            => 'selesai',
                'petugas_id'        => $petugasId,
                'created_at'        => $now,
                'updated_at'        => $now,
            ]
        ];

        foreach($laporanData as $row){
            $exists = $db->table('laporan')
                ->where('nomor_laporan', $row['nomor_laporan'])
                ->get()
                ->getRow();

            if(! $exists){
                $db->table('laporan')->insert($row);
            }
        }
    }
}
