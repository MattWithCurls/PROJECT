<?php
    require_once "database.php";
    $email = $_GET['email'];
    $sql = $connection->prepare("UPDATE `users` set verify=1 WHERE email='$email'");
    $connection->exec($sql);
    header("location:login.php");
?>