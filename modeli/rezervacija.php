<?php

class Rezervacija{

    public $datum_pocetka;
    public $datum_zavrsetka;
    public $auto;
    public $korisnik;

    public static function index(){
        global $session;
        global $konekcija;

        $current_user_id = $session->get_user_id();

        $sql = "SELECT * FROM rezervacija WHERE šifra_korisnika=" . $current_user_id;

        $result = $konekcija->query($sql);

        return $result;
    }

    public static function delete($id){
        global $konekcija;

        $sql = "DELETE FROM rezervacija WHERE Šifra=" . $id;
        return $konekcija->query($sql) == true ? true : false;
    }

    public static function create_reservation($korisnik_id, $auto_id){
        global $konekcija;

        $sql = "INSERT INTO `rezervacija` (`Datum početka rezervacije`, `Datum završetka rezervacije`, `Šifra_auta`, `šifra_korisnika`)";
        $sql .= "VALUES ('2021-06-01', '2021-06-01', " . $auto_id . ", " . $korisnik_id . ");";

        echo $sql;

        return $konekcija->query($sql);

    } 

}



?>