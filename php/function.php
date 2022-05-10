<?php 

    session_start();

    // Checks if session is set else false
    $loggedin = $_SESSION["loggedin"] ?? false;

    function sqliConnect($dbname, $dbserver="localhost", $dbuser="root", $dbpass=""){
        $connect = mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);
        return $connect;
        }

    function saltingHash($password, $username){
        // Premade salt with ben added because: bensecurity
        $salt = $username . "ben";
        $hashed = md5($password . $salt);
        return $hashed;
    }

    // Login function
    function login($username, $password){
        $connect = sqliConnect("yougallery");
        $username = mysqli_real_escape_string($connect, $username);
        $password = mysqli_real_escape_string($connect, $password);
        $password = saltingHash($password, $username);
        $sql = "SELECT * FROM tblusers WHERE USERNAME = '$username' AND PASSWORD = '$password'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row){
            $_SESSION["username"] = $row["USERNAME"];
            $_SESSION["id"] = $row["ID"];
            $_SESSION["loggedin"] = true;
            return true;
        }
        else{
            return false;
        }
    }

    //add user function
    function addUser($username, $password){
        $connect = sqliConnect("yougallery");
        $username = mysqli_real_escape_string($connect, $username);
        $password = mysqli_real_escape_string($connect, $password);
        $password = saltingHash($password, $username);
        
        // Get all users with same username
        $sql = "SELECT * FROM tblusers WHERE USERNAME = '$username'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0){
            return false;
        }
        
        $sql = "INSERT INTO tblusers (USERNAME, PASSWORD) VALUES ('$username', '$password')";
        $result = mysqli_query($connect, $sql);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }
?>