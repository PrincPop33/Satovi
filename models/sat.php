<?php


class Sat {

   public $satID;
   public $proizvodjacID;
   public $model;
   public $polID;
   public $cena;


    public function __construct($satID=null, $proizvodjacID=null, $model=null, $polID=null, $cena=null)
    {
        $this->satID = $satID;
        $this->proizvodjacID=$proizvodjacID;
        $this->model=$model;
        $this->polID=$polID;
        $this->cena=$cena;
    }

    public static function vratiSatove($pol, $sort, mysqli $konekcija)
    {
        $query = "SELECT * FROM sat s join proizvodjac pr on s.proizvodjacID = pr.proizvodjacID join pol p on s.polID = p.polID";
        if($pol != "0"){
            $query .= " WHERE p.polID = " . $pol;
        }
        $query.= " ORDER BY s.cena " . $sort;
        $resultSet = $konekcija->query($query);
        $satovi = [];
        while($sat = $resultSet->fetch_object()){
            $satovi[] = $sat;
        }
        return $satovi;
    }

    public static function dodaj($proizvodjacID, $model, $polID, $cena, mysqli $konekcija)
    {
        $query = "INSERT INTO sat VALUES(null, '$proizvodjacID','$model','$polID', $cena)";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }

    public static function azuriraj($satID, $cena, mysqli $konekcija)
    {
        $query = "UPDATE sat SET cena = '$cena' WHERE satID = $satID";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }

    public static function obrisi($satID, mysqli $konekcija)
    {
        $query = "DELETE FROM sat WHERE satID = $satID";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }
}