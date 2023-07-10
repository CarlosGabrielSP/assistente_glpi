<?php

namespace Cosanpa\PortalGlpi\Infra;

use PDO;
use Cosanpa\PortalGlpi\Conexao;

class ChamadoRepository
{
    private $PDOconexao;

    function __construct()
    {
        $this->PDOconexao = Conexao::getConexao();
    }

    public function findAll(string $ordem = 'DESC')
    {
        $qry = "SELECT * FROM glpi_tickets ORDER BY 'id' $ordem";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}