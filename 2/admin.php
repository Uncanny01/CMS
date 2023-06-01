<?php include("includes/topOFadmin.php") ?>
        <div class="content">
            <div class="leftcontent">
                <div class="type" id="type" style="color: white; background-color: rgb(53, 109, 165); border-radius: 5px 5px 0px 0px">
                    <i class="fa fa-gear"></i>Dashboard
                    <span class="circle" id="circle" style="color: rgb(53, 109, 165); background-color:white;">
                        <?php include("includes/dashnum.php"); ?>
                    </span>
                </div>
                <div class="type" id="type" onclick="window.location.href='posts.php'">
                    <i class="fa fa-pencil"></i>Posts
                    <span class="circle" style="float: right;" id="circle">
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
                    Website Overview
                </div>
                <div class="boxdiv">
                    <div class="box">
                        <i class="fa fa-user"></i>
                        <?php echo $usernum; ?>
                        <br>
                        <label class="dashname">Users</label>
                    </div>
                    <div class="box">
                        <i class="fa fa-list"></i>
                        <?php echo $catnum; ?>
                        <br>
                        <label class="dashname">Categories</label>
                    </div>
                    <div class="box">
                        <i class="fa fa-pencil"></i>
                        <?php echo $postsnum; ?>
                        <br>
                        <label class="dashname">Posts</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>