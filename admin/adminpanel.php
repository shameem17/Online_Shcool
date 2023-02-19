<?php include('../config.php'); ?>
<?php  

if(isset($_POST['publish']))
{
   header('location:createexam.php');
  
}

?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="style.css">
   <style type="text/css">
      body{
         background: #0df18f;
      }
   </style>
 	<title>Admin Panle</title>
 </head>
 <body>
  
   <nav>
   	 <ul>
   	 	<li><a href="#" class="active">Home</a></li>
   	 	<li><a href="students.php">Students Management</a></li>
   	 	<li><a href="notice.php">Notice Management</a></li>
   	 	<li><a href="createexam.php">Set Exam</a></li>
      <li><a href="../login.php">Logout</a></li>
   	 </ul>

   </nav>
   <center><h1>Welcome To the Admin Panel</h1>

<h2 style="margin-top: 100px;">The School Administration</h2><br><br>

<a href="publish.php" style="padding:10px 10px; background: blue; color: white;">Publish Result</a>


   </center>



 </body>
 </html>