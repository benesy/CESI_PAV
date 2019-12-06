<?php
require_once('Modele/Manager/BDD.php');
require_once('Modele/MPav.php');

class PavManager extends BDD {

    public function addPav($pav){
        echo "addPav";
        $this->dbquery("INSERT INTO `pav` (`id`, `adress`, `fullness`) VALUES (NULL, '".$pav->getAdress()."', '".$pav->getFullness()."');");
    }

    public function updatePav($pav){
        echo "updatePav";
    }

    public function deletePav($id){
        echo "deletePav";
    }

    public function getPav($id){
        echo "getPavPav";
    }

    public function getAllPav(){
        $res = $this->dbquery("SELECT * FROM pav;");
        $res = $res->fetchall();
        return $res;
    }
}