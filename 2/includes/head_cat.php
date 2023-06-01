<?php 

    $catquery = "select * from categories";
    $catrun = mysqli_query($serverun, $catquery);
    $x=0;
    if($catrun)
    {
        while($rows = mysqli_fetch_assoc($catrun))
        {
            $id = $rows['id'];
            $name = $rows['name'];
            echo $name." &nbsp;";
            $x++;
            if($x==3)
            {
                break;
            }
        }
    }

?>