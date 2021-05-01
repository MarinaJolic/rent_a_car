<?php

require_once('kontroleri/sesija.php');

?>

<div class="topnav" id="myTopnav">
    <a href="index.php" class="active">Naslovnica</a>
    <?php
    
        if($session->is_signed_in()){
            echo "<a href='modeli.php'>Modeli</a>";
        }

    ?>
    <a href="#contact">Novosti</a>
    <a href="#about">Servis</a>
    <a href="#about">Kontakt</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
    

    <?php
    
        if(!$session->is_signed_in()){
            echo "<a href='registracija.php'>Registracija</a>";
            echo "<a href='#' onclick='openModal()'>Prijava</a>";
        }else{
            echo "<a href='kontroleri/logout.php'>Odjava</a>";
        }

    ?>
</div>

<script>

function openModal(){
    document.getElementById('id01').style.display='block';
}
    
</script>