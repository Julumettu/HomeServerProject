
<body>

<a href="index.php?logout">Logout</a>


<form action="upload.php" method="post" enctype="multipart/form-data">

    Valitse tiedosto minkä haluat lähettää:

    <input type="file" name="fileToUpload" id="fileToUpload">

    <input type="submit" value="Upload Image" name="submit">

</form>

<?php
	require("/var/www/html/uploads/list.php");
?>
</body>

</html>
