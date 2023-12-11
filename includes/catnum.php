<?php 
    $catnum = 0;
    $admin_cat_query = "select * from categories";
    $admin_cat_query_run = mysqli_query($serverun, $admin_cat_query);
    while($rows = mysqli_fetch_assoc($admin_cat_query_run))
    {
        $catnum++;
    }
    echo $catnum;
?>