<?php

class   MRound{
    private $_id;
    private $_dateRound;
    private $_dateCreation;
    private $_idCreator;
    private $_idAgent;
    private $_pavList = array();


    public function getId(){
        return $this->_id;
    }

    public function setId($id){
        $this->_id = $id;
    }

    public function getDateRound(){
        return $this->_dateRound;
    }

    public function setDateRound($dateRound){
        $this->_dateRound = $dateRound;
    }

    public function getDateCreation(){
        return $this->_dateCreation;
    }

    public function setDateCreation($dateCreation){
        $this->_dateCreation = $dateCreation;
    }

    public function getIdCreator(){
        return $this->_idCreator;
    }

    public function setIdCreator($idCreator){
        $this->_idCreator = $idCreator;
    }

    public function getIdAgent(){
        return $this->_idAgent;
    }

    public function setIdAgent($idAgent){
        $this->_idAgent = $idAgent;
    }

    public function addPav($pav){
        $this->_pavList->array_push($pav);
    }

    public function getPavById($id){
        $i = 0;
        foreach($this->_pavList as $value){
            if ($this->_pavList[$i]->getId() == $id)
                return $this->_pavList[$i];
        }
    }

    public function getPavList(){
        return $this->_pavList;
    }

}