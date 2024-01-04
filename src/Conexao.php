<?php
namespace Cosanpa\Src;

use PDO;

class Conexao
{
    private static $PDOconexao;
    private function __construct(){}
    
    public static function getConexao(){
        $data = file_get_contents(__DIR__ . "/../config/confdb.json");
        $db = json_decode($data);

        try {
            if (!isset(self::$PDOconexao)){
                self::$PDOconexao = new PDO(
                    "{$db->mysql->host}; {$db->mysql->dbname}",
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
        return self::$PDOconexao;
    }
}
