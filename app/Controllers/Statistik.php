<?php
namespace App\Controllers;

class Statistik extends BaseController
{
    public function index()
    {
        // Simulasikan data statistik per bulan (Bisa dari Database MySQL)
        // Urutan data: [Laporan Masuk, Proses, Tindak Lanjut, Selesai, Ditolak, Total Persen]
        $dataStatistik = [
            'Januari'   => [50, 30, 10, 5, 5, 100],
            'Februari'  => [40, 40, 10, 5, 5, 100],
            'Maret'     => [70, 15, 10, 5, 0, 100],
            'April'     => [55, 25, 10, 10, 0, 100],
            'Mei'       => [65, 20, 10, 5, 0, 100],
            'Juni'      => [50, 30, 10, 10, 0, 100],
            'Juli'      => [45, 35, 10, 10, 0, 100],
            'Agustus'   => [60, 20, 10, 5, 5, 100],
            'September' => [50, 25, 15, 10, 0, 100],
            'Oktober'   => [70, 10, 10, 10, 0, 100],
            'November'  => [60, 20, 20, 0, 0, 100], // Default awal
            'Desember'  => [55, 25, 10, 5, 5, 100],
        ];

        $data = [
            'tahun'         => '2026',
            'bulan_aktif'   => 'November',
            'statistik'     => json_encode($dataStatistik) // Kirim data ke JavaScript
        ];

        return view('v_dashboard', $data);
    }
}