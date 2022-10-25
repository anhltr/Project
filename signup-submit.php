<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Who wants to be a millionaire</title>
    <link href="main.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <?php

        $myfile = fopen("user-info.txt", "w") or die("ERROR! Unable to open file!");
        $info = $_POST["username"] . ";" . $_POST["password"] . ";" . $_POST["name"] . ";" . "\n";
        fwrite($myfile, $info);
        fclose($myfile);
        ?>

        <div class="main">
            Welcome <?= $_POST["name"] ?>, your account created sucessfully! <br>
        </div>
        <div class="other-button">
            <a href="index.php">
                <button class="button">Login to start playing!</button>
            </a>
        </div>

    </main>

    <?php include('footer.php'); ?>

</body>

</html>