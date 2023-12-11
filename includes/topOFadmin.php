<?php
    include("includes/dbconn.php");
?>
    
<?php 
    session_start();
    $user = $_SESSION['Username'];
    if(!$user)
    {
        header("Location: login.php");
        exit();
    }
?>

<?php include("includes/html_basic.php"); ?>  

    <link rel="stylesheet" href="css/admin.css">
    <script src="js/admin.js"></script>
</head>
<body>
    <div class="main">
        <div class="top">
            <button onclick="window.location.href='adminindex.php'" class="bt"><i class="fa fa-arrow-left"></i> Home</button>
            <i class="fa fa-gear fa-3x" style="color: white; margin: 10px; margin-left: 150px;"></i>
            <label class="lab">Dashboard</label>
            <label class="lab1">Manage Your Site</label>
            <span class="userwelcome">Hello, 
                <?php 
                    echo $user;
                ?>
            </span>
            <span class="profile">
                <?php 
                $profile = strtoupper($user[0]);
                echo $profile;
                ?>
            </span>
            <div class="logoutdisplay">
                <a href="sessiondestroyer.php">LogOut ?</a>
            </div>
        </div>
        