<?php
 require_once('database.php');
if  (isset($_POST['submit'])){
$email = $_POST ['email'];
$pass = $_POST ($_POST['pass']);
if (empty($email) || empty($pass)){
    $alert = "<h4>all fields need to be filled in</h4>";
    }
else {
    $query = $connection->prepare("SELECT `email`, `password` FROM `users` WHERE `email`=? AND `password`=? AND `verify`=?");
    $query->exec(array($email,$pass,1));
    $row =  $query->fetch(PDO::FETCH_ASSOC);
    if($query->rowCount > 0){
        session_start();
        header("location:index.php");            
    }
    elseif($row['verify'] == 0){
        $alert = "<h5>Verify Email</h5>";
    }
    else {
        $alert = "<h6>Username and Password</h6>";
    }
    
    }
}
?>

    <!DOCTYPE html>
<html>
    <head>
        <title>SignIN</title>
        <meta charset = "UTF-8">
    </head>
    <body>
        <form action="login.php" method="POST">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="pass" placeholder="password">
            <input type="submit" name="submit" value="sign_in">
        </form>
        <?php echo $alert?>
    </body>

</html>