<?php
require_once("Modele/Manager/BDD.php");
require_once("Modele/Releve.php");

class           MReleve extends BDD
{

    public function getById($id)
    {
        $res = $this->dbquery("SELECT * FROM `releve` WHERE `id` = '" . $id . "';");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $res = $res[0];
            $releve = new Releve();
            $releve->set_id($res['id']);
            $releve->set_status($res['status']);
            $releve->set_date($res['date']);
            $releve->set_niveau($res['niveau']);
            $releve->set_commentaire($res['commentaire']);
            $releve->set_id_tournee($res['id_tournee']);
            $releve->set_id_pav($res['id_pav']);
            return $releve;
        }
        return false;
    }

    public function getByPavTourneeID($pav, $tournee)
    {
        $res = $this->dbquery("SELECT * FROM `releve` WHERE `id_pav` = '" . $pav . "' AND `id_tournee` = '" . $tournee . "' ;");
        $res = $res->fetchAll();
        if (isset($res[0]['id']))
            return $res;
        return false;
    }

    public function getAllByIdTournee($id_tournee)
    {
        $res = $this->dbquery("SELECT * FROM `releve` WHERE `id_tournee` = '" . $id_tournee . "';");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $listReleve = array();
            foreach ($res as $dbRe) {
                $releve = new Releve();
                $releve->set_id($dbRe['id']);
                $releve->set_status($dbRe['status']);
                $releve->set_date($dbRe['date']);
                $releve->set_niveau($dbRe['niveau']);
                $releve->set_commentaire($dbRe['commentaire']);
                $releve->set_id_tournee($dbRe['id_tournee']);
                $releve->set_id_pav($dbRe['id_pav']);
                array_push($listReleve, $releve);
            }
            return $listReleve;
        }
        return false;
    }

    public function getAll()
    {
        $res = $this->dbquery("SELECT * FROM `releve`;");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $listReleve = array();
            foreach ($res as $dbRe) {
                $releve = new Releve();
                $releve->set_id($dbRe['id']);
                $releve->set_status($dbRe['status']);
                $releve->set_date($dbRe['date']);
                $releve->set_niveau($dbRe['niveau']);
                $releve->set_commentaire($dbRe['commentaire']);
                $releve->set_id_tournee($dbRe['id_tournee']);
                $releve->set_id_pav($dbRe['id_pav']);
                array_push($listReleve, $releve);
            }
            return $listReleve;
        }
        return false;
    }

    public function create($releve)
    {
        $this->dbquery("INSERT INTO `releve` (`id`, `status`, `date`, `niveau`, `commentaire`, `id_tournee`, `id_pav`) VALUES (NULL, '" . $releve->get_status() . "', NULL, NULL, NULL, '" . $releve->get_id_tournee() . "', '" . $releve->get_id_pav() . "');");
        $res = $this->dbquery("SELECT * FROM `releve` WHERE `id` = LAST_INSERT_ID();");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $res = $res[0];
            $releve = new Releve();
            $releve->set_id($res['id']);
            $releve->set_status($res['status']);
            $releve->set_date($res['date']);
            $releve->set_niveau($res['niveau']);
            $releve->set_commentaire($res['commentaire']);
            $releve->set_id_tournee($res['id_tournee']);
            $releve->set_id_pav($res['id_pav']);
            return $releve;
        }
    }

    public function update($releve)
    {
        $this->dbquery("UPDATE `releve` SET `status` = '" . $releve->get_status() . "', `date` = '" . $releve->get_date() . "', `niveau` = '" . $releve->get_niveau() . "', `commentaire` = '" . $releve->get_commentaire() . "', `id_tournee` = '" . $releve->get_id_tournee() . "', `id_pav` = '" . $releve->get_id_pav() . "' WHERE `releve`.`id` = '" . $releve->get_id() . "';");
    }

    public function updateByAgent($releve)
    {
        $this->dbquery("UPDATE `releve` SET `status` = '" . $releve->get_status() . "', `date` = '" . $releve->get_date() . "', `niveau` = '" . $releve->get_niveau() . "', `commentaire` = '" . $releve->get_commentaire() . "' WHERE `releve`.`id` = '" . $releve->get_id() . "';");
    }

    public function deleteByPavId($pav, $tournee)
    {
        $this->dbquery("DELETE FROM `releve` WHERE `releve`.`id_pav` = '" . $pav->get_id() . "' AND `releve`.`id_tournee` = '" . $tournee->get_id() . "';");
    }

    public function delete($releve)
    {
        $this->dbquery("DELETE FROM `releve` WHERE `releve`.`id` = " . $releve->get_id() . ";");
    }
}
