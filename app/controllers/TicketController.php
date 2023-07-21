<?php

namespace App\controllers;

use App\models\User;
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
        if(!isset($_SESSION['login']) || empty($_SESSION['login'])){
            Util::redireciona('/',['alert'=>'Usuario não logado']);
        }

        $cod = htmlspecialchars($_POST['cod']) ?? '';
        $login = htmlspecialchars($_POST['login']) ?? ''; 
        $assunto = htmlspecialchars($_POST['assunto']) ?? '';
        $descricao = htmlspecialchars($_POST['descricao']) ?? '';
        $infoAdc = htmlspecialchars($_POST['info']) ?? '';

        $drt = htmlspecialchars($_POST['drt']) ?? '';
        $nome = htmlspecialchars($_POST['nome']) ?? '';
        $setor = htmlspecialchars($_POST['setor']) ?? '';
        $pasta = htmlspecialchars($_POST['pasta']) ?? '';

        $usuario = new User();

        $userService = new UserService();
        if(!$infoUser = $userService->login($login,$senha)) {
            Util::redireciona('/',['alert'=>'Usuário não existe']);
        }

        $this->ticketServico->criarTicket($cod, $infoUser, $infoAdc, $assunto, $descricao);

        if($ticket = $this->ticketServico->criarTicket($cod, $infoUser, $infoAdc, $assunto, $descricao)) {
            Util::redireciona('/',['alert'=>'Parabéns, seu chamado foi resgistrado','ticket'=>$ticket['id']]);
        }

        Util::redireciona('/',['alert'=>'Que pena, seu chamado não foi aceito. Contate a UEST no 3202-8551 para esclarecimentos']);

    }
}
