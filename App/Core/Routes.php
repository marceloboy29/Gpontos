<?php

namespace App\Core;

class Routes
{

    private static $routes = [
        'GET' => [
            'usuario' => [
                'controllers' => "App\\Controllers\\Usuario",
                'method' => [
                    'index' => 'index',
                    'list' => 'ListPontos',
                    'perfil' => 'Perfil',
                    'sair' => 'Sair',
                ],
            ],
        ],

        'GET' => [
            'usuario' => [
                'controllers' => 'App\\Controllers\\Usuario',
                'method' => [
                    'create' => 'CreatePontos'
                ]
            ]
        ]
    ];

    public function __construct()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        self::get($path);
    }

    public static function get($path)
    {
        $url = explode('/', rtrim($path, '/'));

        $class = $url[2] ?? 'erro';
        $method = $url[3] ?? 'index';

        $controler = self::$routes[$_SERVER['REQUEST_METHOD']][$class]['controllers'];
        $methods = self::$routes[$_SERVER['REQUEST_METHOD']][$class]['method'][$method];

        (new $controler())->{$methods}();

    }

    private static function erro($params)
    {
        return json_encode([
            'status' => 'error',
            'message' => 'Rota não encontrada',
            'params' => $params
        ]);
    }
}
