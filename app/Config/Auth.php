<?php

namespace Config;

use Myth\Auth\Config\Auth as BaseAuth;

class Auth extends BaseAuth
{
    public $requireActivation = 'false';
    public $activeResetter    = false;
    public $landingRoute = 'Dashboard';
    public $validFields    = ['username'];
    public $personalFields = ['nama', 'email'];

    public $views = [
    'login'           => 'App\Views\Auth\login',
    'register'        => 'App\Views\Auth\register',
    'forgot'          => 'Myth\Auth\Views\forgot',
    'reset'           => 'Myth\Auth\Views\reset',
    'emailForgot'     => 'Myth\Auth\Views\emails\forgot',
    'emailActivation' => 'Myth\Auth\Views\emails\activation',
    ];

    public $userModel = \App\Models\UserModel::class;
}
