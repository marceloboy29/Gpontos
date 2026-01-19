<?php

namespace App\Model;

use App\Core\Database;

class Usuario_model
{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __construct()
    {
        // Initialize any necessary properties here
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getdDate()
    {
        return $this->email;
    }

    public function SelectDayPonto($dados)
    {
        $sql = "
            SELECT  
            historico_pontos.entrada,
            historico_pontos.saida,
            historico_pontos.retorno,
            historico_pontos.fim,
            historico_pontos.total_horas,
            funcionario.hora_diaria,
            funcionario.hora_interval,
            funcionario.hora_diaria
            FROM usuario
            JOIN historico_pontos 
                ON usuario.id_user = historico_pontos.id_user
            JOIN funcionario 
                ON usuario.id_user = funcionario.id_user
            WHERE usuario.id_user = :user_id
              AND DATE(historico_pontos.datas) = :datas
        ";

        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindParam(':user_id', $dados['id_user']);
        $stmt->bindParam(':datas', $dados['datas']);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC) ?? [];

        $dados = [
            'entrada' => isset($result['entrada']) ? explode("|", $result['entrada'])[0] : '00:00',
            'saida' => isset($result['saida']) ? explode("|", $result['saida'])[0] : '00:00',
            'retorno' => isset($result['retorno']) ? explode("|", $result['retorno'])[0] : '00:00',
            'fim' => isset($result['fim']) ? explode("|", $result['fim'])[0] : '00:00',
            'total_horas' => isset($result['total_horas']) ? $result['total_horas'] : '00:00',
        ];

        // converte a entrada em sergundos
        $entrada = new \DateTime(explode("|", isset($result['entrada']) ? $result['entrada'] : '00:00')[0]);

        // Somar a jornada de horas diaria + a hora de intervalo
        $totalMinutos = $this->horaParaMinutos(isset($result['hora_diaria']) ? $result['hora_diaria'] : '00:00') + $this->horaParaMinutos('01:30');

        // Adicionar o total de minutos à hora de entrada
        $entrada->add(new \DateInterval("PT{$totalMinutos}M"));

        // Formatar hora de saída
        $dados['previa'] = isset($result['entrada']) ? $entrada->format('H:i') : '00:00';
        $dados['interval'] = isset($result['hora_interval']) ? $result['hora_interval'] : '00:00';
        $dados['hora_diaria'] = isset($result['hora_diaria']) ? $result['hora_diaria'] : '00:00';

        return $dados;
    }

    public function InsertCreatePonto($dados)
    {
        date_default_timezone_set('America/Sao_Paulo');

        $dados = $this->SelectDayPonto($dados);

        if (empty($dados)) {
            return;
        }

        if ($dados['saida'] == "00:00") {
            $horas_trabalhada = strtotime(date("H:i")) - strtotime(explode('|', $dados['entrada'])[0]);
            print gmdate('H:i', $horas_trabalhada);
            $this->UpdateCreatePonto('saida', gmdate('H:i', $horas_trabalhada));
        }

        if ($dados['retorno'] == "00:00") {
            $this->UpdateCreatePonto([
                'entrda' => date('H:i'),
                'total_hora' => gmdate('H:i', $horas_trabalhada)
            ]);
        }


    }

    private function UpdateCreatePonto($campo, $valor, $total)
    {
        $sql = "UPDATE historico_pontos SET " . $campo . "" . $valor . "";
    }

    function horaParaMinutos($hora)
    {
        list($h, $m) = explode(":", $hora);
        return $h * 60 + $m;
    }
}
