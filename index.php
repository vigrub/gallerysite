<?php 
    require_once("php/function.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = $_POST["username"] ?? "";
        $password = $_POST["password"] ?? "";
        if ($username !== "" && $password !== ""){
            login($username, $password);
        }
        
    }
    // Checks if session is set else false
    $loggedin = $_SESSION["loggedin"] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="sign.php" rel="prerender">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php if($loggedin){ ?>
    <link rel="stylesheet" href="css/gallery.css">
    <?php } ?>

    <?php if($loggedin === false){ ?>
    <script src="js/indexscript.js" defer></script>

    <?php } ?>
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
            <a href="index.php" class="selected">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </nav>

        <?php
        
        if ($loggedin === true) { ?>

        <form action="destroy.php" method="post">
            <input type="submit" value="Logout">
        </form>

        <?php } ?>

    </header>

    <main>

        <?php if ($loggedin === false) { ?>

        <div class="loginbar">

            <h1>Welcome</h1>

            <form class="wrap" method="Post" action="index.php">
                <input class="username" name="username" type=”text” placeholder="Username" required>
                <span class="usernameS"></span>
                <input type="password" class="password" name="password" placeholder="Password" required>
                <span class="passwordS"></span>
                <button class="login" type="submit">Login</button>
            </form>

            <div class="signup">
                Not a member? <a href="sign.php">Sign Up</a>
            </div>

        </div>

        <?php } elseif($loggedin === true) {?>

        <div class="wrap">
            <ul class="gallery">
                <li class="item1">
                    <div class="bg"></div>
                </li>
                <li class="item2">
                    <div class="bg"></div>
                </li>
                <li class="item3">
                    <div class="bg"></div>
                </li>
                <li class="item4">
                    <div class="bg"></div>
                </li>
                <li class="item5">
                    <div class="bg"></div>
                </li>
            </ul>

        </div>

        <?php } ?>

    </main>

    <?php if($loggedin === true) {?>

    <footer>
        <p>&copy; YouGallery <?=date("Y")?></p>
        <a href="index.php" class="selected">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
    </footer>

    <?php } ?>

</body>

</html>