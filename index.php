<?php 
    require_once("php/function.php");

    // Check if tried to login, calls login function
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = $_POST["username"] ?? "";
        $password = $_POST["password"] ?? "";
        if ($username !== "" && $password !== ""){
            login($username, $password);
        }
        
    }
    // Checks if session is set else false
    $loggedin = $_SESSION["loggedin"] ?? false;
    
    // If file uploaded, upload it to gallery
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        if (isset($_POST["submit"])) {
            // Make sure the file form is set
            if (isset($_FILES["file"])) {
                if ($_POST["formRand"] === strval($_SESSION["formRand"])){
                $username = $_SESSION["username"];
                $file = $_FILES["file"];
                $filepath = $_FILES["file"]["tmp_name"];
                $filesize = filesize($filepath);
                $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
                if (!empty($fileinfo)){
                    $filetype = finfo_file($fileinfo, $filepath);
                }
                if ($filetype === "image/jpeg" || $filetype === "image/png" || $filetype === "image/jpg") {
                    // Max 20mb
                    if ($filesize < 20971520) {
                        $filename = $_FILES["file"]["name"];
                        $gallerypath = "./gallery/".$username;
                        
                        // Check if gallery exists, else create it
                        if (!file_exists($gallerypath)) {
                            mkdir($gallerypath);
                        }
    
                        // Name the file with current date and time and hash with username
                        $newfilename = date("Y-m-d-H-i-s") . "-" . $username . "-" . hash("sha1", $username) . "-" . $filename;
                        
                        // Move the file to the gallery under username dir
                        move_uploaded_file($filepath, $gallerypath . "/" . $newfilename);
    
                        // Write to db tblgallery (title, description, path, username)
                        $title = $_POST["title"];
                        $description = $_POST["description"];
                        // Check if description is longer than 255, takes the first 255 characters
                        if (strlen($description) > 255) {
                            $description = substr($description, 0, 255);
                        }
                        
                        $path = $gallerypath . "/" . $newfilename;
                        // Remove ../ from path
                        $path = str_replace("./", "", $path);
                        $username = $_SESSION["username"];
                        $sql = "INSERT INTO tblgallery (title, description, path, username) VALUES ('$title', '$description', '$path', '$username')";
                        $conn = sqliConnect("yougallery");
                        $result = mysqli_query($conn, $sql);
                        
                    }
                }
            } else {
                $file = null;
            }
        }
        } else {
            $file = null;
        }
    }
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

        <div id="output"></div>

        <?php } elseif($loggedin === true) {?>

        <?php
            $username = $_SESSION["username"]; 
            $sql = "SELECT * FROM `tblgallery` WHERE username='$username'"; #tblgallery
            $conn = sqliConnect("yougallery");
            $result = $conn->query($sql);
            $conn->close();
            $rows = Array();
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $rows[] = $row;
                }
            
            $rows = json_encode($rows);
        ?>

        <form action="index.php" method="post" enctype="multipart/form-data">

            <?php
            // Prevent refresh and submitting form again (duplicate)
            $formRand = rand(0, 99999);
            $_SESSION["formRand"] = $formRand;
            ?>
            <input type="text" placeholder="Title of image..." name="title" required>
            <textarea type="text" placeholder="Description of image..." name="description" maxlength=255
                required></textarea>
            <input type="file" name="file" id="file" required>
            <input type="hidden" name="formRand" value="<?php echo $formRand; ?>">
            <input type="submit" value="Upload File" name="submit">
        </form>

        <div class="pageSelector">
            <button class="prev" onclick="prevPage()">&#10094;</button>
            <span class="page" id="spanCurrentPage">1</span>
            <span class="of">/</span>
            <span class="totalPages" id="spanTotalPages">1</span>
            <button class="next" onclick="nextPage()">&#10095;</button>
        </div>
        <div class="grid-container" id="gallery">


        </div>

        <div class="pageSelector">
            <button class="prev" onclick="prevPage()">&#10094;</button>
            <span class="page" id="spanCurrentPage" class="CurrPage">1</span>
            <span class="of">/</span>
            <span class="totalPages" id="spanTotalPages" class="TotPage">1</span>
            <button class="next" onclick="nextPage()">&#10095;</button>
        </div>

        <script defer>
        let page = 0;
        let imgCount = 6


        function generateGallery(json_data) {
            var gallery = document.getElementById("gallery");
            // Reset the gallery
            gallery.innerHTML = "";

            var spanCurrentPage = document.querySelectorAll("#spanCurrentPage");
            var spanTotalPages = document.querySelectorAll("#spanTotalPages");

            spanCurrentPage.forEach(function(element) {
                element.innerHTML = page + 1;
            });
            spanTotalPages.forEach(function(element) {
                if (Math.ceil(json_data.length / imgCount) === 0) {
                    element.innerHTML = 1;
                } else {
                    element.innerHTML = Math.ceil(json_data.length / imgCount);
                }
            });


            // Generate from index, depending on page//start from page=1, maximum of 18 images per page
            var start = (page) * imgCount;
            var end = start + imgCount;
            for (var i = start; i < end && i < json_data.length; i++) {
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