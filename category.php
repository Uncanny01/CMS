<?php include("includes/topOFadmin.php") ?>

        <div class="content">
            <div class="leftcontent">
                <div class="type" id="type" onclick="window.location.href='admin.php'" style="border-radius: 5px 5px 0px 0px">
                    <i class="fa fa-gear"></i>Dashboard
                    <span class="circle" id="circle">
                        <?php 
                            include("includes/dashnum.php");
                        ?>
                    </span>
                </div>
                <div class="type" id="type" onclick="window.location.href='posts.php'">
                    <i class="fa fa-pencil"></i>Posts
                    <span class="circle" id="circle">
                    <?php include("includes/postsnum.php"); ?>
                    </span>
                </div>
                <div class="type" id="type" style="color: white; background-color: rgb(53, 109, 165);">
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
                    Post Listing
                </div>
                <div class="rightpostcontbot">
                    <button class="addpost" onclick="window.location.href='addcat.php'">
                        Add New
                    </button>
                    <table>
                        <tr>
                            <th>Category</th>
                            <th>Delete ?</th>
                        </tr>
                        <?php 
                            $catpage_query = "select * from categories";
                            $catpage_query_run = mysqli_query($serverun, $catpage_query);
                            while($rows = mysqli_fetch_assoc($catpage_query_run))
                            {
                                $catname = $rows['name'];
                                echo 
                                "<tr>
                                <td style='border: 1px solid rgb(207, 207, 207); padding: 6px;'>$catname</td>
                                <td style='border: 1px solid rgb(207, 207, 207); padding: 6px;'><a href='category.php?delete={$catname}'>Delete</td>
                                </tr>";
                                if(isset($_GET['delete']))
                                {
                                    $dele = $_GET['delete'];
                                    $del_query = "delete from categories where name = '{$dele}'";
                                    mysqli_query($serverun, $del_query);
                                    echo "<script>window.location.href='category.php'</script>";
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>