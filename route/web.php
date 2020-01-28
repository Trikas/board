<?php

use App\Controllers\Dashboard;

$klein = new \Klein\Klein();
$klein->respond('GET', '/', function ($request, $response, $service) {
});
$klein->dispatch();

