<?php

namespace App\Helpers;

use App\models\User;

class UserHelper
{
    public static function getUser($id)
    {
        return User::find($id);
    }
}