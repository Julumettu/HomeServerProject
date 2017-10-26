<?php

	require_once("classes/Testailua.php");

	$login = new Testailua();

	if($login->LoggedIn() == true)
	{
		include("views/logged_in.php");
	}
	else
	{
		include("views/not_logged_in.php");
	}
?>
