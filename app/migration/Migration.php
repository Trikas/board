<?php

namespace App\migration;

use App\Helpers\Properties;
use Illuminate\Database\Capsule\Manager as Capsule;

class Migration
{
    public function userTableMigrateUp()
    {
        Capsule::schema()->create(Properties::TABLE_USERS, function ($table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->boolean('scm_result')->nullable();
            $table->boolean('csmb_result')->nullable();
        });
    }

    public function userTableMigrateDown()
    {
        Capsule::schema()->dropIfExists(Properties::TABLE_USERS);
    }

    public function csmTableMigrateUp()
    {
        Capsule::schema()->create(Properties::TABLE_CSM, function ($table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->integer('grade')->nullable();
        });
    }

    public function csmTableMigrateDown()
    {
        Capsule::schema()->dropIfExists(Properties::TABLE_CSM);
    }

    public function csmbTableMigrateUp()
    {
        Capsule::schema()->create(Properties::TABLE_CSMB, function ($table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->integer('grade')->nullable();
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
        $this->userTableMigrateDown();
        $this->csmbTableMigrateDown();
        $this->csmTableMigrateDown();
    }

    public function initTables()
    {
        $this->downMigrate();
        $this->upMigrate();
        echo 'init table successfully<br>';
    }
}