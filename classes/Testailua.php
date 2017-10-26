<?php
class MyDB extends SQLite3
{
	function __construct() 
	{
		$this->open('/var/www/html/database.db');
	}
}

class Testailua extends SQLite3
{
	
	private $db = null;
	public function __construct()
	{
		session_start();
		if(isset($_POST["login"]))
		{
			$this->doLoginWithPostData();
		}
	}
	public function LoggedIn()
	{
		if(isset($SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1)
		{
			return true;
		}
		return false;
	}
	
	private function doLoginWithPostData()
	{

		$this->db  = new MyDB();
		$sql = <<< EOF
      SELECT users.name,passwords.pwd_hash  from users INNER JOIN passwords WHERE users.id = passwords.id;
EOF;
		
                $ret = $db->query($sql);
                $verified = false;
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) 
                {

                        if($_POST["uname"]==$row['name'])
                        {

                                $hash = $row["pwd_hash"];
                                $pwd = $_POST["pwd"];
                                $verified = password_verify($pwd,$hash);

                        }

                }
                $db->close();
		if($verified == true)
		{
			$_SESSION['user_login_status'] = 1;
		}
		if($verified == false)
		{
			$_SESSION['user_login_status'] = 1;
		}

	
	}
}
