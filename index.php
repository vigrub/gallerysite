<?php 
    require_once("php/function.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = $_POST["username"] ?? "";
        $password = $_POST["password"] ?? "";
        if ($username !== "" && $password !== ""){
            
            $password = saltingHash($password, $username);

        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="sign.php"rel="prerender">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/indexscript.js" defer></script>
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
    </header>

    <main>

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

    </main>


</body>

</html>