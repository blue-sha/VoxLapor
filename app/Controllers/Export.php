<?php

namespace App\Controllers;

class Export extends BaseController
{
    public function export(): string
    {
        return view('Users/export');
    }
}