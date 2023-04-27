<?php
$id=3;
$names="John";
$con=mysqli_connect("localhost","root","","level3sod");
if($con)
{
    // echo ""
    // $save=mysqli_query($con,"INSERT INTO user (id,names) VALUES ('$id','$names')"); 
    // if($save)
    // {
    //     echo "data saved successfully";
    // }
    // else{
    //     echo mysqli_error($save);
    // }
}
else{
    echo mysqli_error($con);
}

//retrieve data 

$qry=mysqli_query($con,"select * from user");
if($qry)
while($row=mysqli_fetch_array($qry))
{
echo $row['id'].".".$row['names']."<a href=?id=".$row['id'].">delete</a><br>";
}
else
{
    echo mysqli_error($qry);
}
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    echo $id;
     $qry=mysqli_query($con,"delete from user where id=$id");
     if($qry)
     {
        echo "successfully deleted";
     }
}
?>