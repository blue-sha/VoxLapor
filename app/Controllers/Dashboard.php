<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        helper('auth');

        if (! logged_in()) {
            return redirect()->to('/login');
        }
        if (in_groups('admin')) {
            return redirect()->to('/admin');
        }
        if (in_groups('petugas')) {
            return redirect()->to('/petugas');
        }

        return view('Users/dashboard', [
    'full_name'    => user()->full_name ?: user()->username,
    'laporan' => (new \App\Models\LaporanModel())->orderBy('created_at', 'DESC')->findAll(5),
]);
    }
}