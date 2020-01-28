<?php


namespace App\models;


use App\Traits\RelationTrait;
use Illuminate\Database\Eloquent\Model;

class Csmb extends Model
{
    use RelationTrait;

    protected $guarded = ['id'];
    protected $table = 'csmb';
    public $timestamps = false;
}