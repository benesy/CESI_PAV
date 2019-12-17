<?php
require_once("Modele/Manager/MPav.php");

class       SPav
{

    private function    checkForm()
    {
        if (
            isset($_POST['numero']) && !empty($_POST['numero']) &&
            isset($_POST['adresse']) && !empty($_POST['adresse']) &&
            isset($_POST['code_postal']) && !empty($_POST['code_postal']) &&
            isset($_POST['ville']) && !empty($_POST['ville'])
        ) {
            return true;
        }
        return false;
    }

    private function checkIDPav()
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            return true;
        }
        return false;
    }

    public function     createPav()
    {
        if ($this->checkForm()) {
            $pav = new Pav();
            $mpav = new MPav();
            $pav->set_numero($_POST['numero']);
            $pav->set_adresse($_POST['adresse']);
            $pav->set_code_postal($_POST['code_postal']);
            $pav->set_ville($_POST['ville']);
            $mpav->create($pav);
            return true;
        }
        return false;
    }

    public function editPav(){
        if ($this->checkIDPav() && $this->checkForm()){
            $pav = new Pav();
            $mpav = new MPav();
            $pav->set_id($_POST['id']);
            $pav->set_numero($_POST['numero']);
            $pav->set_adresse($_POST['adresse']);
            $pav->set_code_postal($_POST['code_postal']);
            $pav->set_ville($_POST['ville']);
            $mpav->update($pav);
            return true;
        }
        return false;
    }

    public function deletPav(){
        if ($this->checkIDPav()){
            $pav = new Pav();
            $mpav = new MAgent();
            $pav->set_id($_POST['id']);
            $mpav->delete($pav);
            return true;
        }
        return false;
    }

    public function getPav(){
        if ($this->checkIDPav()){
            $mpav = new MPav();
            return $mpav->getById($_POST['id']);
        }
        return false;
    }

    public function getPavList(){
        $mpav = new MPav();
        return $mpav->getAll();
    }
}
