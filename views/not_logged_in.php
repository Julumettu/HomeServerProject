<?php
if (isset($login)) {

    if ($login->errors) {

        foreach ($login->errors as $error) {

            echo $error;

        }

    }

    if ($login->messages) {

        foreach ($login->messages as $message) {

            echo $message;

        }

    }

}
?>
<head><link rel="stylesheet" type="text/css" href="stylesheets/login_form_style.css"></head>
<div class="imgcontainer">
  <img src="images/Kappa.png" alt="Avatar" class="kappa">
</div>

<form method="post" action= "index.php"  name="loginform">

    <label><b>Käyttäjä</b></label>

    <input type="text" placeholder="Anna käyttäjä" name="uname" required/>

    <br>

    <label><b>Salasana</b></label>

    <input type="password" placeholder="Anna salasana" name="pwd" required/>

    <br>
    <br>

    <button  type="submit" name"login" value"log in">Kirjaudu sisään</button>




</form>

