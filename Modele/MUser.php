<?php

class   MUser{
    private $_name;
    private $_status;
    private $_pwd;

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
}