<?php

namespace App\controllers;

use App\services\TicketService;
use App\services\UserService;
use Cosanpa\PortalGlpi\Util;
use Cosanpa\PortalGlpi\Controller;

class TicketController extends Controller
{
    private $ticketServico;

    function __construct()
    {
        $this->ticketServico = new TicketService;
    }

    public function listaChamados()
    {
        $lista = $this->ticketServico->buscaTodos();
        $this->view('tickets/lista', ['lista' => $lista]);
    }

    public function abrirChamado()
    {
        $cod = htmlspecialchars($_POST['cod'] ?? '');
        $assunto = htmlspecialchars($_POST['assunto'] ?? '');
        $descricao = htmlspecialchars($_POST['descricao'] ?? '');
        $infoAdc = htmlspecialchars($_POST['infoAdc'] ?? '');
        
        if (!$usuario = $_SESSION['user'] ?? false) {
            if ($nomeUsuario = htmlspecialchars($_POST['nomeUsuario'] ?? false)) {
                if (!$usuario = (new UserService)->buscaUsuario($nomeUsuario)) {
                    Util::notificacao('erro', 'Usuário informado existe');
                    Util::redireciona('/');
                }
            } else {
                Util::notificacao('erro', 'Usuário não informado');
                Util::redireciona('/');
            }
        }

        $ticket = $this->ticketServico->criarTicket($cod, $usuario, $infoAdc, $assunto, $descricao);

        if ($ticket) {
            Util::notificacao('success', 'Parabéns, seu chamado foi resgistrado');
        } else {
            Util::notificacao('erro', 'Que pena, seu chamado não foi aceito. Contate a UEST no 3202-8551 para esclarecimentos');
        }

        Util::redireciona('/');
    }
}
