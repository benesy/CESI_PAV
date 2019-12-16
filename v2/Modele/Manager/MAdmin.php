<?php
require_once("Modele/Manager/BDD.php");
require_once("Modele/Admin.php");


class MAdmin extends BDD
{
    public function getByLogin($login){
        $res = $this->dbquery("SELECT * FROM `admin` WHERE `login` = '".$login."';");
        $res = $res->fetchAll();
        if (isset($res[0]['password'])){
            $res = $res[0];
            $admin = new Admin();
            $admin-> set_id($res['id']);
            $admin-> set_nom($res['nom']);
            $admin-> set_prenom($res['prenom']);
            $admin-> set_login($res['login']);
            $admin-> set_password($res['password']);
            return $admin;
        }
        return false;
    }
}
?>