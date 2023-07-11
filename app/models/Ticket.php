<?php

namespace App\models;

use Cosanpa\PortalGlpi\Infra\TicketRepository;

class Ticket
{
    private $ticketRepository;

    function __construct()
    {
        $this->ticketRepository = new TicketRepository();
    }

    public function buscaTodos()
    {
        return $this->ticketRepository->findAll();
    }

}