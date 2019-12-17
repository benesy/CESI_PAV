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

    private function checkIDAgent()
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
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

    public function editAgent(){
        if ($this->checkIDAgent() && $this->checkForm()){
            $agent = new Agent();
            $magent = new MAgent();
            $agent->set_id($_POST['id']);
            $agent->set_nom($_POST['nom']);
            $agent->set_prenom($_POST['prenom']);
            $agent->set_login($_POST['login']);
            $agent->set_password($_POST['password']);
            $magent->update($agent);
            return true;
        }
        return false;
    }

    public function deletAgent(){
        if ($this->checkIDAgent()){
            $agent = new Agent();
            $magent = new MAgent();
            $agent->set_id($_POST['id']);
            $magent->delete($agent);
            return true;
        }
        return false;
    }

    public function getAgent(){
        if ($this->checkIDAgent()){
            $magent = new MAgent();
            return $magent->getById($_POST['id']);
        }
        return false;
    }

    public function getAgentList(){
        $magent = new MAgent();
        return $magent->getAll();
    }
}
