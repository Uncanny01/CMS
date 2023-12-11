<?php
    include("includes/dbconn.php");
?>
<?php

    $name = $email = $username = $password = "";
    $nameErr = $emailErr = $userErr = $passErr = "";
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["user"];
        $password = $_POST["pass"];
        
        if(empty($name))
        {
            $nameErr = "* Empty Field.";
        }
        else
        {
            if(!preg_match("/^[A-Za-z ]*$/", $name))
            {
                $nameErr = "* Please enter a valid name.";
            }
            else
            {
                if(strlen($name)>20 || strlen($name)<5)
                {
                    $nameErr = "* Full Name must vary between 5-20 chars.";
                }
                else
                {
                    $name = filtering_input($name);
                }
            }
        }

        if(empty($email))
        {
            $emailErr = "* Empty Field.";
        }
        else
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "* Please enter a valid email address.";
            }
            else
            {
                $email = filtering_input($email);
            }
        }

        if(empty($username))
        {
            $userErr = "* Empty Field";
        }
        else
        {
            if(strlen($username)>20 || strlen($username)<5)
            {
                $userErr = "* Username must vary between 5-20 chars.";
            }
            else
            {
                if(!preg_match("/^[a-z_0-9]*$/", $username))
                {
                    $userErr = "* Capital letters and special chars except _ are not allowed.";
                }
                else
                {
                    $user_exist_query = "select Username from Data";
                    $user_exist_query_run = mysqli_query($serverun, $user_exist_query);

                    while($rows = mysqli_fetch_assoc($user_exist_query_run))
                    {
                        $Username = $rows["Username"];
                        if($username == $Username)
                        {
                            $userErr = "* Username already existed.";
                        }
                    }
                    $username = filtering_input($username);
                }
            }
        }

        if(empty($password))
        {
            $passErr = "* Empty Field.";
        }
        else
        {
            if(strlen($password)<5)
            {
                $passErr = "* Please create a strong password.";
            }
            else
            {
                $password = filtering_input($password);
            }
        }

        if(strlen($nameErr)==0 && strlen($emailErr)==0 && strlen($userErr)==0 && strlen($passErr)==0)
        {
            $hash = "$1$10$";
            $password = crypt($password, $hash);

            $insert_query = "insert into Data(FULLName, Email, Username, Password) values('$name', '$email', '$username', '$password')";
            $insert_query_run = mysqli_query($serverun, $insert_query);
            
            header("Location: admin.php");
        }
    }

    function filtering_input($data)
    {
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        
        return $data;
    }
    
?>
<?php include("includes/html_basic.php"); ?>  
    <link rel="stylesheet" href="css/sign_up.css">
    <script src="js/login.js"></script>
</head>
<body>
    <h2 class="backHead"><a href="login.php" class="back"><img src="arrow.png"> Back</a></h2>
        <div class="main">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <h2 class="center">Sign Up</h2>
            <label>Full Name</label>
            <div class="twoinone">
                <img src="name.png">
                <input type="text" name="name" class="input" placeholder="Enter your full name..." value="<?php echo $name; ?>">
            </div>
            <span class="col"><?php echo $nameErr; ?></span>
            <hr class="hr">
            <label>Email</label>
            <div class="twoinone">
                <img src="gmail.png">
                <input type="text" name="email" class="input" placeholder="Enter your email id..." value="<?php echo $email; ?>">
            </div>
            <span class="col"><?php echo $emailErr; ?></span>
            <hr class="hr">
            <label>Username</label>
            <div class="twoinone">
                <img src="user.png">
                <input type="text" name="user" class="input" placeholder="Enter your username..." value="<?php echo $username; ?>">
            </div>
            <span class="col"><?php echo $userErr; ?></span>
            <hr class="hr">
            <label>Password</label>
            <div class="threeinone">
                <img src="pass.png">
                <input type="password" name="pass" class="input" id="pass" placeholder="Enter your password..." value="<?php echo $password; ?>">
                <img class="eye" id="eyebt" src="eye.png" onclick="showpass()">
            </div>
            <span class="col"><?php echo $passErr; ?></span>
            <hr class="hr">
            <div class="center">
                <input type="submit" value="SIGN UP" class="logbt">
                <br>
                <h4>' Or '</h4>
                <a href="login.php">Login</a>
            </div>
            </form>
        </div>
</body>
</html>