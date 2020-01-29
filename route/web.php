<?php

use App\Controllers\Dashboard;
use \App\migration\Migration;
use \App\seeders\SeederDb;
use Illuminate\Database\Capsule\Manager;
use \App\models\User;
use \App\controllers\Board;
use \App\Helpers\UserHelper;
use \App\Helpers\BoardHelper;
use \App\Helpers\XMLSerializer;


$klein = new \Klein\Klein();
$klein->respond('GET', '/init-tables', function () {
    $migration = new Migration();
    $migration->initTables();
    $seeds = new SeederDb();
    $seeds->initSeeder();
});
$klein->respond('GET', '/', function ($request, $response, $service) {
    $service->users = User::all();
    $service->render(__DIR__ . '/../views/test.php');
});

$klein->respond('GET', '/csm/[:id]', function ($request, $response, $service) {
    $user = UserHelper::getUser($request->id);
    BoardHelper::bootBoard($user->csm, 'csm', $user);
    $send = $request->param('format', 'json');
    $response->$send($user);
});

$klein->respond('GET', '/csmb/[:id]', function ($request, $response, $service) {
    $user = UserHelper::getUser($request->id);
    BoardHelper::bootBoard($user->csmb, 'csmb', $user);
    $service->xml = XMLSerializer::generateValidXmlFromArray($user->toArray());
    $service->render(__DIR__ . '/../views/board-csmb.php');
});


$klein->dispatch();

