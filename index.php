<?php
    session_start();
    require_once('Controler/CLogin.php');
    require_once('Controler/CAgent.php');
    require_once('Controler/CAdmin.php');
    require_once('Controler/CSAdmin.php');

    try {
        if (isset($_SESSION['user']) && isset($_SESSION['status'])){
            // Si l'utilisateur est connecté en tant qu'agent
            if ($_SESSION['status'] == 3){
                $ctl = new CAgent();
                $ctl->root();
                }
            // Si l'utilisateur est connecté en tant qu'admin
            else if ($_SESSION['status'] == 2){
                $ctl = new CAdmin();
                $ctl->root();
                }
            // Si l'utilisateur est connecté en tant que super admin
            else if ($_SESSION['status'] == 1 ){
                $ctl = new CSadmin();
                $ctl->root();
                $ctl->rootSA();
                }
            // Gestion d'erreur du status de la session
            else {
                session_unset();
                session_destroy();
                throw new Exception('Erreur de Session');
            }
        }
        // Page de login
        else {
            $ctl = new CLogin();
            $ctl->display();
        }
    }
    // Récupère les exceptions levés.
    catch(Exception $e){
        echo "Excepetion : ".$e;
    }