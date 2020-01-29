<?php

use App\Controllers\Dashboard;
use \App\migration\Migration;
use \App\seeders\SeederDb;
use Illuminate\Database\Capsule\Manager;
use \App\models\User;

$klein = new \Klein\Klein();
$klein->respond('GET', '/init-tables', function () {
    $migration = new Migration();
    $migration->initTables();
    $seeds = new SeederDb();
    $seeds->initSeeder();
});
$klein->respond('GET', '/', function ($request, $response, $service) {
    $service->users = User::all();
    $service->render(__DIR__.'/../views/test.php');
});

$klein->dispatch();

