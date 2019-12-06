<?php
require_once("Modele/MUser.php");
require_once("Modele/Manager/UserManager.php");

class   CLogin{
    function display(){
        $erreurPwd = false;
        $connectionLogin = "";
        if (isset($_POST['login']) && isset($_POST['pwd'])){
            $_usr = new MUser();
            $_dbSearch = new UserManager();

            $_usr->setName($_POST['login']);
            $_usr->setPwd($_POST['pwd']);
            $connectionLogin = $_usr->getName();
            $_dbUser = $_dbSearch->getUser($_usr->getName());
            if (($_dbUser->getPwd() == MD5($_usr->getPwd())) && $_usr->getPwd() != ""){
                $_SESSION['user'] = $_dbUser->getName();
                $_SESSION['firstName'] = $_dbUser->getFirstName();
                $_SESSION['lastName'] = $_dbUser->getLastName();
                $_SESSION['status'] = $_dbUser->getStatus();
                header('location:index.php');
            }
            else
                $erreurPwd = true;
        }
        require('View/VLogin.php');
        require('View/VTemplate.php');
    }
}