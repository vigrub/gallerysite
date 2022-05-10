<?php require_once("function.php"); 

// Check if logged in, else send to login page
if ($loggedin === false) {
    header("Location: ../index.php");
    die();
}

echo "Welcome " . $_SESSION["username"];


if ($_SERVER["REQUEST_METHOD"] === "POST"){
    if (isset($_POST["submit"])) {
        if (isset($_FILES["file"])) {
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
                    $gallerypath = "../gallery/".$username;
                    
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
                    $path = $gallerypath . "/" . $newfilename;
                    // Remove ../ from path
                    $path = str_replace("../", "", $path);
                    $username = $_SESSION["username"];
                    $sql = "INSERT INTO tblgallery (title, description, path, username) VALUES ('$title', '$description', '$path', '$username')";
                    $conn = sqliConnect("yougallery");
                    $result = mysqli_query($conn, $sql);

                }
            }
        } else {
            $file = null;
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
    <title>Document</title>
</head>

<body>
    <!-- Form, Title, Description and Choose File (image) -->
    <form action="uploadimg.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" required>
        <input type="text" name="description" required>
        <input type="file" name="file" id="file" required>
        <input type="submit" value="Upload File" name="submit">
    </form>

    <!-- Anchor to return to home -->
    <a href="../">Home</a>
</body>

</html>