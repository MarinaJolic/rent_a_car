<?php

class User{
    public $user_id;
    public $firstname;
    public $lastname;
    public $email;
    private $JMBG;
    private $password;
    public $uloga;

    public static function verify_user($email, $password){
        global $konekcija;

        $email = $konekcija->real_escape_string($email);
        $password = $konekcija->real_escape_string($password);

        $sql = "SELECT * FROM korisnik WHERE `E-mail`='{$email}' AND `Lozinka`='{$password}'";

        $result = $konekcija->query($sql);

        $obj = new User();

        while($row = $result->fetch_assoc()){
            $obj->user_id = $row['Šifra'];
            $obj->firstname = $row['Ime'];
            $obj->lastname = $row['Prezime'];
            $obj->email = $row['E-mail'];
            $obj->JMBG = $row['JMBG'];
            $obj->uloga = $row['Uloga'];
        }
        
        return !empty($obj) ? $obj->user_id : false; 
    }

    public static function register_user($email, $password, $first_name, $last_name, $jmbg){
        global $konekcija;

        $email = $konekcija->real_escape_string($email);
        $password = $konekcija->real_escape_string($password);
        $first_name = $konekcija->real_escape_string($first_name);
        $last_name = $konekcija->real_escape_string($last_name);
        $jmbg = $konekcija->real_escape_string($jmbg);

        $sql = "INSERT INTO korisnik (`Ime`, `Prezime`, `JMBG`, `E-mail`, `Lozinka`, `Uloga`) VALUES (";
        $sql .= "'" . $first_name . "',";
        $sql .= "'" . $last_name . "',";
        $sql .= "'" . $jmbg . "',";
        $sql .= "'" . $email . "',";
        $sql .= "'" . $password . "',";
        $sql .= "'Korisnik');";

        $result = $konekcija->query($sql);

        if($result === true){
            return self::verify_user($email, $password);
        }else{
            return false;
        }
    }

    public static function check_user_role($user_id){
        global $konekcija;

        $sql = "SELECT * FROM korisnik WHERE `Šifra`=". $user_id;

        $result = $konekcija->query($sql);
        $result = $result->fetch_assoc();

        return $result['Uloga'];

    }
}

?>