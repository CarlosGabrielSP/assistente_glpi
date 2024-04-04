<?php
namespace Cosanpa\App\controllers;

use Cosanpa\App\services\TicketService;
use Cosanpa\Src\Controller;
use Cosanpa\Src\Helper;
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
            Helper::notificacao(
                'success',
                "Sua solicitação foi registrada. O <strong>ID</strong> do seu chamado é <strong>t_{$ticket['id']}</strong>. Para acompanhar o progresso, <a target='_blank' href='http://suporte.cosanpa.pa.gov.br:8080/front/ticket.form.php?id={$ticket['id']}'>Clique aqui!</a>");
        } else {
            Helper::notificacao('error', 'Que pena, seu chamado não foi aceito. Contate a UEST no 3202-8551 para esclarecimentos');
        }
        //Refatorar, deve ser redirecionado para index, mantendo a varivável $_SESSION
        $partResponse['body'] = $this->renderView(view:"index");
        return $partResponse;
    }
}
