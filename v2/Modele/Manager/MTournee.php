<?php

require_once("Modele/Tournee.php");

class           MTournee extends BDD
{

    public function getById($id)
    {
        $res = $this->dbquery("SELECT * FROM `tournee` WHERE `id` = '" . $id . "';");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $res = $res[0];
            $tour = new Tournee();
            $tour->set_id($res['id']);
            $tour->set_date($res['date']);
            $tour->set_id_agent($res['id_agent']);
            return $tour;
        }
        return false;
    }

    public function getAll()
    {
        $res = $this->dbquery("SELECT * FROM `tournee`;");
        $res = $res->fetchAll();
        if (isset($res[0]['id'])) {
            $listTour = array();
            foreach ($res as $dbTournee) {
                $tour = new Tournee();
                $tour->set_id($dbTournee['id']);
                $tour->set_date($dbTournee['date']);
                $tour->set_id_agent($dbTournee['id_agent']);
                array_push($listTour, $tour);
            }
            return $listTour;
        }
        return false;
    }

    public function create($tour)
    {
        $this->dbquery("INSERT INTO `tournee` (`id`, `date`, `id_agent`) VALUES (NULL, " . $tour->get_date() . ", " . $tour->get_id_agent() . ");");
    }

    public function update($tour)
    {
        $this->dbquery("UPDATE `tournee` SET `date` = " . $tour->get_date() . ", `id_agent` = " . $tour->get_id_agent() . " WHERE `tournee`.`id` = " . $tour->get_id() . ";");
    }

    public function delete($tour)
    {
        $this->dbquery("DELETE FROM `tournee` WHERE `tournee`.`id` = " . $tour->get_id() . ";");
    }
}
