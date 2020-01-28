<?php

namespace App\Traits;

use App\models\User;

trait RelationTrait
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}