<?php

require_once('header.php');

?>

<body>

  <?php
  
  require_once('navigacija.php');

  //Modalni dialog za login/register

  require_once('prijava.php');
  require_once('kontroleri/sesija.php');

  if($session->is_signed_in()){
    header("Location:index.php");
  }

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
  }

  ?>

  <div class="p-5">
  <form>
    <div class="form-row">
      <div class="col">
      <label for="Ime">Ime</label>
        <input type="text" id="Ime" class="form-control" placeholder="First name">
      </div>
      <div class="col">
      <label for="Prezime">Prezime</label>
        <input type="text" id="Prezime" class="form-control" placeholder="Last name">
      </div>
    </div>
    <div class="form-group">
    <label for="JMBG">JMBG</label>
    <input type="text" class="form-control" id="JMBG" placeholder="1234 Main St">
    </div>
    <div class="form-group">
      <label for="Emailadresa">Email adresa</label>
      <input type="email" class="form-control" id="Emailadresa" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="Lozinka">Lozinka</label>
      <input type="password" class="form-control" id="Lozinka" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Registriraj se</button>
  </form>
  <div>


</body>