<?php
namespace App\Controllers;

use App\Models\LaporanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Riwayat extends BaseController
{
    public function index()
    {
        $model = new LaporanModel();

        return view('Users/dashboard', [
            'laporan' => $model->orderBy('created_at', 'DESC')->paginate(10),
            'pager'   => $model->pager,
        ]);
    }

    public function detail($id)
    {
        $laporan = (new LaporanModel())->find($id);

        if (! $laporan) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('Users/detail', ['laporan' => $laporan]);
    }
}