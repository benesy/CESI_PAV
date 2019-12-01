<?php


abstract class   BDD{
    private $db;


    private function dbConnect(){
        //PDO 
    }

    // Execute la requete passé en paramètre
    public function dbquery($query){
        $this->dbConnect();
        // pdo querry
        return ;
    }
}