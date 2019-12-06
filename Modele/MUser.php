<?php

class   MUser{
    private $_name;
    private $_status;
    private $_pwd;
    private $_firstName;
    private $_lastName;

    public function getName(){
        return $this->_name;
    }

    public function setName($name){
        $this->_name = $name;
    }

    public function getStatus(){
        return $this->_status;
    }

    public function setStatus($status){
        $this->_status = $status;
    }

    public function getPwd(){
        return $this->_pwd;
    }

    public function setPwd($pwd){
        $this->_pwd = $pwd;
    }

    public function getFirstName(){
        return $this->_firstName;
    }

    public function setFirstName($name){
        $this->_firstName = $name;
    }

    public function getLastName(){
        return $this->_lastName;
    }

    public function setLastName($name){
        $this->_lastName = $name;
    }


}