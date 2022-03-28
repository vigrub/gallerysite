<?php 

    session_start();

    function sqliConnect($dbname, $dbserver="localhost", $dbuser="root", $dbpass=""){
        $connect = mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);
        return $connect;
        }





?>