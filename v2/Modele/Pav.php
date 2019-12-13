<?php

class           Pav{
    private $_id;
    private $_numero;
    private $_adresse;
    private $_code_postal;
    private $_ville;

    

    /**
     * Get the value of _id
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     * @return  self
     */ 
    public function set_id($_id)
    {
        $this->_id = $_id;

        return $this;
    }
    

    /**
     * Get the value of _numero
     */ 
    public function get_numero()
    {
        return $this->_numero;
    }

    /**
     * Set the value of _numero
     *
     * @return  self
     */ 
    public function set_numero($_numero)
    {
        $this->_numero = $_numero;

        return $this;
    }
    

    /**
     * Get the value of _adresse
     */ 
    public function get_adresse()
    {
        return $this->_adresse;
    }

    /**
     * Set the value of _adresse
     *
     * @return  self
     */ 
    public function set_adresse($_adresse)
    {
        $this->_adresse = $_adresse;

        return $this;
    }

    

    /**
     * Get the value of _code_postal
     */ 
    public function get_code_postal()
    {
        return $this->_code_postal;
    }

    /**
     * Set the value of _code_postal
     *
     * @return  self
     */ 
    public function set_code_postal($_code_postal)
    {
        $this->_code_postal = $_code_postal;

        return $this;
    }

    

    /**
     * Get the value of _ville
     */ 
    public function get_ville()
    {
        return $this->_ville;
    }

    /**
     * Set the value of _ville
     *
     * @return  self
     */ 
    public function set_ville($_ville)
    {
        $this->_ville = $_ville;

        return $this;
    }

    
}