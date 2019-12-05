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
                else if ($_GET['page'] == "gcomptes")
                {
                    // creation par defaut
                    if ((isset($_GET['action']) && $_GET['action']  == "creation") ||
                        (!isset($_GET['action']))){
                            $soutitre = "Création agent";
                            $sousMenu = "admGestionCompte";
                            $title = "gcompte";

                            //conditions + bdd
                            require('View/VAddNewLogin.php');
                            $this->display($title, $content);
                        }

                    // modifiction/supression
                    if (isset($_GET['action']) && $_GET['action']  == "edit"){
                        $content = ">>modif<<<";
                        $this->display("","");
                    }

                }
                else   
                $this->display("", "");
            }
        else
            $this-> display("","");
    }

    public function display($title, $content){

        require('View/VAdminMenu.php');
        require('View/VDeconnectMenu.php');
        require('View/VTemplate.php');
    }
}