<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/adminsign.css"> -->
    <link rel="stylesheet" href="css/admin.css">
    <link href="index.php" rel="prerender">
    <script src="js/scriptadmin.js" defer></script>
    <title>Document</title>

</head>

<body>
    
    <header>
        <a href="index.php"><h1>
            YourGallery
        </h1></a>
        <nav>
            <a href="index.php">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <main>

        <div class="loginbar">
            <h1>Register now</h1>
            <form action="sign.php" method="post" class="wrap">
                <input class="username" name="Username" type=”text” placeholder="Username">
                <span class="usernameS"></span>
                <input type="password" class="password" name="Password" placeholder="Password">
                <span class="passwordS"></span>
                <div class="login" type="submit">Sign up</div>
            </form>

            <div class="signup">
                Already a member? <a href="index.php">Log in</a>
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