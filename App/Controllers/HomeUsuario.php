<?php

namespace App\Controllers;
use App\Core\Config;

class HomeUsuario {
    public function index() {
        $base_url = Config::$app['base_url'];
        include Config::$app['views'] . 'Usuario/index.php';
    }

    public function getPontoDay() {
        echo "This is the About Page of Home Usuario.";
    }

    public function getPontoById() {
        echo "This is the About Page of Home Usuario.";
    }
    public function getPontoMonth() {
        echo "This is the About Page of Home Usuario.";
    }
}