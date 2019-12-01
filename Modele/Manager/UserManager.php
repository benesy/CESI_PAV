<?php
require_once('BDD.php');
require_once('../MUser.php');

class   UserManager extends BDD{
    private     $_user;

    // Load l'user en BDD et return un type USER.
    // return null si l'user n'existe pas en BDD.
    public function getUser($name)
    {
        //load le user de la BDD
        return $this->_user;
    }

    // Ajoute en BDD le USER passé en parametre
    // Renvoie un void
    public function addUser($user)
    {
        //ajoute un user en bdd
    }

}