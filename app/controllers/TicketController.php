<?php

namespace App\controllers;

use App\models\Chamado;
use Cosanpa\PortalGlpi\Controller;

class TicketController extends Controller
{
    public function listaChamados()
    {
        $chamado = new Chamado();
        $lista = $chamado->buscaTodos();
        $this->view('tickets/lista', ['lista'=>$lista]);
    }

    public function abrirChamado()
    {
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $ticket = new Ticket();
        if($chamado->
    }

}
