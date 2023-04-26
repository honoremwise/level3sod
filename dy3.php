<?php
    $con = mysqli_connect("localhost","root","","internship");
    $id = 1;
    $name = "Arsene";
    if ($con) {
        $save = mysqli_query($con,"INSERT INTO users VALUES('$id','$name')");
        if ($save) {
            echo "data save successed";
        }
        else {
            echo mysqli_error($save);
        }
    }
    else {
        echo mysqli_error($con);
    }

?>