<?php

class           Tournee
{
    private $_id;
    private $_date;
    private $_id_agent;



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
}
