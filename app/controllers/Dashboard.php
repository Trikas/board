<?php

namespace App\Controllers;


class Dashboard
{
    public function init($service)
    {
       $service->render(__DIR__.'/../views/test.php');
    }
}