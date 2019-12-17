<?php

class CAgent{

    public function pavList(){
        require("View/AgentPavList.php");
        require("View/AgentMenu.php");
        require("View/Template.php");
    }

    public function pavReleve(){
        require("View/AgentPavReleve.php");
        require("View/AgentMenu.php");
        require("View/Template.php");
    }
}