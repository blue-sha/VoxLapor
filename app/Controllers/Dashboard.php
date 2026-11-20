<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
   public function index()
{
    helper('auth');

    return view('dashboard', [
        'nama'     => user()->nama,
        'username' => user()->username, // NIP/NIDN
    ]);
}
}