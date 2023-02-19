<?php include('../config.php'); ?>

<?php 
$ex=$_GET['id'];
 $sql="update results set publish='1' where exam_id='$ex';";
 $result=mysqli_query($conn,$sql);
   header('location:publish.php');

?>