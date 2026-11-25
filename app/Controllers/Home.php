<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Users/lapor');
    }

    public function lapor(): string
    {
        return view('Petugas/balasan');
    }

    public function petugas(): string
    {
        return view('petugas/petugas');
    }

    public function arah()
    {
        helper('auth');

        if (in_groups('admin')) {
            return redirect()->to('/admin');
        }
        if (in_groups('petugas')) {
            return redirect()->to('/petugas');
        }
        return redirect()->to('/');   // user biasa
    }
}