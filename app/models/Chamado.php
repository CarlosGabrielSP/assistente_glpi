<?php

namespace App\models;

use Cosanpa\PortalGlpi\Conexao;
use Cosanpa\PortalGlpi\Infrastructe\ChamadoRepository;
use PDO;

class Chamado
{
    private $chamadoRepository;

    function __construct()
    {
        $this->chamadoRepository = new ChamadoRepository();
    }

    public function buscaTodos()
    {
        return $this->chamadoRepository->findAll();
    }

}