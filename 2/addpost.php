
<?php 
    $error = "";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        if(empty($title) || empty($content) || empty($author))
        {
            $error = "<p style='color:red; border: 1px solid red; padding: 15px; background-color: rgba(255, 0, 0, 0.161);'>
            <i class='fa fa-light fa-triangle-exclamation' style='color: #ff2600;'></i>
            Sorry, You can not save a post with any empty field.</p>";
        }
    }
?>


<?php include("includes/topOFadmin.php") ?>

        <div class="content">
            <div class="leftcontent">
                <div class="type" id="type" onclick="window.location.href='admin.php'" style="border-radius: 5px 5px 0px 0px">
                    <i class="fa fa-gear"></i>Dashboard
                    <span class="circle" id="circle">
                        <?php include("includes/dashnum.php"); ?>
                    </span>
                </div>
                <div class="type" id="type" onclick="window.location.href='posts.php'" style="color: white; background-color: rgb(53, 109, 165);">
                    <i class="fa fa-pencil"></i>Posts
                    <span class="circle" id="circle" style="color: rgb(53, 109, 165); background-color:white;">
                    <?php include("includes/postsnum.php"); ?>
                    </span>
                </div>
                <div class="type" id="type" onclick="window.location.href='category.php'">
                    <i class="fa fa-list"></i>Categories
                    <span class="circle" id="circle">
                    <?php include("includes/catnum.php"); ?>
                    </span>
                </div>
                <div class="type" style="border-radius: 0px 0px 5px 5px;" id="type" onclick="window.location.href='users.php'">
                    <i class="fa fa-user"></i>Users
                    <span class="circle" style="float: right;" id="circle">
                    <?php include("includes/usersnum.php"); ?>
                    </span>
                </div>
            </div>
            <div class="rightcontent">
                <div class="rightcontop">
                    Add New Post
                </div>
                <div class="rightaddpostcontbot">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                        <?php echo $error; ?>
                        <label>Title</label>
                        <br>
                        <input type="text" name="title" placeholder="Post title ..." class="inputaddpost">
                        <label>Content</label>
                        <br>
                        <textarea placeholder="Post content ..." name="content" class="textarea" cols="85" rows="5"></textarea>
                        <label>Category</label>
                        <br>
                        <select class="selectcat" name="select">
                            <option></option>
                            <?php 
                                $selectcat_query = "select * from categories";
                                $selectcat_query_run = mysqli_query($serverun, $selectcat_query);
                                while($rows = mysqli_fetch_assoc($selectcat_query_run))
                                {
                                    $name = $rows['name'];
                                    echo "<option value='$name'>$name</option>";
                                }
                            ?>
                        </select>
                        <label>Author</label>
                        <br>
                        <input type="text" name="author" placeholder="Post author ..." class="inputaddpost">
                        <br><br>
                        <input type="submit" value="Save" class="savebt">
                        <?php
                            $title = $content = $author = $select = $error = "";
                            if($_SERVER["REQUEST_METHOD"]=="POST")
                            {
                                $title = $_POST['title'];
                                $content = $_POST['content'];
                                $author = $_POST['author'];
                                $select = $_POST['select'];
                                if(empty($title) || empty($content) || empty($author) )
                                {
                                    echo "";
                                }
                                else
                                {
                                    date_default_timezone_set('Asia/Kolkata');
                                    $date = date("Y-m-d") ;
                                    $time = date("h:i:s") ;
                                    $selectcat_query = "select * from categories";
                                    $addpost_query = "insert into post(question, date, author, content, Tag) 
                                                        values('$title', '$date <br> $time', '$author', '$content', '$select')";
                                    $addpost_query_run = mysqli_query($serverun, $addpost_query);
                                    header("Location: posts.php");
                                }
                            }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>