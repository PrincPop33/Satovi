<?php

class Proizvodjac {

    public $proizvodjacID;
    public $proizvodjac;


    public function __construct($proizvodjacID=null,$proizvodjac=null)
    {
        $this->proizvodjacID = $proizvodjacID;
        $this->proizvodjac=$proizvodjac;
    }

    public static function vratiProizvdjace(mysqli $konekcija)
    {
        $query = "SELECT * FROM proizvodjac";
        $resultSet = $konekcija->query($query);
        $proizvodjaci = [];
        while($proizvodjac = $resultSet->fetch_object()){
            $proizvodjaci[] = $proizvodjac;
        }
        return $proizvodjaci;
    }

}

