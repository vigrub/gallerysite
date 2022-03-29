<?php 

    session_start();

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




?>