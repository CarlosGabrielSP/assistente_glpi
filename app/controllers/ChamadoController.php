<?php

namespace App\controllers;

use App\models\Chamado;
use Cosanpa\PortalGlpi\Controller;

class ChamadoController extends Controller
{
    public function listaChamados()
    {
        $chamado = new Chamado();
        $lista = $chamado->buscaTodos();
        $this->view('tickets/lista', ['lista'=>$lista]);
    }

    // public function chamado1()
    // {
    //     $titulo = $_POST['titulo'];
    //     $descricao = $_POST['descricao'];
    //     $repositoryChamado = new RepositoryChamado();
    //     if($repositoryChamado->criarChamado($titulo, $descricao)){
    //     }
    // }

}
