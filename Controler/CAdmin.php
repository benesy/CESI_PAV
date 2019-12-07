<?php
require_once("Modele/MPav.php");
require_once("Modele/Manager/PavManager.php");

class   CAdmin{


    //-----------------------------
    //     Rootage des pages
    //-----------------------------

    public function root(){
        if (isset($_GET['page']))
            {
                if ($_GET['page'] == "deconnection"){
                    session_unset();
                    session_destroy();
                    header('location:index.php');
                    }
                else if ($_GET['page'] == "gpav"){
                    $this->menuPav();
                }
                else if ($_GET['page'] == "gcomptes"){
                    // creation par defaut
                    if ((isset($_GET['action']) && $_GET['action']  == "creation") ||
                        (!isset($_GET['action'])))
                            $this->menuCreation();

                    // modifiction/supression
                    if (isset($_GET['action']) && $_GET['action']  == "edit")
                        $this->menuEdit();
                }
                else   
                $this->display("", "");
            }
        else
            $this-> display("","");
    }


    //-----------------------------
    //      Ajout d'un agent
    //-----------------------------

    private function menuCreation(){
        $soutitre = "Création agent";
        $sousMenu = "admGestionCompte";
        $title = "Création Agent";

        if ((isset($_POST['login']) && $_POST['login'] != "") &&
            (isset($_POST['pwd']) && $_POST['pwd'] != "") &&
            (isset($_POST['firstName']) && $_POST['firstName'] != "") &&
            (isset($_POST['lastName']) && $_POST['lastName'] != "")){
                $usr = new MUser();
                $usrManager = new UserManager();

                $usr->setName($_POST['login']);
                $usr->setPwd($_POST['pwd']);
                $usr->setFirstName($_POST['firstName']);
                $usr->setLastName($_POST['lastName']);
                $validation = 2;
                if ($usrManager->addUser($usr) == true)
                    $validation = 1;
            }
        require('View/VAddNewLogin.php');
        $this->display($title, $content);
    }


    //-----------------------------
    //      Edition d'un agent
    //-----------------------------

    private function menuEdit(){
        $soutitre = "Modification agent";
        $sousMenu = "admGestionCompte";
        $agentList = "";
        $usr = new MUser();
        $usrManager = new UserManager();
 
        if (isset($_POST['edit'])){
            if (isset($_POST['loginEdit']) &&
                isset($_POST['firstName']) &&
                isset($_POST['lastName'])){
                    $usr->setName($_POST['loginEdit']);
                    $usr->setFirstName($_POST['firstName']);
                    $usr->setLastName($_POST['lastName']);
                    $usrManager->editUser($usr);
                    if (isset($_POST['pwd']) && !empty($_POST['pwd']))
                    {
                        $usr->setPwd(MD5($_POST['pwd']));
                        $usrManager->editUserPwd($usr);
                    }
                $validation = 1;
                }
            $title = "Modifictation Agent";
            $bduser = $usrManager->getUser($_POST['loginEdit']);
            $vuser = $bduser->getName();
            $vfirstname = $bduser->getFirstName();
            $vlastname = $bduser->getLastName();
            require('View/VEditSelectedLogin.php');
        }
        else {
            $title = "Edition Agent";
            if (isset($_POST['suppr']))
                $usrManager->delUser($_POST['loginEdit']);

            $res = $usrManager->getAgentList();
            foreach($res as $tmp)
                {
                    $agentList .= "<option value=".$tmp['login'].">".$tmp['login']." - ".$tmp['firstName']." ".$tmp['lastName']."</option>";
                }
            require('View/VEditAgent.php');
        }
        $this->display($title,$content);
    }

    private function menuPav(){
        $title = "menu Pav";
        $content = "toto";
        $pav = new PavManager();
        $mypav1 = new MPav();
        $mypav1->setId(1);
        $mypav1->setAdress("rue des martyrs 33000 chateau de la mort lente");
        $mypav1->setFullness(3);
//        $pav->addPav($mypav1);
        $res = $pav->getAllPav();
        foreach($res as $i)
        {
            print_r($i);
            echo "<br/>";
        }



        $this->display($title, $content);

    }

    //-----------------------------
    //    Affichage de la page 
    //-----------------------------

    public function display($title, $content){

        require('View/VAdminMenu.php');
        require('View/VDeconnectMenu.php');
        require('View/VTemplate.php');
    }
}