<?php

use App\Controllers\Dashboard;
use \App\migration\Migration;
use Illuminate\Database\Capsule\Manager;

$klein = new \Klein\Klein();
$klein->respond('GET', '/init-tables', function ($request, $response, $service) {
    $migration = new Migration();
    $migration->initTables();
});
$klein->dispatch();

