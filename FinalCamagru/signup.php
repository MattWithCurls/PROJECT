<?php
    require_once "database.php";
    if(isset($_POST["submit"])){
        $username = trim($_POST["username"]); 
        $email = trim($_POST["email"]);
        $password = trim($_POST["pass"]);
        
        $check = $connection->prepare("SELECT `email` FROM `users` WHERE `email`=?");
        $check->bindValue(1, $email);
        $check->execute();
        if(empty($username) || empty($email) || empty($password))
        {
            $alert = "<h4>Complete form for Camagru42</h4>";
        }
        else if($check->rowCount() > 0)
        {
            $alert = "<h4>Used</h4>";
        }
        else
        {
            try{
                $connection->beginTransaction();
                $sql = "INSERT INTO users (username,email, pass,verify) VALUES ('$username','$email','$pass',0);";
                $connection->exec($sql);

                $head ='FROM:Camagru42';
                $message ='Awe oubul have been registered $username 
                Please click on the link to register your account
                http://localhost:8080/config/verify.php?email=$email 
                ';
                mail("$email", "Camagru verified", "$message", "$head");

                $alert = "Registered please verify your account using the email we sent you cunt";
                
                $connection->commit();
            }catch(PDOException $e){
                echo $sql . "\n" . $e->getMessage();
            }
        }
     }
?>



<!DOCTYPE html>
<html>
    <head>
        <title>SignUp</title>
        <meta charset = "UTF-8">
    </head>
    <body>
        <form action="signup.php" method="POST">
            <input type="text" name="username" placeholder="username">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="pass" placeholder="password">
            <input type="submit" name="submit" value="signup">
        </form>
        <?php echo $alert?>
    </body>

</html>