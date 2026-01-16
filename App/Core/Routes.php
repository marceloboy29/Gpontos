<?php

namespace App\Core;

class Routes
{

    private static $routes = [
        'usuario' => [
            'Class' => 'HomeUsuario',
            'Method' => [
                'index' => 'index',
                'perfil' => 'getPontoDay',
                'espelho' => 'getPontoById',
                'getPontoMonth' => 'getPontoMonth'
            ]
        ],
        'login' => [
            'Class' => 'Login',
            'Method' => 'authenticate'
        ],
        'logout' => [
            'Class' => 'AuthController',
            'Method' => 'logout'
        ],
        'dashboard' => [
            'Class' => 'DashboardController',
            'Method' => 'index'
        ]
    ];

    public function __construct()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        self::get($path);
    }

    public static function get($path)
    {
        $url = explode('/', $path) ?? '/';

        if (isset($url[1])) {
        }

        $className = isset(self::$routes[$url[2]])
            ? 'App\\Controllers\\' . self::$routes[$url[2]]['Class']
            : $url[2];

        if (!class_exists($className)) {
            $erro = self::erro($url);
            echo $erro;
            return;
        }

        $methodName = isset($url[3]) && isset(self::$routes[$url[2]]['Method'][$url[3]])
            ? self::$routes[$url[2]]['Method'][$url[3]]
            : 'index';

        if (!method_exists($className, $methodName)) {
            $erro = self::erro($url);
            echo $erro;
            return;
        }

        if (!method_exists($className, $methodName)) {
            $erro = self::erro($url);
            echo $erro;
            return;
        }

        (new $className())->$methodName();
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
