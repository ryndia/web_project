<?php
    $dbUser = "ryndia";
    $dbpassword = "12345678";
    $dbHost = "127.0.0.1";
    $dbName = "Daito";

    try{
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbpassword);
    }
    catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>