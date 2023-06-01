<?php
    include("includes/dbconn.php");
?>
<?php

    $error = $username = "";
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username = $_POST["user"];
        
        if(empty($username))
        {
            $error = "* Empty field.";
        }
        else
        {
            header("Location: conpass.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/forgot.css">
    <script src="js/login.js"></script>
</head>
<body>
    <h2 class="backHead"><a href="login.php" class="back"><img src="arrow.png"> Back</a></h2>
        <div class="main">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <h2 class="center">Forgot Password ?</h2>
            <br>
            <label>Username</label>
            <br>
            <div class="twoinone">
                <img src="user.png">
                <input type="text" name="user" class="input" placeholder="Enter your username..." value="<?php echo $username; ?>">
            </div>
            <span class="err"><?php echo $error; ?></span>
            <br>
            <br>
            <div class="center">
                <input type="submit" value="Next" class="logbt">
            </div>
            </form>
        </div>
</body>
</html>