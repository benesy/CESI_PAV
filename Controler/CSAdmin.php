<?php
require_once('CAdmin.php');

class   CSAdmin extends CAdmin{

    public function rootSA(){

    }

    public function display($title, $content){

        require('View/VAdminMenu.php');
        require('View/VSAdminMenu.php');
        require('View/VDeconnectMenu.php');
        require('View/VTemplate.php');
    }
}