<?php
namespace App\Controllers;

use App\Models\LaporanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Riwayat extends BaseController
{
    public function index()
    {
        helper('auth');

        $model = new LaporanModel();

        return view('Users/dashboard', [
            'laporan' => $model->where('username', user()->username)
                               ->orderBy('created_at', 'DESC')
                               ->paginate(10),
            'pager'   => $model->pager,
        ]);
    }

   public function detail($id)
{
    helper('auth');

    $laporan = (new LaporanModel())
        ->where('id', $id)
        ->where('username', user()->username)
        ->first();

    if (! $laporan) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return view('Users/detail', ['laporan' => $laporan]);
}

        
}
