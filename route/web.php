<?php

use App\Controllers\Dashboard;
use \App\migration\Migration;
use \App\seeders\SeederDb;
use Illuminate\Database\Capsule\Manager;

$klein = new \Klein\Klein();
$klein->respond('GET', '/init-tables', function ($request, $response, $service) {
    $migration = new Migration();
    $migration->initTables();
    $seeds =  new SeederDb();
    $seeds->initSeeder();
});
$klein->dispatch();

