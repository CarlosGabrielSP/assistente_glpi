<?php
namespace Cosanpa\App\controllers;

use Cosanpa\App\services\TicketService;
use Cosanpa\App\services\UserService;
use Cosanpa\Src\Controller;
use Cosanpa\Src\Util;

class TicketController extends Controller
{
    private TicketService $ticketServico;

    public function __construct()
    {
        $this->ticketServico = new TicketService;
    }

    public function abrirChamado(): void
    {
        $nomeUsuario    = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cod            = filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $assunto        = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $descricao      = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $infoAdc        = filter_input(INPUT_POST, 'infoAdc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $infoEmail      = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $infoSetor      = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $infoRamal      = filter_input(INPUT_POST, 'ramal', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $infoAdc .= '\n\nE-mail: ' . $infoEmail . '\n' . 'Setor: ' . $infoSetor . '\n' . 'Ramal: ' . $infoRamal;
        
        if (!$usuario = $_SESSION['user']['name'] ?? false) { //Usuário não logado
            if ($nomeUsuario) {
                if (!(new UserService)->buscaUsuario($nomeUsuario)) { //Confirma se usuário informado existe
                    Util::notificacao('error', "Usuário informado não encontrado: {$nomeUsuario}. Entre em contato com a UEST no 3202-8551.");
                }
                $usuario = $nomeUsuario;
            } else {
                Util::notificacao('error', 'Usuário não informado');
            }
        }

        $ticket = $this->ticketServico->criarTicket($cod, $usuario, $infoAdc, $assunto, $descricao, $infoEmail, $infoRamal);
        if ($ticket) {
            Util::notificacao(
                'success',
                "Sua solicitação foi registrada. O <strong>ID</strong> do seu chamado é <strong>t_{$ticket['id']}</strong>. Para acompanhar o progresso, <a target='_blank' href='http://suporte.cosanpa.pa.gov.br:8080/front/ticket.form.php?id={$ticket['id']}'>Clique aqui!</a>");
        } else {
            Util::notificacao('error', 'Que pena, seu chamado não foi aceito. Contate a UEST no 3202-8551 para esclarecimentos');
        }
        Util::redireciona('/');
    }

    // public function listaChamados(): void
    // {
    //     $lista = $this->ticketServico->buscaTodos();
    //     $this->view('tickets/lista', ['lista' => $lista]);
    // }
}
