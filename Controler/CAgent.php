<?php

class CAgent{

    public function root(){
        if (isset($_GET['page']))
            {
                if ($_GET['page'] == "deconnection"){
                    session_unset();
                    session_destroy();
                    header('location:index.php');
                    }
                else   
                $this->display();
            }
        else
            $this-> display();
    }

    public function display(){
        require('View/VAgentAllTournee.php');
        require('View/VTemplate.php');
    }
}