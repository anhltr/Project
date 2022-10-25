<!DOCTYPE html>
<html lang="en">

<head>
    <title>Who wants to be a millionaire</title>
    <link href="main.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <div class="main">
            <form action="signup-submit.php" method="post">
                <h2> Create A New Account </h2>
                <label for="name">Name</label>
                <input type="text" name="name" maxlength="20" required><br><br>
                <label for="username"> Username</label>
                <input type="text" name="username" maxlength="20" required><br><br>
                <label for="password"> Password</label>
                <input type="password" name="password" maxlength="20" required><br><br>
                <div>
                    <button class="button" type="submit">Sign up</button>
                </div>
            </form>

        </div>

        <p>Already have a Account? <a href="index.php"> Login </a></p>

    </main>

    <?php include('footer.php'); ?>

</body>

</html>