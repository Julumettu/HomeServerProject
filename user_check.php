 <!DOCTYPE html>

<html>

<body>



<?php

class MyDB extends SQLite3 {

      function __construct() {

         $this->open('database.db');

      }

}

   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();

   }
 else {
       
   }

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
   header("Location: http://juhonkotiserveri.ddns.net/");
   
   }
   else{
   header("Location: http://juhonkotiserveri.ddns.net/");
   exit();
   }
   $db->close();


?>

