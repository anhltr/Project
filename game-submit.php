<?php
session_start();
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

        $fh = file("questions.txt");
        $curQuestion = $fh[$_POST['curQuestion'] - 1];
        $curQuestionArr = explode(",", $curQuestion);
        $question = array(
            'question' => $curQuestionArr[1],
            'a' => $curQuestionArr[2],
            'b' => $curQuestionArr[3],
            'c' => $curQuestionArr[4],
            'd' => $curQuestionArr[5],
            'answer' => $curQuestionArr[6]
        );
        function getCorrectAnswer($answer)
        {
            if (strcasecmp(trim($_POST['answer']), trim($answer)) == 0) {
                $_SESSION['score'] = $_SESSION['score'] + 1;
                if ($_SESSION['score'] == 10) {

                    $_SESSION['won'] = True;
                    header('location:game-over.php');
                }
                return true;
            } else {
                return false;
            }
        }
        ?>
        <?php if (!isset($_POST['answer'])) {
            include('game-over.php');
        } else { ?>
        <form action="game.php" method="POST">
            <h2><?= $question['question']  ?></h4>
                <div class="grid-question-container">
                    <div
                        class="grid-item <?= strcmp($_POST['answer'], 'A') ? '' : (getCorrectAnswer($question['answer']) ? 'correct-answer' : 'wrong-answer') ?>">
                        <input id="field_1" name="Button" type="radio" value="A" />
                        <label for="field_1"><span class="list-label"> </span><?= $question['a'] ?></label>
                    </div>
                    <div
                        class="grid-item <?= strcmp($_POST['answer'], 'B') ? '' : (getCorrectAnswer($question['answer']) ? 'correct-answer' : 'wrong-answer') ?>">
                        <input id="field_2" name="Button" type="radio" value="B" />
                        <label for="field_2"><span class="list-label"> </span><?= $question['b'] ?></label>
                    </div>
                    <div
                        class="grid-item <?= strcmp($_POST['answer'], 'C') ? '' : (getCorrectAnswer($question['answer']) ? 'correct-answer' : 'wrong-answer') ?>">
                        <input id="field_3" name="Button" type="radio" value="C" />
                        <label for="field_3"><span class="list-label"> </span><?= $question['c'] ?></label>
                    </div>
                    <div
                        class="grid-item <?= strcmp($_POST['answer'], 'D') ? '' : (getCorrectAnswer($question['answer']) ? 'correct-answer' : 'wrong-answer') ?>">
                        <input id="field_4" name="Button" type="radio" value="D" />
                        <label for="field_4"><span class="list-label"> </span><?= $question['d'] ?></label>
                    </div>
                </div>
                <input type="hidden" name="qIndex" value="<?= ++$_POST['qIndex'] ?>">
                <?php if (getCorrectAnswer($question['answer'])) { ?>
                <h1> Correct!</h1>
                <button class="button" type="submit">Next</button>
        </form>
        <?php } else {
                        header('location:game-over.php');
        ?>
        </form>
        <form action="index.php" method="GET">
            <button class="button" type="submit">Game Over</button>
        </form>
        <?php } ?>
        <?php } ?>
    </main>

    <?php include('footer.php'); ?>

</body>

</html>