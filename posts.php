<?php include("includes/topOFadmin.php") ?>

        <div class="content">
            <div class="leftcontent">
                <div class="type" id="type" onclick="window.location.href='admin.php'" style="border-radius: 5px 5px 0px 0px">
                    <i class="fa fa-gear"></i>Dashboard
                    <span class="circle" id="circle">
                        <?php include("includes/dashnum.php"); ?>
                    </span>
                </div>
                <div class="type" id="type" style="color: white; background-color: rgb(53, 109, 165);">
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
                    Post Listing
                </div>
                <div class="rightpostcontbot">
                    <button class="addpost" onclick="window.location.href='addpost.php'">
                        Add New
                    </button>
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Created on</th>
                            <th>Delete ?</th>
                        </tr>
                        <?php 

                            $postpage_query = "select * from post";
                            $postpage_query = mysqli_query($serverun, $postpage_query);

                            while($rows = mysqli_fetch_assoc($postpage_query))
                            {
                                $title = $rows['question'];
                                $category = $rows['Tag'];
                                $author = $rows['author'];
                                $date = $rows['date'];
                                echo 
                                "<tr>
                                    <td style='border: 1px solid rgb(207, 207, 207); padding: 6px;'>$title</td>
                                    <td style='border: 1px solid rgb(207, 207, 207); padding: 6px;'>$category</td>
                                    <td style='border: 1px solid rgb(207, 207, 207); padding: 6px;'>$author</td>
                                    <td style='border: 1px solid rgb(207, 207, 207); padding: 6px;'>$date</td>
                                    <td style='border: 1px solid rgb(207, 207, 207); padding: 6px;'>
                                        <a href='posts.php?delete={$title}'>Delete</a>
                                    </td>
                                </tr>";
                                if(isset($_GET['delete']))
                                {
                                    $delete = $_GET['delete'];
                                    $delquery = "delete from post where question = '{$delete}'";
                                    mysqli_query($serverun, $delquery);
                                    echo "<script>window.location.href='posts.php'</script>";
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