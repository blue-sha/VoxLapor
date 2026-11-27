<?php

namespace App\Controllers;

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
            'nama'     => user()->nama,
            'username' => user()->username, // NIP/NIDN
        ]);
    }

    public function Home()
    {
        return view('Home', ['title' => 'VoxLapor']);
    }
}