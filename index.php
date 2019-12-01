<?php
    session_start();
    require_once('Controler/CLogin.php');
    require_once('Controler/CAgent.php');
    require_once('Controler/CAdmin.php');
    require_once('Controler/CSAdmin.php');

    try {
        if (isset($_SESSION['user']) && isset($_SESSION['status'])){
            // Si l'utilisateur est connecté en tant qu'agent
            if ($_SESSION['status'] == 'agent'){
                $ctl = new CAgent();
                }
            // Si l'utilisateur est connecté en tant qu'admin
            else if ($_SESSION['status'] == 'admin'){
                $ctl = new CAdmin();
                }
            // Si l'utilisateur est connecté en tant que super admin
            else if ($_SESSION['status'] == 's_admin'){
                $ctl = new CSadmin();
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