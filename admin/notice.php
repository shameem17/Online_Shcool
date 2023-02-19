<?php include('../config.php'); ?>

<?php 

$class="";
if(isset($_POST['set_notice']))
{
	$roll=$_POST['receiver'];
  $txt=$_POST['txt'];
  $sq="insert into notice(receiver,message) values('$roll','$txt');";
  $res=mysqli_query($conn,$sq);

}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Students|Admin</title>
  <style type="text/css">
      body{
         background: #0df18f;
      }
   </style>
</head>
<body>
	<nav>
   	 <ul>
   	 	<li><a href="adminpanel.php">Home</a></li>
   	 	<li><a href="students.php">Students Management</a></li>
   	 	<li><a href="notice.php" class="active">Notice Management</a></li>
   	 	<li><a href="createexam.php">Set Exam</a></li>
      <li><a href="../login.php">Logout</a></li>
   	 </ul>

   </nav>

	<center><h2>Send Notice</h2></center>
     
   <center>
     
    <form method="post" action="notice.php">
      <textarea placeholder="notice here" rows="20" cols="60" name="txt"></textarea><br>
      <label id="receiver">Receiver(Student Id): </label> &nbsp;
      <input type="text" name="receiver">
      <input type="submit" name="set_notice" value="Send Notice">
      
    </form>
 </center>
</body>
</html>