<?php
namespace Cosanpa\App\services;

use Cosanpa\App\models\User;
use Cosanpa\Infra\UsersRepository;

class UserService
{
    private UsersRepository $repositorio;

    function __construct()
    {
        $this->repositorio = new UsersRepository;
    }

    public function login(String $login): bool
    {
        unset($_SESSION['user']);

        if (!$usuario = $this->repositorio->findByName($login)) {
            return false;
        }
        // $result = $this->repositorio->autenticacaoLDAP($usuario['user_dn'], $senha);
        // if (!$result) return [0, "A senha informada não confere. Para solicitar redefinição de senha <a href='#'>clique aqui</a> ", $usuario['name']];

        $email = ($this->repositorio->firstEmail($usuario->id)->email);

        $_SESSION['user']['id'] = $usuario->id;
        $_SESSION['user']['name'] = $usuario->name;
        $_SESSION['user']['firstname'] = $usuario->firstname;
        $_SESSION['user']['realname'] = $usuario->realname;
        $_SESSION['user']['phone'] = $usuario->phone ?? '';
        $_SESSION['user']['email'] = $email ?? '';

        return true;
    }

    public function logoff(): void
    {
        unset($_SESSION['user']);
    }

    public function buscaUsuario(String $nome): mixed
    {
        return $this->repositorio->findByName($nome);
    }

    public function userPhone(User $user, String $phone): bool
    {
        if($this->repositorio->updatePhoneUsuario($user, $phone)){
            $user->phone = $phone;
            $_SESSION['user']['phone'] = $phone;
            return true;
        }
        return false;
    }

    public function userEmail(int $userId, String $email) //Verifica, cadastra e atualiza o email do usuário
    {
        if(!$emailsXUsuario = $this->repositorio->firstEmail($userId)){ //Executa se usuario não possui email cadastrado
            $array_dados = [
                'users_id'  => $userId,
                'is_default'=> 1,
                'email' => $email
            ];
            if($resultado = $this->repositorio->saveEmail($array_dados)) $_SESSION['user']['email'] = $email; //atualiza o email do usuário na sessão
            return $resultado;
        }
        if($emailsXUsuario->email != $email){ //Executa se usuário informa email diferente do cadastrado
            if($resultado = $this->repositorio->updateEmail($emailsXUsuario->id, $email)) $_SESSION['user']['email'] = $email; //atualiza o email do usuário na sessão
            return $resultado;
        }
    }
}
