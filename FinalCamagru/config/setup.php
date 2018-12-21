<?php 
    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    $connection->exec($sql);
    
    $sql = "USE camagru";
    $connection->exec($sql);

    $sql="CREATE TABLE IF NOT EXISTS users(
        id INT(15) AUTO_INCREMENT PRIMARY KEY,
        username varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        pass varchar(375) NOT NULL,
        verify INT(15)
    )";
    $connection->exec($sql);
?>
