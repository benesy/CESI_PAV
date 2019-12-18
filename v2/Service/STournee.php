<?php
require_once("Modele/Manager/MTournee.php");

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

        return true;
        return false;
    }

    public function deletPav()
    {
        return true;
        return false;
    }

    public function getPav()
    {
        return false;
    }

    public function getTourList()
    {
        $mpav = new MPav();
        return $mpav->getAll();
    }
}
