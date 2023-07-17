<?php

namespace App\controllers;

use App\models\Ticket;
use App\models\Usuario;
use Cosanpa\PortalGlpi\Util;
use Cosanpa\PortalGlpi\Controller;

class TicketController extends Controller
{
    private $ticket;

    function __construct()
    {
        $this->ticket = new Ticket;
    }

    public function listaChamados()
    {
        $lista = $this->ticket->buscaTodos();
        $this->view('tickets/lista', ['lista' => $lista]);
    }

    public function abrirChamado()
    {
        $cod = htmlspecialchars($_POST['cod']) ?? '';
        $login = htmlspecialchars($_POST['login']) ?? ''; 
        $assunto = htmlspecialchars($_POST['assunto']) ?? '';
        $descricao = htmlspecialchars($_POST['descricao']) ?? '';
        $infoAdc = htmlspecialchars($_POST['info']) ?? '';

        $drt = htmlspecialchars($_POST['drt']) ?? '';
        $nome = htmlspecialchars($_POST['nome']) ?? '';
        $setor = htmlspecialchars($_POST['setor']) ?? '';
        $pasta = htmlspecialchars($_POST['pasta']) ?? '';

        $usuario = new Usuario();
        if(!$infoUser = $usuario->autenticacao($login)) {
            Util::redireciona('/',['alert'=>'Usuário não existe']);
        }

        $this->ticket->criarTicket($cod, $infoUser, $infoAdc, $assunto, $descricao);

        if($ticket = $this->ticket->criarTicket($cod, $infoUser, $infoAdc, $assunto, $descricao)) {
            Util::redireciona('/',['alert'=>'Parabéns, seu chamado foi resgistrado','ticket'=>$ticket['id']]);
        }

        Util::redireciona('/',['alert'=>'Que pena, seu chamado não foi aceito. Contate a UEST no 3202-8551 para esclarecimentos']);

    }
}
