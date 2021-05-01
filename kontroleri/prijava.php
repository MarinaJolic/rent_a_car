<?php

require_once('db.php');
require_once('sesija.php');
require_once('../modeli/korisnik.php');

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = User::verify_user($email, $password);

    if(!empty($user)){
        $session->login($user);
        echo "Uspješna prijava!";
    }else{
        echo "Neuspješna prijava!";
    }
}


?>