<?php
session_start();
require_once("./Controler/Login.php");

try {
    if (isset($_GET['page']) && ($_GET['page'] == "disconnect")) {
        session_destroy();
        header("Location:index.php");
    } else if (isset($_SESSION['login'])) {
        if ($_SESSION['status'] == "agent") {
            var_dump($_SESSION);
        } else if ($_SESSION['status'] == "admin") {
            var_dump($_SESSION);
        }
    } else {                                // Page de login
        $ctl = new Login();
        $ctl->log();
    }
} catch (Exception $e) {                    // Récupère les exceptions levés.
    echo "Excepetion : " . $e;
}
