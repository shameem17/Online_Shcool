
<?php include('server.php');?>
<?php include('config.php'); ?>
<?php 

if(isset($_GET['no']))
{
  $pp=$_GET['no'];
  $username=$_SESSION['username'];
  $sq="delete from todo where username='$username' and id=$pp;";
  $result=mysqli_query($conn,$sq);
  unset($pp);
  unset($_GET['no']);
  header('location:dashboard.php');
  // unset('id');
}

?>