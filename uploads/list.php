<?php

if($_SESSION['user_login_status'] ==1)
{

  if ($handle = opendir('.')) {

    while (false !== ($file = readdir($handle))) {

      if ($file != "." && $file != ".." && $file !="list.php") {

        $thelist .= '<li><a href="'.$file.'">'.$file.'</a></li>';

      }

    }

    closedir($handle);

  }
}
else
{
	echo "Et ole kirjautunut sisään!";
}
?>

<h1>Tiedostot:</h1>

<ul><?php echo $thelist; ?></ul>
