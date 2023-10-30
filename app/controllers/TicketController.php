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
        $nomeUsuario    = htmlspecialchars($_POST['nomeUsuario'] ?? false);
        $cod            = htmlspecialchars($_POST['cod'] ?? '');
        $assunto        = htmlspecialchars($_POST['assunto'] ?? '');
        $descricao      = htmlspecialchars($_POST['descricao'] ?? '');
        $infoAdc        = htmlspecialchars($_POST['infoAdc'] ?? '');
        $infoEmail      = htmlspecialchars($_POST['email'] ?? '');
        $infoSetor      = htmlspecialchars($_POST['setor'] ?? '');
        $infoRamal      = htmlspecialchars($_POST['ramal'] ?? '');

        $infoAdc .= '\n\nE-mail: ' . $infoEmail . '\n' . 'Setor: ' . $infoSetor . '\n' . 'Ramal: ' . $infoRamal;
        
        if (!$usuario = $_SESSION['user'] ?? false) {
            if ($nomeUsuario) {
                if (!$usuario = (new UserService)->buscaUsuario($nomeUsuario)) {
                    Util::notificacao('error', "Usuário informado não encontrado: {$nomeUsuario}. Entre em contato com a UEST no 3202-8551.");
                    Util::redireciona('/');
                }
            } else {
                Util::notificacao('error', 'Usuário não informado');
                Util::redireciona('/');
            }
        }
        $ticket = $this->ticketServico->criarTicket($cod, $usuario, $infoAdc, $assunto, $descricao, $infoEmail);
        if ($ticket) {
            Util::notificacao(
                'success',
                "Sua solicitação foi registrada. O <strong>ID</strong> do seu chamado é <strong>t_{$ticket['id']}</strong>. Para acompanhar o progresso, <a target='_blank' href='http://suporte.cosanpa.pa.gov.br:8080/front/ticket.form.php?id={$ticket['id']}'>Clique aqui!</a>");
        } else {
            Util::notificacao('error', 'Que pena, seu chamado não foi aceito. Contate a UEST no 3202-8551 para esclarecimentos');
        }

        Util::redireciona('/');
    }
}
