<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythUserModel;

class Users extends MythUserModel
{
    protected $allowedFields = [
        'email', 'username', 'nama', 'password_hash', 'reset_hash', 'reset_at',
        'reset_expires', 'activate_hash', 'status', 'status_message', 'active',
        'force_pass_reset', 'permissions', 'deleted_at',
    ];
}