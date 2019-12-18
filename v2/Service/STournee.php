<?php
require_once("Modele/Manager/MTournee.php");
require_once("Modele/Manager/MReleve.php");

class       STournee
{

    private function    checkForm1()
    {
        if (
            isset($_POST['date']) && !empty($_POST['date']) &&
            isset($_POST['id_agent']) && !empty($_POST['id_agent'])
        ) {
            return true;
        }
        return false;
    }

    private function    checkForm2()
    {
        if (
            isset($_POST['id_pav']) && !empty($_POST['id_pav'])
        ) {
            return true;
        }
        return false;
    }

    private function checkIDTour()
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            return true;
        }
        return false;
    }

    public function     createTour()
    {
        if ($this->checkForm1()) {
            $mtour = new MTournee();
            $tour = new Tournee();
            $tour->set_date($_POST['date']);
            $tour->set_id_agent($_POST['id_agent']);
            $tour = $mtour->create($tour);
            return $tour;
        }
        return false;
    }

    public function editTour()
    {
        if ($this->checkIDTour() && $this->checkForm1()) {
            $mtour = new MTournee();
            $tour = new Tournee();
            $tour->set_id($_POST['id']);
            $tour->set_id_agent($_POST['id_agent']);
            $tour->set_date($_POST['date']);
            $mtour->update($tour);
            return true;
        } else if ($this->checkIDTour() && $this->checkForm2()) {
            $mreleve = new MReleve();
            $releve = new Releve();
            $releve->set_status('w');
            $releve->set_id_tournee($_POST['id']);
            $releve->set_id_pav($_POST['id_pav']);
            if (!$mreleve->getByPavTourneeID($releve->get_id_pav(), $releve->get_id_tournee())) {
                $mreleve->create($releve);
                return true;
            }
            return false;
        }
        return false;
    }

    public function deletPav()
    {
        if (isset($_GET['id_tournee']) && isset($_GET['id_pav'])) {
            $pav = new Pav();
            $pav->set_id($_GET['id_pav']);
            $tour = new Tournee();
            $tour->set_id($_GET['id_tournee']);
            $mreleve = new MReleve();
            $mreleve->deleteByPavId($pav, $tour);
            $_POST['id'] = $tour->get_id();
            return true;
        }
        return false;
    }

    public function getTour()
    {
        if ($this->checkIDTour()) {
            $mtour = new MTournee();
            return $mtour->getById($_POST['id']);
        }
        return false;
    }

    public function getPavTourList($tournee)
    {
        $pavList = array();
        $mreleve = new MReleve();
        $mpav = new MPav();
        $releveList = $mreleve->getAllByIdTournee($tournee->get_id());
        if ($releveList != false) {
            foreach ($releveList as $releve) {
                array_push($pavList, $mpav->getById($releve->get_id_pav()));
            }
        }
        return $pavList;
    }

    public function delTour()
    {
        $mtour = new MTournee();
        $tour = new Tournee();
        $tour->set_id($_POST['id']);
        $mtour->delete($tour);
    }

    public function getTourList()
    {
        $mtour = new MTournee();
        return $mtour->getAll();
    }
}
