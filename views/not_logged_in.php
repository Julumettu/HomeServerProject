<?php
?>
<head><link rel="stylesheet" type="text/css" href="stylesheets/login_form_style.css"></head>
<form action="index.php" method="post" name="loginform">

  <div class="imgcontainer">

    <img src="images/Kappa.png" alt="Avatar" class="kappa">

  </div>



  <div class="container">

    <label><b>Käyttäjä</b></label>

    <input type="text" placeholder="Anna käyttäjä" name="uname" required/>

    <br>

    <label><b>Salasana</b></label>

    <input type="password" placeholder="Anna salasana" name="pwd" required/>

    <br>
    <br>

    <button  type="submit" name"login" value"log in">Kirjaudu sisään</button>

  </div>



</form>

