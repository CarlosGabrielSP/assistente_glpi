<?php

namespace App\controllers;

use Cosanpa\PortalGlpi\Controller;
use Cosanpa\PortalGlpi\Infra\UsersRepository;

class UsuarioController extends Controller
{
    public function pesquisaUsuario(){
        if(!$name = $_POST['nome'] ?? false){
            
        }

        $usuarioRepository = new UsersRepository();
        $usuarioRepository->findByName($_POST['nome']);
    }
}
