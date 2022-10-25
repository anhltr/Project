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
            <form action="login-submit.php" method="get">
                <h2> Login here to Play! </h2>
                <label for="username"> Username</label>
                <input type="text" name="username" maxlength="20" required><br><br>
                <label for="password"> Password</label>
                <input type="password" name="password" maxlength="20" required><br><br>
                <div>
                    <button class="button" type="submit">Log In</button>
                </div>
            </form>
        </div>

        <a href="signup.php">
            <button id="button" class="button">Sign up for an new account</button>
        </a>

    </main>

    <?php include('footer.php'); ?>

</body>

</html>