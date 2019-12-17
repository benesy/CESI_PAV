<?php
require_once("Modele/Manager/MAgent.php");

class       SAgent
{

    private function    checkForm()
    {
        if (
            isset($_POST['nom']) && !empty($_POST['nom']) &&
            isset($_POST['prenom']) && !empty($_POST['prenom']) &&
            isset($_POST['login']) && !empty($_POST['login']) &&
            isset($_POST['password']) && !empty($_POST['password'])
        ) {
            return true;
        }
        return false;
    }

    public function     createAgent()
    {
        if ($this->checkForm()) {
            $agent = new Agent();
            $magent = new MAgent();
            $agent->set_nom($_POST['nom']);
            $agent->set_prenom($_POST['prenom']);
            $agent->set_login($_POST['login']);
            $agent->set_password($_POST['password']);
            $magent->create($agent);
            return true;
         }
         return false;
    }
}
