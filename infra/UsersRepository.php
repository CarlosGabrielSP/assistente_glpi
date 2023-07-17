<?php

namespace Cosanpa\PortalGlpi\Infra;

use PDO;
use Cosanpa\PortalGlpi\Repository;

class UsersRepository extends Repository
{
    public function findByName(string $name)
    {
        $qry = 'SELECT * FROM ' . $this->tabela . " WHERE name = :name";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':name', $name);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        return ($stm->fetch());
    }
}