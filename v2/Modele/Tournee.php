<?php

class           Tournee{
    private $_id;
    private $_date;
    private $_id_agent;
    private $_id_releve;

    

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
     * Get the value of _date
     */ 
    public function get_date()
    {
        return $this->_date;
    }

    /**
     * Set the value of _date
     *
     * @return  self
     */ 
    public function set_date($_date)
    {
        $this->_date = $_date;

        return $this;
    }
    

    /**
     * Get the value of _id_agent
     */ 
    public function get_id_agent()
    {
        return $this->_id_agent;
    }

    /**
     * Set the value of _id_agent
     *
     * @return  self
     */ 
    public function set_id_agent($_id_agent)
    {
        $this->_id_agent = $_id_agent;

        return $this;
    }
    

    /**
     * Get the value of _id_releve
     */ 
    public function get_id_releve()
    {
        return $this->_id_releve;
    }

    /**
     * Set the value of _id_releve
     *
     * @return  self
     */ 
    public function set_id_releve($_id_releve)
    {
        $this->_id_releve = $_id_releve;

        return $this;
    }
    
}