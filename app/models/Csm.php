<?php


namespace App\models;


use App\Traits\RelationTrait;
use Illuminate\Database\Eloquent\Model;

class Csm extends Model
{
    use RelationTrait;

    protected $table = 'csm';
    protected $guarded = ['id'];
    public $timestamps = false;
}