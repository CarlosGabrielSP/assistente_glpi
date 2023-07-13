<?php

namespace App\models;

use Cosanpa\PortalGlpi\Infra\UsersRepository;

class Usuario
{
    private $login;
    private $senha;

    // function __cosntruct($login)
    // {
    //     $this->login = $login;
    //     // $this->senha = $senha;
    // }

    public function autentica($nome,$senha)
    {
        $usuarioRepository = new UsersRepository();
            if($dadosUsuario = $usuarioRepository->findByName($nome,$senha)) {
            
        }

    }

}
