<?php
namespace Cosanpa\App\services;

use Cosanpa\App\models\User;
use Cosanpa\Infra\repositorys\UsersRepository;
use Cosanpa\Src\Util;

class UserService
{
    private UsersRepository $repositorio;

    function __construct()
    {
        $this->repositorio = new UsersRepository();
    }

    public function login(String $login): bool
    {
        unset($_SESSION['user']);

        if (!$usuario = $this->repositorio->findByName($login)) {
            return false;
        }
        // $result = $this->repositorio->autenticacaoLDAP($usuario['user_dn'], $senha);
        // if (!$result) return [0, "A senha informada não confere. Para solicitar redefinição de senha <a href='#'>clique aqui</a> ", $usuario['name']];
        $_SESSION['user']['id'] = $usuario->id;
        $_SESSION['user']['name'] = $usuario->name;
        $_SESSION['user']['firstname'] = $usuario->firstname;
        $_SESSION['user']['realname'] = $usuario->realname;
        $_SESSION['user']['phone'] = $usuario->phone ?? '';
        $_SESSION['user']['email'] = $usuario->email ?? '';
        return true;
    }

    public function logoff(): void
    {
        unset($_SESSION['user']);
        Util::redireciona();
    }

    public function buscaUsuario(String $nome): mixed
    {
        return $this->repositorio->findByName($nome);
    }

    public function verificaPhoneUsuario(User $user, String $phone): bool
    {
        if($this->repositorio->updatePhoneUser($user, $phone)){
            $_SESSION['user']['phone'] = $phone;
            return true;
        }
        return false;
    }

    public function verificaEmailUsuario(User $user, String $email): bool //Verifica, cadastra ou atualiza o email do usuário
    {
        if(!$user->email){ //Confere se o usuário possui email cadastrado
            if($resultado = $this->repositorio->saveDefaultEmail($user, $email)){ //Cadastra um email para o usuário
                $_SESSION['user']['email'] = $email; //Atualiza a SESSION 
            }
            return $resultado;
        }
        if($user->email != $email){ //Confere se o email o usuário é diferente do email informado
            if($this->repositorio->updateDefaultEmail($user, $email)){
                $_SESSION['user']['email'] = $email; //atualiza o email do usuário na sessão
            }
        }
        return true;
    }
}
