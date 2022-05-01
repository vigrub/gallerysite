<?php require_once("php/function.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/contact.css">
    <link href="index.php" rel="prerender">
    <script src="js/scriptcontact.js" defer></script>
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
            <a href="contact.php" class="selected">Contact</a>
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

        <div class="contact">

            <h1>Contact Us</h1>

            <div class="wrap">
                <p>Email: contact@gmail.com</p>
                <p>Phone: 000 111 22 33</p>
                <p>Location: Möckelngymnasiet</p>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" width="308.542" height="203.003" viewBox="0 0 308.542 203.003">
                <g id="Path_1" data-name="Path 1" transform="translate(6.863 -4.482)" fill="rgba(57,67,89,0.8)">
                    <path
                        d="M 300.6790771484375 206.4846038818359 L 299.6790771484375 206.4846038818359 L 153.5441284179688 206.4846038818359 L -0.1844547837972641 206.4846038818359 L -3.523685455322266 206.4846038818359 L -0.7341086268424988 204.6492156982422 L 299.1294250488281 7.356296062469482 L 300.6790771484375 6.336719512939453 L 300.6790771484375 8.191680908203125 L 300.6790771484375 205.4846038818359 L 300.6790771484375 206.4846038818359 Z"
                        stroke="none" />
                    <path
                        d="M 299.6790771484375 8.191680908203125 L -0.1844482421875 205.4846038818359 L 299.6790771484375 205.4846038818359 L 299.6790771484375 8.191680908203125 M 301.6790771484375 4.481719970703125 L 301.6790771484375 207.4846038818359 L -6.862945556640625 207.4846038818359 L 301.6790771484375 4.481719970703125 Z"
                        stroke="none" fill="#000" />
                </g>
                <g id="Path_2" data-name="Path 2" transform="translate(23.926 -50.906)" fill="rgba(0,198,188,0.8)">
                    <path
                        d="M -16.38356399536133 250.0553588867188 L -16.38356399536133 56.14260101318359 L 161.0647277832031 133.4188232421875 L -16.38356399536133 250.0553588867188 Z"
                        stroke="none" />
                    <path
                        d="M -15.38357543945313 57.66877746582031 L -15.38357543945313 248.2013854980469 L 158.9715728759766 133.5979614257813 L -15.38357543945313 57.66877746582031 M -17.38357543945313 54.61640930175781 L 163.1578979492188 133.2396392822266 L -17.38357543945313 251.9093322753906 L -17.38357543945313 54.61640930175781 Z"
                        stroke="none" fill="#000" />
                </g>
            </svg>

        </div>

    </main>

</body>

</html>