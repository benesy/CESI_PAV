<?php
require_once("Modele/Manager/MAdmin.php");
require_once("Modele/Manager/MAgent.php");

class           SLogin{

    public function log($user, $status){
        $_SESSION['id'] = $user->get_id();
        $_SESSION['nom'] = $user->get_nom();
        $_SESSION['prenom'] = $user->get_prenom();
        $_SESSION['login'] = $user->get_login();
        $_SESSION['status'] = $status;
    }

    public function checkAgentLogin($login, $password){
        $magent = new MAgent();
        $agent = $magent->getByLogin($login);
        if ($agent && ($agent->get_password() == $password)){
            $this->log($agent, "agent");
            return true;
        }
        return false;
    }

    public function checkAdminLogin($login, $password){
        $madmin = new MAdmin();
        $admin = $madmin->getByLogin($login);
        if ($admin && ($admin->get_password() == $password)){
            $this->log($admin, "admin");
            return true;
        }
        return false;
    }
}