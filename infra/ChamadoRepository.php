<?php

namespace Cosanpa\PortalGlpi\Infrastructe;

use PDO;
use Cosanpa\PortalGlpi\Conexao;

class ChamadoRepository
{
    private $PDOconexao;

    function __construct()
    {
        $this->PDOconexao = Conexao::getConexao();
    }

    public function findAll(string $ordem = 'ASC')
    {
        $PDOconexao = Conexao::getConexao();
        $qry = "SELECT * FROM glpi_tickets ORDER BY $ordem";
        $stm = $PDOconexao->prepare($qry);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}