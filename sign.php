<!DOCTYPE html>
<html lang="en">

<?php
require_once("php/function.php");

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    if ($username !== "" && $password !== ""){
        addUser($username, $password);
        header("Location: index.php");
    }
}

?>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link href="index.php" rel="prerender">
    <script src="js/scriptsign.js" defer></script>
    <title>Document</title>

</head>

<body>

    <header>
        <a href="index.php">
            <h1>
                YouGallery
            </h1>
        </a>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <main>

        <div class="loginbar">

            <h1>Register now</h1>
            <form action="sign.php" method="post" class="wrap">
                <input class="username" name="username" type=”text” placeholder="Username" required>
                <span class="usernameS"></span>
                <input type="password" class="password" name="password" placeholder="Password" required>
                <span class="passwordS"></span>
                <button name="submit" class="login" type="submit" value="Sign Up">Sign Up</button>
            </form>

            <div class="signup">
                Already a member? <a href="index.php">Log in</a>
            </div>
        </div>

    </main>

</body>

</html>