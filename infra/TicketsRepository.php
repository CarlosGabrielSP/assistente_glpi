<?php

namespace Cosanpa\PortalGlpi\Infra;

use Cosanpa\PortalGlpi\Repository;

class TicketsRepository extends Repository
{
    public function saveTicket($array_dados)
    {
        if($lastTicket = $this->save($array_dados)) {
            $tickets_id = $lastTicket['id'];
            $users_id = $array_dados['users_id_recipient'];
            $qry = "INSERT INTO glpi_tickets_users (tickets_id, users_id, type, use_notification) VALUES ($tickets_id, $users_id, '1', '1')";
            return $this->PDOconexao->query($qry);
        }
        return false;
    }
}
