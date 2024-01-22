<?php
namespace Cosanpa\Infra\repositorys;

use Cosanpa\App\models\User;
use Cosanpa\Src\Repository;

class UsersRepository extends Repository
{
    public function findByName(string $name)
    {
        $qry = "SELECT
                    U.id,
                    U.name,
                    U.phone,
                    U.realname,
                    U.firstname,
                    U.user_dn,
                    E.email
                FROM
                    glpi_users as U
                LEFT JOIN
                    glpi_useremails as E
                ON
                    U.id = E.users_id AND E.is_default = 1
                WHERE
                    U.name = :name";

        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':name', $name);
        $stm->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $stm->execute();
        return $stm->fetch();
    }

    public function findByName2(string $name)
    {
        $qry = "SELECT name FROM {$this->tabela} WHERE name LIKE :name";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':name', $name);
        $stm->execute([':name' => $name . '%']);
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Funções Email ========================================================================

    public function saveDefaultEmail(User $user, String $email): bool
    {
        $userId = $user->id;
        $qry = "INSERT INTO glpi_useremails (users_id, is_default, email) VALUES ($userId,1,'$email')";
        $stm = $this->PDOconexao->prepare($qry);
        return $stm->execute();
    }

    public function updateDefaultEmail(User $user, String $email): bool
    {
        $userId = $user->id;
        $qry = "UPDATE glpi_useremails SET email = :email WHERE users_id = :id AND is_default = 1";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':id', $userId);
        return $stm->execute();
    }
    // Phone ==================================================================================
    public function updatePhoneUser(User $user, String $phone): bool
    {
        $id = $user->id;
        $qry = "UPDATE {$this->tabela} SET phone = :phone WHERE id = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':phone', $phone);
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }
    // =======================================================================================

    // public function autenticacaoLDAP($ldapBaseDN, $pass)
    // {
    //     $ldapServer = '10.20.1.7';

    //     $ldapConn = ldap_connect($ldapServer) or die("ERRO");
    //     ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
    //     ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);

    //     $ldapBind = ldap_bind($ldapConn, $ldapBaseDN, $pass);
    //     ldap_close($ldapConn);

    //     return $ldapBind;
    // }
}
