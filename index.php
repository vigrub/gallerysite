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
            <a href="php/uploadimg.php">Upload</a>
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
        <div id="output"></div>
        <?php } elseif($loggedin === true) {?>
        <?php 
            $sql = "SELECT * FROM tblgallery"; #tblgallery
            // Echo out the sql query results
            $conn = sqliConnect("yougallery");
            $result = $conn->query($sql);
            $conn->close();
            $rows = Array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $rows[] = $row;
                }
            
            $rows = json_encode($rows);
        ?>


        <!-- Buttons, previous and next. That change the js var page -->
        <div class="pageSelector">
            <button class="prev" onclick="prevPage()">&#10094;</button>
            <!-- Current page / last page -->
            <span class="page" id="spanPage">1</span>
            <span class="of">/</span>
            <!-- Total pages -->
            <span class="totalPages" id="spanTotalPages">1</span>
            <button class="next" onclick="nextPage()">&#10095;</button>
        </div>
        <div class="grid-container" id="gallery">


        </div>
        <!-- Send $rows to generateGallery function -->
        <script defer>
        console.log(<?php echo $rows; ?>);
        let page = 0;
        let imgCount = 6


        function generateGallery(json_data) {
            var gallery = document.getElementById("gallery");
            // Reset the gallery
            gallery.innerHTML = "";

            // for (var i = 0; i < json_data.length; i++) {
            //     var div = document.createElement("div");
            //     div.style.backgroundImage = "url(" + json_data[i].path + ")";
            //     div.className = "grid-item";
            //     gallery.appendChild(div);
            // }

            // Generate from index, depending on page//start from page=1, maximum of 18 images per page
            var start = (page) * imgCount;
            var end = start + imgCount;
            for (var i = start; i < end; i++) {
                console.log(json_data[i].path);
                var div = document.createElement("div");
                div.style.backgroundImage = "url(" + json_data[i].path + ")";
                div.className = "grid-item";
                gallery.appendChild(div);
            }

        }

        function prevPage() {
            if (page > 0) {
                page--;
                generateGallery(<?php echo $rows; ?>);
            }
        }

        function nextPage() {
            if (page < Math.ceil(<?php echo $rows; ?>.length / imgCount) - 1) {
                page++;
                generateGallery(<?php echo $rows; ?>);
            }
        }

        // Generate the gallery
        generateGallery(<?php echo $rows; ?>);
        </script>

        <?php } ?>

    </main>

    <?php if($loggedin === true) {?>

    <footer>
        <p>&copy; YouGallery <?=date("Y")?></p>
        <div class="bottomnav">
            <a href="index.php" class="selected">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
        </div>
    </footer>

    <?php } ?>

</body>

</html>