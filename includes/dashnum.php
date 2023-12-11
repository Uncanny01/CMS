<?php 
    $postsnum = 0;
    $admin_posts_query = "select * from post";
    $admin_posts_query_run = mysqli_query($serverun, $admin_posts_query);
    while($rows = mysqli_fetch_assoc($admin_posts_query_run))
    {
        $postsnum++;
    }

    $catnum = 0;
    $admin_cat_query = "select * from categories";
    $admin_cat_query_run = mysqli_query($serverun, $admin_cat_query);
    while($rows = mysqli_fetch_assoc($admin_cat_query_run))
    {
        $catnum++;
    }

    $usernum = 0;
    $admin_user_query = "select * from data";
    $admin_user_query_run = mysqli_query($serverun, $admin_user_query);
    while($rows = mysqli_fetch_assoc($admin_user_query_run))
    {
        $usernum++;
    }

    $dashnum = $postsnum + $catnum + $usernum;
    echo $dashnum;
?>