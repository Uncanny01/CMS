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
                <div class="type" id="type" onclick="window.location.href='category.php'">
                    <i class="fa fa-list"></i>Categories
                    <span class="circle" id="circle">
                    <?php include("includes/catnum.php"); ?>
                    </span>
                </div>
                <div class="type" id="type" style="border-radius: 0px 0px 5px 5px; color: white; background-color: rgb(53, 109, 165);">
                    <i class="fa fa-user"></i>Users
                    <span class="circle" id="circle" style="float: right; color: rgb(53, 109, 165); background-color:white;">
                    <?php include("includes/usersnum.php"); ?>
                    </span>
                </div>
            </div>
            <div class="rightcontent">
                <div class="rightcontop">
                    Latest Users
                </div>
                <div class="rightpostcontbot">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Mail Id</th>
                            <th>Delete ?</th>
                        </tr>
                        <?php 
                            $userspage_query = "select * from Data";
                            $userspage_query_run = mysqli_query($serverun, $userspage_query);
                            while($rows = mysqli_fetch_assoc($userspage_query_run))
                            {
                                $name = $rows['FullName'];
                                $username = $rows['Username'];
                                $mail = $rows['Email'];
                                echo 
                                "<tr>
                                    <td style='border: 1px solid rgb(207, 207, 207); padding: 6px;'>$name</td>
                                    <td style='border: 1px solid rgb(207, 207, 207); padding: 6px;'>$username</td>
                                    <td style='border: 1px solid rgb(207, 207, 207); padding: 6px;'>$mail</td>
                                    <td>
                                        <a href='users.php?delete={$username}'><button style='cursor:pointer;'>Delete</button>
                                    </td>
                                </tr>
                                ";
                                if(isset($_GET['delete']))
                                {
                                    $del = $_GET['delete'];
                                    $del_query = "delete from Data where username = '$del'";
                                    mysqli_query($serverun, $del_query);
                                    echo "<script>window.location.href='users.php'</script>";
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