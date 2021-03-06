<?php

$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);             

// Check if file already exists

if (file_exists($target_file)) {

    echo "Tiedosto kyseisellä nimellä löytyy jo hakemistosta.";

    $uploadOk = 0;

}
// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

    echo "Tiedostoa ei voitu lähettää.";

// if everything is ok, try to upload file

} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        echo "Tiedosto: ". basename( $_FILES["fileToUpload"]["name"]). " lähetetty onnistuneesti!";

    } else {

        echo "Tapahtui virhe, tiedostoa ei voitu lähettää.";

    }

header('Location: index.php');
exit();
}
?>

