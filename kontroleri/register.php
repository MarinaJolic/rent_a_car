<?php

require_once('db.php');
require_once('sesija.php');
require_once('../modeli/korisnik.php');

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['jmbg'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $jmbg = $_POST['jmbg'];

    $result = User::register_user($email, $password, $first_name, $last_name, $jmbg);
    if(!empty($result)){
        
        $session->login($result);
        echo "Uspješna prijava!";
    }else{
        echo "Neuspješna prijava!!";
    }
}else{
    echo "Popunite sva polja!";
}


?>