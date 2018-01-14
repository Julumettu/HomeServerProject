<?php

class MyDB extends SQLite3

{

	function __construct() 

	{

		$this->open('/var/www/html/database.db');

	}

}

class Login extends SQLite3

{

	

	public $errors = array();

	public $messages = array();

	public function __construct()

	{

		session_start();

		if(isset($_GET["logout"]))

		{

			$this->doLogout();

		}

		elseif(isset($_POST["uname"]))

		{

			$this->doLoginWithPostData();			

		}

		if(isset($_POST["search_bar"]))
		{
			$this->ShowImages();
		}

	}

	function data_uri($file, $mime){

		$contents = file_get_contents($file);
		$base64 = base64_encode($contents);

		return ('data:' . $mime . ';base64,' . $base64);
	}

	public function ShowImages(){
		$search_word = $_POST["search_bar"];
		$imageFolder = 'uploads/';
		$imageTypes = '{*.jpg,*.JPG,*.jpeg,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';

		$sortByImageName = false;
		$newestImagesFirst = true;

		$images = glob($imageFolder . $imageTypes, GLOB_BRACE);
		if ($sortByImageName) {
    			$sortedImages = $images;
    			natsort($sortedImages);

		} else{
    			# Sort the images based on its 'last modified' time stamp
    			$sortedImages = array();

    			$count = count($images);

    			for ($i = 0; $i < $count; $i++) {

        		$sortedImages[date('YmdHis', filemtime($images[$i])) . $i] = $images[$i];

    		}

    		# Sort images in array

    		if ($newestImagesFirst) {

        	krsort($sortedImages);

    		} else {

        		ksort($sortedImages);

    		}

		}
		echo '<ul class="ins-imgs">';
		foreach($sortedImages as $image){
			$name = 'Image name: ' . substr($image, strlen($imageFolder), strpos($image, '.') - strlen($imageFolder));
			if(strpos($name,$search_word) or $search_word=="all"){
			$lastModified = '(last modified: ' . date('F d Y H:i:s', filemtime($image)) . ')';
			echo '<li class="ins-imgs-li">';
			echo '<img src="' . $this->data_uri($image,$imageFolder) . '" alt="' . $name . '" title="' . $name . '">';
			echo '<div class="ins-imgs-label">' . $name . ' ' . $lastModified . '</div>';
			echo '</li>';
			}
		}
		echo '</ul>';
		echo '<link rel="stylesheet" type="text/css" href="stylesheets/ins-imgs.css">';
	}

	public function LoggedIn()

	{

		if($_SESSION['user_login_status'] == 1)

		{

			return true;

		}

		return false;

	}

	

	private function doLoginWithPostData()

	{

		$db  = new MyDB();

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

	}

	public function doLogout()

        {

                $_SESSION = array();

                session_destroy();

                $this->messages[] = "You have been logged out.";

        }

}
