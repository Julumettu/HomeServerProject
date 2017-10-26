<?php

class Login extends SQLite3
{

	private $db = null;

	public function __construct()
	{
		session_start();

		if (isset($_GET["logout"])){
			$this->doLogOut();
		}
		elseif (isset($_POST["login"])){
			$this->doLogin();
		}
	}

	private function doLogin()
	{
		
		$this->db = open('/var/www/html/database.db');
		$sql =<<<EOF

      			SELECT users.name,passwords.pwd_hash  from users INNER JOIN passwords WHERE users.id = passwords.id;

		EOF;
		$ret = $db->query($sql);
   		$verified = false;
   		while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {

      			if($_POST["uname"]==$row['name']){

				$hash = $row["pwd_hash"];
				$pwd = $_POST["pwd"];
				$verified = password_verify($pwd,$hash);

			}

   		}
		if($verified == true){
			$_SESSION['user_name'] = $_POST["uname"];
			$_SESSION['user_login_status'] = 1;
		}
	}

	public function doLogout()
	{
		$_SESSION = array();
		session_destroy();
	}

	public function IsUserLoggedIn()
	{
		if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
			return true;
		}
		return false;
	}
}
?>
