<!--Modalni dialog za login/register-->
<div id="id01" class="modal">

  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>E-mail</b></label>
      <input type="text" placeholder="Enter Username" id="email" required>

      <label for="psw"><b>Lozinka</b></label>
      <input type="password" placeholder="Enter Password" id="password" required>
        
      <button type="submit" type="button" onclick="checkUser(event)">Login</button>
      <br /><br />
      <div id="demo" style="color: red;"></div>
    </div>
  </form>
</div>

<script>

  function checkUser(){
    event.preventDefault()
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let response = this.responseText;
        if(response === "Uspješna prijava!"){ window.location = "modeli.php"; }
        else{ document.getElementById("demo").innerHTML = this.responseText; }
      }
    };
    xmlhttp.open("POST", "kontroleri/prijava.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send('email=' + email + "&password=" + password);
  }

</script>