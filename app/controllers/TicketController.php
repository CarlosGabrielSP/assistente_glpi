<?php
namespace Cosanpa\App\controllers;

use Cosanpa\App\services\TicketService;
use Cosanpa\Src\Controller;
use Cosanpa\Src\Util;
use Psr\Http\Message\ServerRequestInterface;

class TicketController extends Controller
{
    public function abrirChamado(ServerRequestInterface $request): array
    {
        $params = filter_var_array($request->getParsedBody(),FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $nomeUsuario    = $params['nomeUsuario'];
        $cod            = $params['cod'];
        $assunto        = $params['assunto'];
        $descricao      = $params['descricao'];
        $infoAdc        = $params['infoAdc'];
        $infoEmail      = $params['email'];
        $infoSetor      = $params['setor'];
        $infoRamal      = $params['ramal'];

        $infoAdc .= '\n\nE-mail: ' . $infoEmail . '\n' . 'Setor: ' . $infoSetor . '\n' . 'Ramal: ' . $infoRamal;

        $ticket = (new TicketService)->criarTicket($cod, $nomeUsuario, $infoAdc, $assunto, $descricao, $infoEmail, $infoRamal);
        if ($ticket) {
            Util::notificacao(
                'success',
                "Sua solicitação foi registrada. O <strong>ID</strong> do seu chamado é <strong>t_{$ticket['id']}</strong>. Para acompanhar o progresso, <a target='_blank' href='http://suporte.cosanpa.pa.gov.br:8080/front/ticket.form.php?id={$ticket['id']}'>Clique aqui!</a>");
        } else {
            Util::notificacao('error', 'Que pena, seu chamado não foi aceito. Contate a UEST no 3202-8551 para esclarecimentos');
        }
        return Util::redireciona('/');
    }

    // public function listaChamados(): void
    // {
    //     $lista = (new TicketService)->buscaTodos();
    //     $this->view('tickets/lista', ['lista' => $lista]);
    // }
}
