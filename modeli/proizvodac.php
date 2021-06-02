<?php
require_once('kontroleri/db.php');
require_once('auto.php');

class Proizvodac{
    public $id;
    public $naziv;
    public $mjesto_proizvodne;
    public $tel;

    public static function index(){
        global $konekcija;

        $sql = "SELECT * FROM `proizvođač`";

        $result = $konekcija->query($sql);

        $records = array();

        while($row = $result->fetch_assoc()){
            $obj = new Proizvodac();

            $obj->id = $row['Šifra'];
            $obj->naziv = $row['Naziv'];
            $obj->mjesto_proizvodnje = $row['Mjesto proizvodnje'];
            $obj->tel = $row['Tel/Fax'];

            array_push($records, $obj);
        }
        
        return $records;
    }



}



?>