<?php

require_once('header.php');


$upit ="SELECT * FROM korisnik";

$rezultat = mysqli_query($konekcija,$upit);
print(mysqli_error($konekcija));

$redak= mysqli_fetch_array($rezultat);
#var_dump($rezultat);

?>

<body>

<!--Modalni dialog za prijavu-->
<?php

    require_once('prijava.php');

?>

<!--Top navigacija-->
<?php

require_once('navigacija.php');

?>
<div id="banner">
<div class="container-fluid">
<img src="Slike/logo.png" id="logo">
</div>
</div>
<div id="text" style="background: grey !important;">
    
    <div class="cards">
        <div class="card"><i class="fas fa-hard-hat"></i><span class="icon-text">Sigurnost</span></div>
        <div class="card"><i class="fas fa-piggy-bank"></i><span class="icon-text">Štednja</span></div>
        <div class="card"><i class="fas fa-parking"></i><span class="icon-text">Jednostavnost</span></div>
    </div>
    
</div>
<div style="background: lightgrey !important;">
<div class="authors">

<div class="author-card">
  <img src="Slike/slika1.jpg" alt="Jelena Sjeran" style="width:100%">
  <div class="author-container">
    <h3>Jelene Sjeran</h3>
    <p class="author-title">Informatika</p>
    <p>FPMOZ</p>
    <p> Rođena 20.02.1999.       
    </br>SSŠ Alekse Šantića Nevesinje,Gimnazija
    </br>2018. FPMOZ,smjer Informatika</br>
    <a href="mailto:jelena.sjeran@fpmoz.sum.ba">jelena.sjeran@fpmoz.sum.ba</a></p>
  </div>
</div>

<div class="author-card">
  <img src="Slike/slika2.jpg" alt="Marina Jolić" style="width:100%">
  <div class="author-container">
    <h3>Marina Jolić</h3>
    <p class="author-title">Informatika</p>
    <p>FPMOZ</p>
    <p> Rođena 25.08.1999.       
    </br>SSŠ Tomislavgrad,Ekonomski tehničar
    </br>2018. FPMOZ,smjer Informatika</br>
    <a href="mailto:marina.jolic@fpmoz.sum.ba">marina.jolic@fpmoz.sum.ba</a></p>
  </div>
</div>
</div>

<script src="app.js"></script>
<script>

var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>