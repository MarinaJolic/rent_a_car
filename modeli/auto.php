<?php

class Auto{
    public $id;
    public $model;
    public $godina;
    public $serijski_broj;
    public $registracija;
    public $vrsta_motora;
    public $oprema;
    public $gorivo;
    public $broj_vrata;
    public $broj_sjedista;
    public $proizvodac;

    public static function index(){
        global $konekcija;

        $sql = "SELECT * FROM `auto`";

        $result = $konekcija->query($sql);

        $records = array();

        while($row = $result->fetch_assoc()){
            $obj = new Auto();

            $obj->id = $row['Šifra'];
            $obj->model = $row['Model'];
            $obj->godina = $row['Godina proizvodnje'];
            $obj->serijski_broj = $row['Serijski broj'];
            $obj->registracija = $row['Registracija'];
            $obj->vrsta_motora = $row['Vrsta motora'];
            $obj->oprema = $row['Oprema'];
            $obj->gorivo = $row['Gorivo'];
            $obj->broj_vrata = $row['Broj vrata'];
            $obj->broj_sjedista = $row['Broj sjedišta'];
            $obj->proizvodac = $row['Šifra_proizvođača'];

            array_push($records, $obj);
        }
        
        return $records;
    }

    public function create(){
        global $konekcija;

        $sql = "INSERT INTO `auto` (`Godina proizvodnje`, `Serijski broj`, `Registracija`, `Vrsta motora`, `Oprema`, `Gorivo`, `Broj vrata`, `Broj sjedišta`, `Šifra_proizvođača`, `Model`)";
        $sql .= "VALUES (" . $this->godina . ", ";
        $sql .= "'" . $this->serijski_broj . "', ";
        $sql .= "'" . $this->registracija . "', ";
        $sql .= "'" . $this->vrsta_motora . "', ";
        $sql .= "'" . $this->oprema . "', ";
        $sql .= "'" . $this->gorivo . "', ";
        $sql .= "'" . $this->broj_vrata . "', ";
        $sql .= "'" . $this->broj_sjedista . "', ";
        $sql .= "'" . $this->proizvodac . "', ";
        $sql .= "'" . $this->model . "');";

        return $konekcija->query($sql) == true ? true : false;
    }

    public static function delete($id){
        global $konekcija;

        $sql ="DELETE FROM `auto` WHERE Šifra=" . $id;

        return $konekcija->query($sql) == true ? true: false;
    }

    public static function car_by_id($id){
        global $konekcija;

        $sql = "SELECT `Model` FROM `auto` WHERE Šifra=" . $id;

        return $konekcija->query($sql)->fetch_assoc();
    }
}

?>