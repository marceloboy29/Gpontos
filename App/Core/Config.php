<?php
namespace App\Core;

class Config {
    public static $database = [
        'host' => 'localhost',
        'name' => 'digitalponto',
        'user' => 'root',
        'pass' => ''
    ];

    public static $app = [
        'base_url' => 'http://localhost/gponto',
        'views' => 'App/Views/'
    ];

    public static function Views($dados) {

        require_once __DIR__ . '/../Views/' . $dados['view'];
    }
}