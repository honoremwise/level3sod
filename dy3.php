<html>
    <title>level3sod</title>
    <body>
<?php
$con=mysqli_connect("localhost","root","","level3sod");
if($con)
{

}
else{
    echo mysqli_error($con);
}
if(isset($_GET['delete']))
{
    $username=$_GET['username'];
$qrys=mysqli_query($con,"delete from user where username='$username'");
if($qrys)
{
    echo"Deleted";
}
}
if(isset($_GET['edit']))
{
   $rec=mysqli_query($con,"select * from user where username='".$_GET['edit']."'");
if($rec)
{
    $row=mysqli_fetch_array($rec);

if(isset($_POST['update']))
{
$username=$_POST['username'];
$pswd=$_POST['password'];
echo $username.": ".$pswd;
   
    $update=mysqli_query($con,"update user set password='$pswd' where username='$username'");
if($update)
{
    echo "updated";
}
}
?>

<form method="post" action="">
            <label>username</label>
            <input type="text" name="username" value="<?php echo $row['username']?>"/>
            <br><label>password</label>
            <input type="text" name="password" value="<?php echo $row['password']?>"/>
            <br><button type="submit" name="update">UPdate</button>
</form>
<?php
    echo $row['username'];
}
}
if(isset($_POST['test']))
{

$username=$_POST['username'];
$password=$_POST['password'];

$save=mysqli_query($con,"insert into user (username,password) values('$username','$password')");
   if($save)
   {
    echo "we did it hee";
   }
   else
   {
    echo mysqli_error($save);
   }
}
    
  // display our
  $qry=mysqli_query($con,"select * from user");
  if($qry)
  {
    echo "<table border=2>
    <tr><th>username</th><th>password</th><th>options</th></tr>";
    while($rec=mysqli_fetch_array($qry))
    {
        echo "<tr><td>".$rec['username']."</td><td>".$rec['password']."</td><td><a href=?edit=".$rec['username'].">Edit</a>|<a href=?delete=".$rec['username'].">Delete</a></td></tr>";
    }
    echo"</table>";

}


//retrieve data 

// $qry=mysqli_query($con,"select * from user");
// if($qry)
// while($row=mysqli_fetch_array($qry))
// {
// echo $row['id'].".".$row['names']."<a href=?id=".$row['id'].">delete</a><br>";
// }
// else
// {
//     echo mysqli_error($qry);
// }
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
</body>
</html>