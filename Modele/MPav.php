<?php

    class MPav {
        private $_id;
        private $_adress;
        private $_fullness;

        public function getId(){
            return $this->_id;
        }
    
        public function setId($id){
            $this->_id = $id;
        }

        public function getAdress(){
            return $this->_adress;
        }
    
        public function setAdress($adress){
            $this->_adress = $adress;
        }

        public function getFullness(){
            return $this->_fullness;
        }
    
        public function setFullness($fullness){
            $this->_fullness = $fullness;
        }
    }
