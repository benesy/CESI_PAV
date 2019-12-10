<?php

class CAgent{

    public function root(){
        $title = "PAV";
        if (isset($_GET['page']))
            {
                if ($_GET['page'] == "deconnection"){
                    session_unset();
                    session_destroy();
                    header('location:index.php');
                    }
                else   
                $this->display($title, "");
            }
        else
            $this-> display($title, "");
    }

    public function display($title, $content){
        require('View/VAgentAllTournee.php');
        require('View/VDeconnectMenu.php');
        require('View/VTemplate.php');
    }
}