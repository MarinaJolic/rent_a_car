<?php

include("db.php");


$upit ="SELECT * FROM korisnik";

$rezultat = mysqli_query($konekcija,$upit);
print(mysqli_error($konekcija));

$redak= mysqli_fetch_array($rezultat);
#var_dump($rezultat);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stil.css">
    <link rel="stylesheet" type="text/css" href="stil2.css">
    <title>Automobili</title>

    <script src="https://kit.fontawesome.com/c6fd8dbab2.js" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <script>

    var modal = document.getElementById('id01');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</head>
<body>

<!--Modalni dialog za login/register-->
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
  </form>
</div>

<div class="topnav" id="myTopnav">
    <a href="#home" class="active">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
    <a href="#" onclick="document.getElementById('id01').style.display='block'">Login</a>
</div>

<div id="banner">
<div class="container-fluid">
<img src="Slike/logo.png" id="logo">
</div>
</div>
<div id="text">
    <div id="mini">
        
    Mini je gradski automobil koji su proizveli engleski proizvođači automobila<br> British Motor Corporation(BMC) i njgeovi nadljednici od 1959. do 2000. godine.<br>
    Godine 1999, proglašen je za drugi najutjecaniji automobil 20. vijeka,<br> iza Ford modela T, a ispred ajkule i bube.
    </div>
    
</div>
<hr style="background-color: red;">
<div id="autori">
    <div class="container">
        <div class="row">
            <div class="col">
        <img style=" height: 200px; width: 180px;" src="Slike/1607337157923.jpg"><br>
        <p class="ime"><i><b>Marina Jolić</b></i></p>
        <p> Rođena 25.08.1999.       
        </br>SSŠ Tomislavgrad,Ekonomski tehničar
        </br>2018. FPMOZ,smjer Informatika</br>
        <a href="mailto:marina.jolic@fpmoz.sum.ba">marina.jolic@fpmoz.sum.ba</a></p>
        </div></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
        <img style=" height: 200px; width: 180px;" src="Slike/20201207_111801.jpg" ><br>
        <p class="ime"><i><b>Jelena Sjeran</b></i></p>
        <p> Rođena 20.02.1999.       
        </br>SSŠ Alekse Šantića Nevesinje,Gimnazija
        </br>2018. FPMOZ,smjer Informatika</br>
        <a href="mailto:jelena.sjeran@fpmoz.sum.ba">jelena.sjeran@fpmoz.sum.ba</a></p>
        </div></div>
    </div>
</div>
<hr style="background-color:red">
    


   
    
</body>
</html>