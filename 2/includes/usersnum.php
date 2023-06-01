<?php 
    $usernum = 0;
    $admin_user_query = "select * from data";
    $admin_user_query_run = mysqli_query($serverun, $admin_user_query);
    while($rows = mysqli_fetch_assoc($admin_user_query_run))
    {
        $usernum++;
    }
    echo $usernum;
?>