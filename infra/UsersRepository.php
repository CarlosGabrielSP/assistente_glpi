<?php
namespace Cosanpa\Infra;

use Cosanpa\Src\Repository;

class UsersRepository extends Repository
{
    public function findByName(string $name)
    {
        $qry = "SELECT id,name,firstname,realname,phone,user_dn FROM {$this->tabela} WHERE name = :name";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':name', $name);
        $stm->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
        $stm->execute();
        return $stm->fetch();
    }

    public function findByName2(string $name)
    {
        $qry = "SELECT name FROM {$this->tabela} WHERE name LIKE :name";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':name', $name);
        $stm->setFetchMode(\PDO::FETCH_ASSOC);
        $stm->execute([':name' => $name . '%']);
        return $stm->fetchAll();
    }

    // Funções Email ========================================================================
    public function firstEmail($userId)
    {
        $qry = "SELECT * FROM glpi_useremails WHERE users_id = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':id', $userId);
        $stm->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
        $stm->execute();
        return $stm->fetch();
    }

    public function saveEmail(array $array_dados): bool
    {
        $colunas = implode(",", array_keys($array_dados));
        $valores = implode("','", $array_dados);
        $qry = "INSERT INTO glpi_useremails ({$colunas}) VALUES ('{$valores}')";
        $stm = $this->PDOconexao->prepare($qry);
        return $stm->execute();
    }

    public function updateEmail(int $id, String $email): bool
    {
        $qry = "UPDATE glpi_useremails SET email = :email WHERE id = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }
    // Phone ==================================================================================
    public function updatePhoneUsuario(int $idUsuario, String $phone): bool
    {
        $qry = "UPDATE {$this->tabela} SET phone = :phone WHERE id = :id";
        $stm = $this->PDOconexao->prepare($qry);
        $stm->bindParam(':phone', $phone);
        $stm->bindParam(':id', $idUsuario);
        return $stm->execute();
    }

    // =======================================================================================

    public function autenticacaoLDAP($ldapBaseDN, $pass)
    {
        $ldapServer = '10.20.1.7';

        $ldapConn = ldap_connect($ldapServer) or die("ERRO");
        ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);

        $ldapBind = ldap_bind($ldapConn, $ldapBaseDN, $pass);
        ldap_close($ldapConn);

        return $ldapBind;
    }
}
