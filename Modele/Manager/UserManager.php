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
        $usr->setFirstName("");
        $usr->setLastName("");
        $usr->setStatus("");
        $res = $this->dbquery("SELECT login, pwd, firstName, lastName, status FROM user WHERE login='".$login."';");
        $res = $res->fetch();
        if ($res['login'] != ""){
            $usr->setName($res['login']);
            $usr->setFirstName($res['firstName']);
            $usr->setLastName($res['lastName']);
            $usr->setPwd($res['pwd']);
            $usr->setStatus($res['status']);
        }
        return $usr;
    }

    // Ajoute en BDD le USER passé en parametre
    public function addUser($user)
    {
        $res = $this->dbquery("SELECT `login` FROM `user` WHERE `login` = '".$user->getName()."';");
        $res = $res->fetch();
        if(isset($res['login']) && $res['login'] != "")
            return false;
        $res = $this->dbquery("INSERT INTO `user` (  `login`, `firstName`, `lastName`, `status`, `pwd`) VALUES ('".$user->getName()."','".$user->getFirstName()."','".$user->getLastName()."', '3', '".MD5($user->getPwd())."');");
        return true;
    }

    public function getAgentList(){
        $res = $this->dbquery("SELECT `login`, `firstName`, `lastName` FROM `user` WHERE `status` = '3';");
        $res = $res->fetchAll();
        return $res;
    }

    public function delUser($user) {
        $res = $this->dbquery("DELETE FROM `user` WHERE `login` = '".$user."';");
        return $res;
    }

    public function editUser($usr){
        $res = $this->dbquery("UPDATE `user` SET `firstName` = '".$usr->getFirstName()."', `lastName` = '".$usr->getLastName()."' WHERE `login` = '".$usr->getName()."';");
        return $res;

    }

    public function editUserPwd($usr){
        $res = $this->dbquery("UPDATE `user` SET `pwd` = '".$usr->getPwd()."' WHERE `login` = '".$usr->getName()."';");
        return $res;
    }

}