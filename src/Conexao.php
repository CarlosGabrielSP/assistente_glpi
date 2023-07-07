<?php

namespace Cosanpa\PortalGlpi;

use PDO;

class Conexao
{
    private static $PDOconexao;
    private function __construct(){}

    public static function getConexao() {
        try {
            if (!isset(self::$PDOconexao)) {
                self::$PDOconexao = new PDO(
                    "mysql:host=10.20.100.3; dbname=glpi10",
                    "glpi10",
                    "C0s-np%2323",
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_NATURAL,
                        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
                    ]
                );
            }
        } catch (\PDOException $p) {
            die("Falha na conexão com o Banco de Dados: " . $p->getMessage());
        }
        return self::$PDOconexao;
    }
}
