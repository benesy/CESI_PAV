<?php
session_start();
require_once("./Controler/Login.php");

try {
    if (isset($_SESSION['user'])) {;
    } else {                              // Page de login
        $ctl = new Login();
        $ctl->display();
    }
} catch (Exception $e) {                    // Récupère les exceptions levés.
    echo "Excepetion : " . $e;
}
