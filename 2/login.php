<?php
    include("includes/dbconn.php");
?>
<?php

    $error = $username = $password = "";
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username = $_POST["user"];
        $password = $_POST["pass"];
        
        if(empty($username) || empty($password))
        {
            echo "<script>alert('Please fill out the empty boxes.')</script>";
        }
        else
        {
            $hash = "$1$10$";
            $password = crypt($password, $hash);
            
            $searchQuery = "select * from Data where Username = '$username' AND Password = '$password'";
            $searchRun = mysqli_query($serverun, $searchQuery);
            if(mysqli_num_rows($searchRun)==1)
            {
                session_start();
                $_SESSION["Username"] = $username;
                header("Location: admin.php");
            }
            else
            {
                $error = "Username or Password Incorrect.";
            }
        }
    }

?>
<?php include("includes/html_basic.php"); ?>  
    <link rel="stylesheet" href="css/login.css">
    <script src="js/login.js"></script>
</head>
<body>
    <h2 class="backHead"><a href="index.php" class="back"><img src="arrow.png"> Back</a></h2>
        <div class="main">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <h2 class="center">Login</h2>
            <h5 class="col center"><?php echo $error; ?></h5>
            <label>Username</label>
            <br>
            <div class="twoinone">
                <img src="user.png">
                <input type="text" name="user" class="input" placeholder="Enter your username..." value="<?php echo $username; ?>">
            </div>
            <hr class="hr">
            <br>
            <label>Password</label>
            <br>
            <div class="threeinone">
                <img src="pass.png">
                <input type="password" name="pass" class="input" id="pass" placeholder="Enter your password...">
                <img class="eye" id="eyebt" src="eye.png" onclick="showpass()">
            </div>
            <hr class="hr">
            <h5 class="right"><a href="forgot.php" class="right">Forgot Password</a></h5>
            <br>
            <div class="center">
                <input type="submit" value="LOGIN" class="logbt">
                <br><br><br>
                    <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
                    position: relative; right: 150px;">Administrator:</label><br>
                    <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
                    position: relative; right: 131px; font-weight: 300;">Username - Uncanny</label><br>
                    <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
                    position: relative; right: 136px; font-weight: 300;">Pass - dhruv12345</label>
                <br>
                <br>
                <h4>' Or '</h4>
                <a href="sign_up.php">Sign Up</a>
            </div>
            </form>
        </div>
</body>
</html>