<?php include("includes/dbconn.php") ?>
<?php 
    $successfull = "";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $category = $_POST['category'];
        if(!empty($category ))
        {
            $add_cat_query = "insert into categories(name) values('$category')";
            $add_cat_query_run = mysqli_query($serverun, $add_cat_query);

            $successfull = "<p style='padding: 15px;
            background-color: rgba(21, 177, 27, 0.468);
            border: 1px solid rgb(21, 177, 27);
            color: green;'>
            <i class='fa-solid fa-thumbs-up' style='color: green;'></i>
            Category saved successfully.</p>";
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
                <div class="type" id="type" onclick="window.location.href='posts.php'">
                    <i class="fa fa-pencil"></i>Posts
                    <span class="circle" id="circle">
                    <?php include("includes/postsnum.php"); ?>

                    </span>
                </div>
                <div class="type" id="type" onclick="window.location.href='category.php'" style="color: white; background-color: rgb(53, 109, 165);">
                    <i class="fa fa-list"></i>Categories
                    <span class="circle" id="circle" style="color: rgb(53, 109, 165); background-color:white;">
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
                        <?php echo $successfull; ?>
                        <label>Category Name</label>
                        <br>
                        <input type="text" name="category" placeholder="Category name ..." class="inputaddpost">
                        <br><br>
                        <input type="submit" value="Save" class="savebt">

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>