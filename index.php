<?php
	require_once("classes/Login.php");

	$login = new Login();

	if($login->LoggedIn() == true)
	{
		require("views/logged_in.php");
	}
	else
	{
		require("views/not_logged_in.php");
	}
?>
