<?php

class   Login
{
    function display()
    {
        if (isset($_POST['login']) && isset($_POST['pwd'])) {
            header('location:index.php');
        } else
            $erreurPwd = true;
        require('View/Login.php');
        require('View/Template.php');
    }
}
