<?php

class CAgent
{

    public function pavList()
    {
        $mtour = new MTournee();
        $mreleve = new MReleve();
        $mpav = new MPav();
        $tour = $mtour->getByDate(date("Y-m-d"), $_SESSION['id']);
        if ($tour) {
            $releveList = $mreleve->getAllByIdTournee($tour->get_id());
            $pavList = $mpav->getAll();
            if (!$releveList)
                $noTournee = true;
        } else
            $noTournee = true;
        require("View/AgentPavList.php");
        require("View/AgentMenu.php");
        require("View/Template.php");
    }

    public function pavReleve()
    {
        $mreleve = new MReleve();
        if (isset($_GET['id_releve']))
            $releve = $mreleve->getById($_GET['id_releve']);
        require("View/AgentPavReleve.php");
        require("View/AgentMenu.php");
        require("View/Template.php");
    }
}
