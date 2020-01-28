<?php


namespace App\models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function csm()
    {
        return $this->hasMany(Csm::class, 'user_id', 'id');
    }

    public function csmb()
    {
        return $this->hasMany(Csmb::class, 'user_id', 'id');
    }
}