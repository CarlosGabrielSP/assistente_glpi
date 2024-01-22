<?php

namespace Cosanpa\Infra\database;

use PDO;

class DBConexaoMysql extends DBConexao
{
    public function DBConexao(): PDO
    {
        $data = file_get_contents(__DIR__ . "/../../config/confdb.json");
        // var_dump($data);
        // exit();
        $db = json_decode($data);
        try {
            if (!isset($this->PDOconexao)){
                $this->PDOconexao = new PDO(
                    $db->mysql->dsn,
                    $db->mysql->user,
                    $db->mysql->pass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_NATURAL,
                        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
                    ]
                );
            }
        } catch (\PDOException $p){
            die("Falha na conexão com o Banco de Dados: " . $p->getMessage());
        }
        return $this->PDOconexao;
    }
}