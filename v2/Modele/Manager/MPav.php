<?php
require_once("Modele/Manager/BDD.php");
require_once("Modele/Pav.php");

class               MPav extends BDD
{


    public function getById($id)
    {
        $res = $this->dbquery("SELECT * FROM `pav` WHERE `id` = '" . $id . "';");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $res = $res[0];
            $pav = new Pav();
            $pav->set_id($res['id']);
            $pav->set_numero($res['numero']);
            $pav->set_adresse($res['adresse']);
            $pav->set_code_postal($res['code_postal']);
            $pav->set_ville($res['ville']);
            return $pav;
        }
        return false;
    }

    public function getAll()
    {
        $res = $this->dbquery("SELECT * FROM `pav`;");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $listPav = array();
            foreach ($res as $dbPav) {
                $pav = new Pav();
                $pav->set_id($dbPav['id']);
                $pav->set_numero($dbPav['numero']);
                $pav->set_adresse($dbPav['adresse']);
                $pav->set_code_postal($dbPav['code_postal']);
                $pav->set_ville($dbPav['ville']);
                array_push($listPav, $pav);
            }
            return $listPav;
        }
        return false;
    }

    public function create($pav)
    {
        $this->dbquery("INSERT INTO `pav` (`id`, `numero`, `adresse`, `code_postal`, `ville`) VALUES (NULL, '" . $pav->get_numero() . "', '" . $pav->get_adresse() . "', '" . $pav->get_code_postal() . "', '" . $pav->get_ville() . "');");
        $res = $this->dbquery("SELECT * FROM `pav` WHERE `id` = LAST_INSERT_ID();");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $res = $res[0];
            $pav = new Pav();
            $pav->set_id($res['id']);
            $pav->set_numero($res['numero']);
            $pav->set_adresse($res['adresse']);
            $pav->set_code_postal($res['code_postal']);
            $pav->set_ville($res['ville']);
            return $pav;
        }
     }

    public function update($pav)
    {
        $res = $this->dbquery("UPDATE `pav` SET `numero` = '" . $pav->get_numero() . "', `adresse` = '" . $pav->get_adresse() . "', `code_postal` = '" . $pav->get_code_postal() . "', `ville` = '" . $pav->get_ville() . "' WHERE `pav`.`id` = '" . $pav->get_id() . "';");
    }

    public function delete($pav)
    {
        $this->dbquery("DELETE FROM `pav` WHERE `pav`.`id` = " . $pav->get_id() . ";");
    }
}
