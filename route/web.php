<?php

use App\Controllers\Dashboard;
use \App\migration\Migration;
use \App\seeders\SeederDb;
use Illuminate\Database\Capsule\Manager;
use \App\models\User;
use \App\controllers\BoardCsm;


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

$klein->respond('GET', '/csm/[:id]', function ($request, $response, $service){
    $user = User::find($request->id);
    $boardCsm = new \App\controllers\BoardCsm($user->csm);
    $collectGrades = $boardCsm->getCsmGrades();
    dd($collectGrades);
});

$klein->dispatch();

