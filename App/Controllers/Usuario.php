<?php

namespace App\Controllers;

use App\Core\Config;
use App\Core\Sessions;
use App\Core\Model;
use App\Model\Usuario_model;

class Usuario extends Usuario_model
{
    private $array = [];

    public function __construct()
    {
        if (Sessions::get('user_id')) {
            header('Location: ' . Config::$app['base_url']);
            exit();
        }
    }

    public function index()
    {
        $dados = [
            'view' => 'usuario/index.php',
            'base_url' => Config::$app['base_url'],
            'dados' => $this->SelectDayPonto(
                [
                    'id_user' => 1,
                    'datas' => date('Y-m-d'),
                ]
            )
        ];

        // print "<pre>";
        // print_r($dados);
        // print "</pre>";

        Config::Views($dados);
    }

    public function CreatePontos() {
        $dados = $this->InsertCreatePonto(['id_user' => 1, 'datas' => date('Y-m-d')]);
        print "<pre>";
        print_r($dados);
        print "<pre>";
        // echo json_encode(['status' => 'success', 'message' => 'Ponto registrado com sucesso!']);
    }

    public function ListPontos()
    {
        echo "This is the About Page of Home Usuario.";
    }
    public function AtualizaPontos()
    {
        echo "This is the About Page of Home Usuario.";
    }
}
