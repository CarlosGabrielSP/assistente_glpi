<?php

namespace App\services;

use Cosanpa\PortalGlpi\Infra\UsersRepository;

class UserService
{
    private $repositorio;

    function __construct()
    {
        $this->repositorio = new UsersRepository;
    }

    public function login($login, $senha): array
    {
        unset($_SESSION['user']);

        if (!$usuario = $this->repositorio->findByName($login)) return [0, "Usuário não cadastrado"];

        $result = $this->repositorio->autenticacao($usuario['user_dn'], $senha);

        if (!$result) return [0, "A senha informada não confere", $usuario['name']];

        $_SESSION['user']['id'] = $usuario['id'];
        $_SESSION['user']['name'] = $usuario['name'];
        $_SESSION['user']['firstname'] = $usuario['firstname'];
        $_SESSION['user']['realname'] = $usuario['realname'];
        return [1];
    }

    public function logoff()
    {
        unset($_SESSION['user']);
    }

    public function buscaUsuario($nome)
    {
        return $this->repositorio->findByName($nome);
    }


}
