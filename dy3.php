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
if(isset($_GET['edit']))
{
 $_GET['edit']."hihi.";
    $qry=mysqli_query($con,"select * from user where username='".$_GET['edit']."'");
    $row=mysqli_fetch_array($qry);

    $row['password'];

    ?>
     <form method="post" action="">
            <label>username</label>
            <input type="text" value="<?php echo $_GET['edit']?>" disabled/>
            <input type="text" name="username" value="<?php echo $_GET['edit']?>" hidden/>
            <br><label>password</label>
            <input type="text" name="password" value="<?php echo $row['password']?>"/>
            <br><button type="submit" name="update">update</button>
</form>
    <?php
}
if(isset($_POST['update']))
{
    echo $_POST["username"]."hihi";
    $qry=mysqli_query($con,"update user set password='".$_POST['password']."' where username='".$_POST['username']."'");
   if($qry)
   {
    echo "success";
   }
}
?>
</body>
</html>