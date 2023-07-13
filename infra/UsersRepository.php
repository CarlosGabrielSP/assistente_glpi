<?php

namespace Cosanpa\PortalGlpi\Infra;

use PDO;
use Cosanpa\PortalGlpi\Repository;

class UsersRepository extends Repository
{
    public function findByName(string $name, string $senha)
    {
        $qry = 'SELECT * FROM ' . $this->tabela . " WHERE name = :name";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':name', $name);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        // echo "<pre>";
        // print_r($stm->fetch());
        // echo "</pre>";
        $usuario = $stm->fetch();
        echo "<pre>";
        print_r($usuario);
        echo "</pre>";
        // if(password_verify($senha,$usuario['password'])){
        //     echo "<h1>FUNCIONOU</h1>";
        // } else {
        //     echo "<h1>NÂO FUNCIONOU</H1>";
        // }
    }
}