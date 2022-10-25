<?php
session_start();
//session_destroy();

$users = file("user-info.txt");
$users_scores = file("score-info.txt");
$userLine = array();
$usernScore = array();
$username;
$userScore;
$leaderboardCount = 0;
$lengthofLB = 10;
$msg =  "";
$score_array = array();
$match = false;
$scoreget = 0;
if ($_SESSION['won'] == False) {
    $msg =  "<h2>Game Over</h2>";
} else {
    $msg =  "<h2>Congratulations you Won the Game ! see your score</h2>";
}

if ($_SESSION["won"] == 10) {

    if (empty($users_scores)) {
        $scoreget = $_SESSION["won"];
        $info = $_SESSION["username"] . ";score:" . $_SESSION["won"] . ";" . "\n";
        $myfile = fopen("score-info.txt", "a") or die("ERROR! Unable to open file!");
        fwrite($myfile, $info);
        fclose($myfile);
    }

    foreach ($users_scores as $line) {

        $score_array = explode(";", $line);

        $counter = 0;
        foreach ($score_array as $row) {

            if ($row == $_SESSION['username']) {

                $match = true;
            }

            if ($counter == 1 && $match == True) {
                $score = (int)str_replace("score:", "", ($score_array[1])) + 1;
                $scoreget = $score;
                $score = "score:" . $score;
                $currentscore = $row;
                $str = str_replace("$currentscore", "$score", implode(";", $users_scores));
                file_put_contents('score-info.txt', $str);
            } else {
            }
            $counter++;
        }
    }
}

if ($match == False && !empty($users_scores) && $_SESSION["won"] == 10) {

    $info = $_SESSION["username"] . ";score:" . $_SESSION["won"] . ";" . "\n";
    $myfile = fopen("score-info.txt", "a") or die("ERROR! Unable to open file!");
    fwrite($myfile, $info);
    fclose($myfile);
    $scoreget = $_SESSION["won"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Who wants to be a millionaire</title>
    <link href="main.css" type="text/css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>

<body>

    <a href="logout.php"><?php include('header.php'); ?></a>
    <div class="effect"><?= $msg ?></div>
    <main>
        <h2 id="leaderboard">LeaderBoard</h2>
        <table class="container">
            <tr class="head">
                <th>Player Name</th>
                <th>Total Score</th>
            </tr>

            <tr class="head">
                <td><?= $_SESSION['username'] ?></td>
                <td><?= $scoreget ?></td>
            </tr>

        </table>

        <div class="other-button">
            <a href="index.php"><button class="button">Logout</button></a>
        </div>
    </main>

    <?php include('footer.php'); ?>

</body>

</html>