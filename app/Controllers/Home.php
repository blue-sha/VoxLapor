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

}