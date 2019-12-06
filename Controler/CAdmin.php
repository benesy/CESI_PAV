<?php

class   CAdmin{

    public function root(){
        if (isset($_GET['page']))
            {
                if ($_GET['page'] == "deconnection"){
                    session_unset();
                    session_destroy();
                    header('location:index.php');
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
    
    private function menuEdit(){
        $soutitre = "Modification agent";
        $sousMenu = "admGestionCompte";
        $title = "Edition Agent";
        $agentList = "";
        $usr = new MUser();
        $usrManager = new UserManager();
 
        if (isset($_POST['editer'])){
            //$agentList
            require('View/VEditAgent.php');
            echo $_POST['editer']." > ";
        }
        else {
             if (isset($_POST['suppr']))
                $usrManager->delUser($_POST['loginEdit']);

                $res = $usrManager->getAgentList();
                foreach($res as $tmp)
                    {
                        $agentList .= "<option value=".$tmp['login'].">".$tmp['login']." - ".$tmp['firstName']." ".$tmp['lastName']."</option>";
                    }
                require('View/VEditAgent.php');
        }

            if (isset($_POST['loginEdit']))
            echo $_POST['loginEdit'];

        $this->display($title,$content);
    }

    public function display($title, $content){

        require('View/VAdminMenu.php');
        require('View/VDeconnectMenu.php');
        require('View/VTemplate.php');
    }
}