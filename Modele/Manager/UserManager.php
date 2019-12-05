<?php
require_once('Modele/Manager/BDD.php');
require_once('Modele/MUser.php');

class   UserManager extends BDD{
    // Load l'user en BDD et return un type USER.
    // return null si l'user n'existe pas en BDD.
    public function getUser($login)
    {
        $usr = new MUser();

        $usr->setName("");
        $usr->setPwd("");
        $usr->setStatus("");
        $res = $this->dbquery("SELECT login, pwd, status FROM user WHERE login='".$login."';");
        $res = $res->fetch();
        if ($res['login'] != ""){
            $usr->setName($res['login']);
            $usr->setPwd($res['pwd']);
            $usr->setStatus($res['status']);
        }
        return $usr;
    }

    // Ajoute en BDD le USER passé en parametre
    // Renvoie un void
    public function addUser($user)
    {
        //ajoute un user en bdd
    }

}