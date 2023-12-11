<?php include("includes/dbconn.php"); ?>
<?php include("includes/html_basic.php"); ?>
<link rel="stylesheet" href="css/front.css">
<script src="js/front.js"></script>
</head>
<body>
    <div class="main">
        <div class="top">
            <div class="tl">
                CMS DEMO
            </div>
            <div class="tc">
                <?php
                    include("includes/head_cat.php");
                ?>
                <span class="see">see all...</span>
            </div>
            <div class="tcc">
                <form action="adminsearch.php" method="POST">
                    <i class="fa-solid fa-magnifying-glass fa-s">
                        <input type="text" name="search_box" id="search" class="input" placeholder="Search any category...">
                        <span class="x" onclick="hideText()" id="x">x</span>
                        <input type="submit" value="Search" name="search_submit" class="search_bt">
                    </i>
                </form>
            </div>
            <div class="tr">
                <button class="adminbt" onclick="window.location.href='admin.php'">Admin</button>
            </div>

            </div>
        <div class="center">
            <?php
                $post_query = "select * from post";
                $post_query_run = mysqli_query($serverun, $post_query);
                while($rows=mysqli_fetch_assoc($post_query_run))
                {
                    $question = $rows['question'];
                    $date = $rows['date'];
                    $content = $rows['content'];
                    $author = $rows['author'];
            ?>
                    <h1 class="ques"><?php echo $question; ?></h1>
                    <h3><label class="publish by">Published on : </label><?php echo $date; ?><label class="publish by">&nbsp; By </label><?php echo $author; ?></h3>
                    <p><?php echo $content; ?></p>
                    <hr class="hr">
            <?php
                }
            ?>
            
        </div>
    </div>
</body>
</html>