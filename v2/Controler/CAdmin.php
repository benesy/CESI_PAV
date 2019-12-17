<?php

require_once("Service/SAgent.php");

class       CAdmin{

    public function vueGlobale(){
        require("View/AdminVueGlobale.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function agentCreate(){
        $sagent = new SAgent();
        if ($sagent->createAgent())
            $validate = true;
        require("View/AdminAgentCreation.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function agentEdit(){
        $sagent = new SAgent();
        $validate = $sagent->editAgent();
        if (!$validate){
            $agent = $sagent->getAgent();
            if (!$agent)
                $agentList = $sagent->getAgentList();
        }
        require("View/AdminAgentEdition.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function agentDelete(){
        require("View/AdminAgentSupression.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function pavCreate(){
        require("View/AdminPavCreation.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function pavEdit(){
        require("View/AdminPavEdition.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function pavDelete(){
        require("View/AdminPavSupression.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function roundCreate(){
        require("View/AdminTourneeCreation.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function roundEdit(){
        require("View/AdminTourneeEdition.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function roundDelete(){
        require("View/AdminTourneeSupression.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

}