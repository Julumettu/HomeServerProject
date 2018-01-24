<?php

if (isset($login)) {

    if ($login->errors) {

        foreach ($login->errors as $error) {

            echo $error;

        }

    }

    if ($login->messages) {

        foreach ($login->messages as $message) {

            echo $message;

        }

    }

}

?>
<style>

body {

    background-image: url("images/tausta-min.png");
    background-position: center top;
    background-size: 100%;
}

</style>

<body>

</body>

</html>

<?php
include("views/l_side_bar.php");
include("views/r_side_bar.php");
include("views/search_bar.php");
?>

