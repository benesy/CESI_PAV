<?php
session_start();
require_once("./Controler/Login.php");
require_once("./Controler/CAdmin.php");
require_once("./Controler/CAgent.php");

try {
    if (isset($_GET['page']) && ($_GET['page'] == "disconnect")) {
        session_destroy();
        header("Location:index.php");
    } else if (isset($_SESSION['login'])) {
        if ($_SESSION['status'] == "agent") {
            $ctl = new CAgent();
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case "pavlist":
                        $ctl->pavList();
                        break;
                    case "pavreleve":
                        $ctl->pavReleve();
                        break;
                    default:
                        $ctl->pavList();
                        break;
                }
            } else
            $ctl->pavList();
        } else if ($_SESSION['status'] == "admin") {
            $ctl = new CAdmin();
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case "creationagent":
                        $ctl->agentCreate();
                        break;
                    case "editionagent":
                        $ctl->agentEdit();
                        break;
                    case "suppragent":
                        $ctl->agentDelete();
                        break;
                    case "creationpav":
                        $ctl->pavCreate();
                        break;
                    case "editionpav":
                        $ctl->pavEdit();
                        break;
                    case "supprpav":
                        $ctl->pavDelete();
                        break;
                    case "creationtournee":
                        $ctl->roundCreate();
                        break;
                    case "editiontournee":
                        $ctl->roundEdit();
                        break;
                    case "supprtournee":
                        $ctl->roundDelete();
                        break;
                    case "global":
                        $ctl->vueGlobale();
                        break;
                    default:
                        $ctl->vueGlobale();
                        break;
                }
            } else
                $ctl->vueGlobale();
        }
    } else {                                // Page de login
        $ctl = new Login();
        $ctl->log();
    }
} catch (Exception $e) {                    // Récupère les exceptions levés.
    echo "Excepetion : " . $e;
}
