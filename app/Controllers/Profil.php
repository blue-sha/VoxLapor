<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        helper('auth');

        $user  = (new UserModel())->find(user_id());
        $email = strtolower(trim($user['email']));

        return view('Users/profil', [
            'full_name'  => $user['full_name'] ?: $user['username'],
            'email' => $user['email'],
            'foto'  => 'https://www.gravatar.com/avatar/' . md5($email) . '?s=200&d=identicon',
        ]);
    }
}