<?php
namespace App\Core;

class Config {
    public static $database = [
        'host' => 'localhost',
        'name' => 'gponto',
        'user' => 'root',
        'pass' => ''
    ];

    public static $app = [
        'base_url' => 'http://localhost/gponto',
        'views' => 'App/Views/'
    ];
}