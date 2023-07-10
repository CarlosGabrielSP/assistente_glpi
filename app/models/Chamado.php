<?php

namespace App\models;

use Cosanpa\PortalGlpi\Infra\ChamadoRepository;

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