<?php

class           MAgent extends BDD
{

    public function getByLogin($login)
    {
        $res = $this->dbquery("SELECT * FROM `agent` WHERE `login` = '" . $login . "';");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $res = $res[0];
            $agent = new Agent();
            $agent->set_id($res['id']);
            $agent->set_nom($res['nom']);
            $agent->set_prenom($res['prenom']);
            $agent->set_login($res['login']);
            $agent->set_password($res['password']);
            return $agent;
        }
        return false;
    }

    public function getById($id)
    {
        $res = $this->dbquery("SELECT * FROM `agent` WHERE `id` = '" . $id . "';");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $res = $res[0];
            $agent = new Agent();
            $agent->set_id($res['id']);
            $agent->set_nom($res['nom']);
            $agent->set_prenom($res['prenom']);
            $agent->set_login($res['login']);
            $agent->set_password($res['password']);
            return $agent;
        }
        return false;
    }

    public function getAll()
    {
        $res = $this->dbquery("SELECT * FROM `agent`;");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $listAgent = array();
            foreach ($res as $dbAgent) {
                $agent = new Agent();
                $agent->set_id($dbAgent['id']);
                $agent->set_nom($dbAgent['nom']);
                $agent->set_prenom($dbAgent['prenom']);
                $agent->set_login($dbAgent['login']);
                $agent->set_password($dbAgent['password']);
                array_push($listAgent, $agent);
            }
            return $listAgent;
        }
        return false;
    }
}
