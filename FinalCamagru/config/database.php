<?php
    $database = 'localhost';
    $username = 'root';
    $pass = '123456';

    try 
    {
        $connection = new PDO("mysql:host=$database", $username,$pass);
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        include_once("setup.php");
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
?>