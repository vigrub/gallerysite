<?php 

    session_start();

    function sqliConnect($dbserver="localhost", $dbuser="root", $dbpass="", $dbname){
        $connect = mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);
        return $connect;
        }





?>