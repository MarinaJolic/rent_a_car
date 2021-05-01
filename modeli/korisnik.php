<?php

class User{
    public $user_id;
    public $firstname;
    public $lastname;
    public $email;
    private $JMBG;
    private $password;

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
        }
        
        return !empty($obj) ? $obj->user_id : false; 
    }
}

?>