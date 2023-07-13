<?php

namespace App\models;

use Cosanpa\PortalGlpi\Infra\TicketsRepository;

class Ticket
{
    private $ticketRepository;

    function __construct()
    {
        $this->ticketRepository = new TicketsRepository();
    }

    public function buscaTodos()
    {
        return $this->ticketRepository->findAll();
    }

    public function criarNovoTicket($cod, $userName, $info, $title, $content)
    {

    }

}