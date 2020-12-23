<?php

define("RAČUNALO","localhost");
define("KORISNIK","root");
define("LOZINKA","");
define("BAZA","rent_a_car");

$konekcija = mysqli_connect(RAČUNALO,KORISNIK, LOZINKA,BAZA);

if (!$konekcija00) {
    dir("NIsmo se spojili na bazu iz nekog razloga, možda znate o čemu se radi, evo greška:".mysqli_connect_error())
}


?>