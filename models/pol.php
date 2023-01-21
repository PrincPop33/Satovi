<?php

class Pol {

    public $polID;
    public $pol;

    
    public function __construct($polID=null,$pol=null)
    {
        $this->polID = $polID;
        $this->pol=$pol;
    }

    public static function vratiPolove(mysqli $konekcija)
    {
        $query = "SELECT * FROM pol";
        $resultSet = $konekcija->query($query);
        $polovi = [];
        while($pol = $resultSet->fetch_object()){
            $polovi[] = $pol;
        }
        return $polovi;
    }

}

