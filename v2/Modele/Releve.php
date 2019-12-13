<?php

class           Releve{
    private $_id;
    private $_status;
    private $_date;
    private $_niveau;
    private $_commentaire;
    private $_id_tournee;
    private $_id_pav;

    

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
     * Get the value of _status
     */ 
    public function get_status()
    {
        return $this->_status;
    }

    /**
     * Set the value of _status
     *
     * @return  self
     */ 
    public function set_status($_status)
    {
        $this->_status = $_status;

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
     * Get the value of _niveau
     */ 
    public function get_niveau()
    {
        return $this->_niveau;
    }

    /**
     * Set the value of _niveau
     *
     * @return  self
     */ 
    public function set_niveau($_niveau)
    {
        $this->_niveau = $_niveau;

        return $this;
    }
    

    /**
     * Get the value of _commentaire
     */ 
    public function get_commentaire()
    {
        return $this->_commentaire;
    }

    /**
     * Set the value of _commentaire
     *
     * @return  self
     */ 
    public function set_commentaire($_commentaire)
    {
        $this->_commentaire = $_commentaire;

        return $this;
    }
    

    /**
     * Get the value of _id_tournee
     */ 
    public function get_id_tournee()
    {
        return $this->_id_tournee;
    }

    /**
     * Set the value of _id_tournee
     *
     * @return  self
     */ 
    public function set_id_tournee($_id_tournee)
    {
        $this->_id_tournee = $_id_tournee;

        return $this;
    }
    

    /**
     * Get the value of _id_pav
     */ 
    public function get_id_pav()
    {
        return $this->_id_pav;
    }

    /**
     * Set the value of _id_pav
     *
     * @return  self
     */ 
    public function set_id_pav($_id_pav)
    {
        $this->_id_pav = $_id_pav;

        return $this;
    }
}