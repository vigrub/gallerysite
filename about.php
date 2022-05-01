<?php require_once("php/function.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/about.css">
    <link href="index.php" rel="prerender">
    <script src="js/scriptabout.js" defer></script>
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
            <a href="about.php" class="selected">About</a>
            <a href="contact.php">Contact</a>
        </nav>

        <?php
        
        // Checks if session is set else false
        $loggedin = $_SESSION["loggedin"] ?? false;
        if ($loggedin === true) { ?>

        <form action="destroy.php" method="post">
            <input type="submit" value="Logout">
        </form>

        <?php } ?>

    </header>

    <main>
        <div class="about">
            <div class="text">

                <h1>
                    About Us
                </h1>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi doloremque sint esse ratione
                    repellat
                    placeat vel tempora ex dolore eos molestias quia optio quisquam quas voluptatem autem aperiam, illo
                    eligendi.
                    Quas dignissimos, nobis optio quam, molestias perferendis voluptatem excepturi at, rem omnis quidem
                    asperiores quod minima quia ad unde suscipit quisquam repudiandae laudantium sequi alias consequatur
                    quos.
                    Est, nesciunt ea.
                    Aliquam reiciendis accusantium perspiciatis similique accusamus quidem repellendus maxime at laborum
                    odio
                    debitis dicta autem dignissimos eius fugit, hic illo rem sunt doloremque, voluptate, est voluptatum
                    inventore. Velit, quisquam inventore.</p>

            </div>

        </div>

    </main>
</body>

</html>