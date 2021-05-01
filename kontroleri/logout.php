<?php

    require_once('sesija.php');

    $session->logout();
    
    header('Location: ../index.php');

?>