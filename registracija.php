<?php

require_once('header.php');

?>

<body>

  <?php
  
  require_once('navigacija.php');

  require_once('kontroleri/sesija.php');

  if($session->is_signed_in()){
    header("Location:index.php");
  }

  ?>

  <div class="p-5">
  <div id="demo"></div>
  <form>
    <div class="form-row">
      <div class="col">
      <label for="Ime">Ime</label>
        <input type="text" id="firstName" class="form-control" placeholder="First name">
      </div>
      <div class="col"> <div class="imgcontainer">
    </div>
      <label for="Prezime">Prezime</label>
        <input type="text" id="lastName" class="form-control" placeholder="Last name">
      </div>
    </div>
    <div class="form-group">
    <label for="JMBG">JMBG</label>
    <input type="text" class="form-control" id="jmbg" placeholder="1234 Main St">
    </div>
    <div class="form-group">
      <label for="Emailadresa">Email adresa</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="Lozinka">Lozinka</label>
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary" onclick="registerUser(event)">Registriraj se</button>
  </form>
  <div>



  <script>

  function registerUser(){
    event.preventDefault()
    console.log("activee");
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let jmbg = document.getElementById("lastName").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let response = this.responseText;
        if(response === "Uspješna prijava!"){ window.location = "modeli.php"; }
        else if(response === "Popunite sva polja!"){ document.getElementById("demo").innerHTML = this.responseText; }
        else{ document.getElementById("demo").innerHTML = this.responseText; }
      }
    };
    xmlhttp.open("POST", "kontroleri/register.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send('email=' + email + "&password=" + password + "&first_name=" + firstName + "&last_name=" + lastName + "&jmbg=" + jmbg);
  }

</script>

</body>