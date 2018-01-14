<head><link rel="stylesheet" type="text/css" href="stylesheets/upload_bar_style.css"></head>

<body>

<div class="uploadNav" id="uploadDiv">

<a href="#" class="closebtn" onclick="closeUpload()">&times;</a>

<form action="upload.php" method="post" enctype="multipart/form-data">

    <h>Valitse tiedosto minkä haluat lähettää:</h>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Lähetä tiedosto" name="submit">

</form>

</div>

<script>

function openUpload() {

    document.getElementById("uploadDiv").style.width = "250px";

}



function closeUpload() {

    document.getElementById("uploadDiv").style.width = "0";
}

</script>

</body>

</html> 

