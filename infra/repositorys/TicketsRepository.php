<?php
namespace Cosanpa\Infra\repositorys;

use Cosanpa\Src\Repository;

class TicketsRepository extends Repository
{
    public function saveTicket($array_dados)
    {
        if($newTicket = $this->save($array_dados)) {
            $tickets_id = $newTicket['id'];
            $users_id = $array_dados['users_id_recipient'];
            $qry = "INSERT INTO glpi_tickets_users (tickets_id, users_id, type, use_notification) VALUES ($tickets_id, $users_id, '1', '1')";
            $this->PDOconexao->query($qry);
            return $newTicket;
        }
        return false;
    }
}
