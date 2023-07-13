<?php

namespace App\controllers;

use App\models\Ticket;
use App\models\Usuario;
use Cosanpa\PortalGlpi\Controller;
use Cosanpa\PortalGlpi\Infra\TicketsRepository;
use Cosanpa\PortalGlpi\Util;

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
        $info = htmlspecialchars($_POST['info']) ?? '';

        $usuario = new Usuario();
        if(!$usuario->autenticacao($_POST['login'])) {
            Util::redireciona('/',['alert'=>'Usuário não existe']);
        }

        if($resultado = $this->ticket->criarNovoTicket($cod, $login, $info, $assunto, $descricao)) {
            
        }

        // $usuario = new Usuario($_POST['login'],$_POST['senha']);
        // $usuario
        // if ($cod = $_POST['codigo'] ?? false) {
        //     $title = $_POST['assunto'] ?? '';
        //     $content = $_POST['descricao'] ?? '';
        //     $info = $_POST['info'] ?? '';
        //     $ticket = new Ticket();
        //     $ticket->criarNovoTicket($cod, $title, $content, $info);
        //     Util::redireciona('');
        // }
    }
}
