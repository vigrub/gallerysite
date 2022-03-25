<?php 
    require_once("php/function.php");
    


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="sign.php"rel="prerender">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/script.js" defer></script>
    <title>Document</title>

</head>

<body>

    <header>
        <a href="index.php">
            <h1>
            YourGallery
            </h1>
        </a>
        <nav>
            <a href="Index.php" class="selected">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <main>

        <div class="loginbar">
            <h1>Welcome</h1>

            <div class="wrap">
                <input class="username" name="Username" type=”text” placeholder="Username">
                <span class="usernameS"></span>
                <input class="password" name="Password" type=”text” placeholder="Password">
                <span class="passwordS"></span>
                <div class="login">Login</div>
            </div>

            <div class="signup">
                Not a member? <a href="sign.php">Sign Up</a>
            </div>

        </div>

        <!-- <div class="MainGallery">
            <div class="Gallery1"></div>
            <div class="Gallery2"></div>
            <div class="Gallery3"></div>
            <div class="Gallery4"></div>
        </div> -->

    </main>


</body>

</html>