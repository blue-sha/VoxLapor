<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LaporanModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $laporan = (new LaporanModel())->getLaporanWithUsers();
        $total = count($laporan);
        $rekapStatus = [];

        foreach ($laporan as $row) {
            $status = $row['status'] ?? 'tidak_diketahui';

            if (! isset($rekapStatus[$status])) {
                $rekapStatus[$status] = 0;
            }

            $rekapStatus[$status]++;
        }
        return view('admin/dashboard', [
            'username' => user()->username,
            'laporan' => $laporan,
            'total' => $total ?? 0,
            'totalDiproses' => $rekapStatus['diproses'] ?? 0,
            'totalMenunggu' => $rekapStatus['menunggu'] ?? 0,
            'totalSelesai' => $rekapStatus['selesai'] ?? 0,
            'totalTindakLanjut' => $rekapStatus['tindak lanjut'] ?? 0,
            'totalDitolak' => $rekapStatus['ditolak'] ?? 0
        ]);
    }

    public function detail($id)
    {
        $laporan = (new LaporanModel())->getLaporanWithUsers($id);
        return view('admin/detailadmin', ['laporan' => $laporan]);
    }
}
