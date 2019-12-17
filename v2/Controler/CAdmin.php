<?php

require_once("Service/SAgent.php");
require_once("Service/SPav.php");

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
        $sagent = new SAgent();
        $validate = $sagent->deletAgent();
        if (!$validate)
            $agentList = $sagent->getAgentList();
        require("View/AdminAgentSupression.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function pavCreate(){
        $spav = new SPav();
        if ($spav->createPav())
            $validate = true;
        require("View/AdminPavCreation.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function pavEdit(){
        $spav = new SPav();
        $validate = $spav->editPav();
        if (!$validate){
            $agent = $spav->getPav();
            if (!$agent)
                $pavList = $spav->getPavList();
        }
        require("View/AdminPavEdition.php");
        require("View/AdminMenu.php");
        require("View/Template.php");
    }

    public function pavDelete(){
        $spav = new SPav();
        $validate = $spav->deletPav();
        if (!$validate)
            $pavList = $spav->getPavList();
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