<?php 
    $postsnum = 0;
    $admin_posts_query = "select * from post";
    $admin_posts_query_run = mysqli_query($serverun, $admin_posts_query);
    while($rows = mysqli_fetch_assoc($admin_posts_query_run))
    {
        $postsnum++;
    }
    echo $postsnum;
?>