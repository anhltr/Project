<?php session_start();  ?>
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

        $user_name = $_GET["username"];
        $user_pass = $_GET["password"];
        $check = 0;

        if ($file = fopen("user-info.txt", "r")) {
            while (!feof($file)) {
                $line = fgets($file);
                $user_info = explode(";", $line);
        ?>
        <?php
                if (strcmp($user_name, $user_info[0]) == 0 && strcmp($user_pass, $user_info[1]) == 0) {
                    $_SESSION['score'] = 0;
                    $_SESSION['won'] = False;
                    $_SESSION['username'] = $user_name;
                    $check = 1;
                ?>
        <div class="main">
            <?php
                        echo
                        "<h2>Rules</h2>
                        Answer 10 questions correctly, you get 1 million dollars! <br>
                        Answer any question wrong, you will lose the game. <br> <br>";
                        echo "Are you ready to be a millionaire, $user_info[2]?";
                        ?>
            <br>
            <br>
            <a href="game.php"><button class="button">Start Now!</button></a>

        </div>

        <div class="other-button">
            <a href="index.php"><button class="button">Logout</button></a>
            <a href="leaderboard.php"><button class="button">LeaderBoard</button></a>
        </div>

        <?php
                }
            }
            fclose($file);
        }
        ?>

        <?php
        if ($check == 0) {
        ?>
        <div class="main">
            <h2>Invalid username or password!</h2> <br>
            <a href="index.php"><button class="button"> Please try again!</button></a>
        </div>
        <?php
        }
        ?>
    </main>

    <?php include('footer.php'); ?>

</body>

</html>