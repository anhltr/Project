<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Who wants to be a millionaire</title>
    <link href="main.css" type="text/css" rel="stylesheet" />
</head>

<body class="game">
    <?php include('header.php'); ?>

    <main>
        <?php
        $fh = file("questions.txt");
        $questionIndex = $_POST["qIndex"] ?? 0;
        $maxQuestion = 10;
        $curQuestion = rand($questionIndex * 2 + 1, $questionIndex * 2 + 2);
        $curQuestionArr = explode(",", $fh[$curQuestion - 1]);

        // echo(($questionIndex*2+1)." ".($questionIndex*2+2)." - ".$curQuestionArr[0]);

        $question = array(
            'question' => $curQuestionArr[1],
            'a' => $curQuestionArr[2],
            'b' => $curQuestionArr[3],
            'c' => $curQuestionArr[4],
            'd' => $curQuestionArr[5],
            'answer' => $curQuestionArr[6]
        );
        ?>
        <?php if ($questionIndex == $maxQuestion) {
            include('game-over.php');
        } else { ?>
            <form action="game-submit.php" method="POST">
                <h2 class="game"><?= $question['question']  ?></h2>
                <div class="grid-question-container">
                    <div class="grid-item">
                        <input id="field_1" name="answer" type="radio" value="A" />
                        <label for="field_1"><?= $question['a'] ?></label>
                    </div>
                    <div class="grid-item">
                        <input id="field_2" name="answer" type="radio" value="B" />
                        <label for="field_2"><?= $question['b'] ?></label>
                    </div>
                    <div class="grid-item">
                        <input id="field_3" name="answer" type="radio" value="C" />
                        <label for="field_3"><?= $question['c'] ?></label>
                    </div>
                    <div class="grid-item">
                        <input id="field_4" name="answer" type="radio" value="D" />
                        <label for="field_4"><?= $question['d'] ?></label>
                    </div>
                </div>
                <input type="hidden" name="qIndex" value="<?= $questionIndex ?>">
                <input type="hidden" name="curQuestion" value="<?= $curQuestion ?>">
                <button id="button" class="button">Final Answer</button>

            <?php } ?>
            <div class="other-button">
                <a href="index.php"><button class="button">Logout</button></a>
            </div>
    </main>

    <?php include('footer.php'); ?>

</body>

</html>