<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Dashboard extends BaseController
{
    public function index()
    {
        helper('auth');

        if (in_groups('admin')) {
            return redirect()->to('/admin');
        }
        if (in_groups('petugas')) {
            return redirect()->to('/petugas');
        }

        return view('Users/dashboard', [
            'nama'    => user()->nama ?: user()->username,
            'laporan' => (new LaporanModel())
                            ->where('username', user()->username)
                            ->orderBy('created_at', 'DESC')
                            ->findAll(5),
        ]);
    }
}