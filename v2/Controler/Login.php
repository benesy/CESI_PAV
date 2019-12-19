<?php
require_once("Service/SLogin.php");

class   Login
{
    function log(){
        $erreurPwd = false;
        if (isset($_POST['login']) && isset($_POST['pwd'])) {
            $slog = new SLogin();
            if ($slog->checkAgentLogin($_POST['login'], $_POST['pwd']))
                header('location:index.php');
            if ($slog->checkAdminLogin($_POST['login'], $_POST['pwd']))
                header('location:index.php');
            $erreurPwd = true;
        }
        $this->display($erreurPwd);
    }

    function display($erreurPwd)
    {
        $menu = '<span style="height:30px;"></span>';
        require('View/Login.php');
        require('View/Template.php');
    }
}
