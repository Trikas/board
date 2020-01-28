<?php


namespace App\migration;


use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;

class Migration
{
    /**
     *
     */
    public function userTableMigrate()
    {
        Manager::schema()->table('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->unsignedInteger('csm_id')->nullable();
            $table->unsignedInteger('csmb_id')->nullable();
            //$table->
        });
    }
}