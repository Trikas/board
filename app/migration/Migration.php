<?php

namespace App\migration;

use App\Helpers\Properties;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class Migration
{
    public function userTableMigrateUp()
    {
        Capsule::schema()->create(Properties::TABLE_USERS, function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->boolean('csm_result')->nullable();
            $table->boolean('csmb_result')->nullable();
        });
    }

    public function userTableMigrateDown()
    {
        Capsule::schema()->dropIfExists(Properties::TABLE_USERS);
    }

    public function csmTableMigrateUp()
    {
        Capsule::schema()->create(Properties::TABLE_CSM, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->integer('grade')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function csmTableMigrateDown()
    {
        Capsule::schema()->dropIfExists(Properties::TABLE_CSM);
    }

    public function csmbTableMigrateUp()
    {
        Capsule::schema()->create(Properties::TABLE_CSMB, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->integer('grade')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function csmbTableMigrateDown()
    {
        Capsule::schema()->dropIfExists(Properties::TABLE_CSMB);
    }

    public function upMigrate()
    {
        $this->userTableMigrateUp();
        $this->csmTableMigrateUp();
        $this->csmbTableMigrateUp();
    }

    public function downMigrate()
    {
        $this->csmbTableMigrateDown();
        $this->csmTableMigrateDown();
        $this->userTableMigrateDown();
    }

    public function initTables()
    {
        $this->downMigrate();
        $this->upMigrate();
    }
}