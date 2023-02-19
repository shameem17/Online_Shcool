<?php include('../config.php'); ?>

<?php 
 $sql="select distinct exam_id from results where publish='0';";
 $result=mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Publish Result|Admin</title>
  <style type="text/css">
      body{
         background: #0df18f;
      }
      td,th{
     padding: 15px 15px;
     text-align: center;
  }
   </style>
</head>
<body>
	<nav>
   	 <ul>
   	 	<li><a href="adminpanel.php">Home</a></li>
   	 	<li><a href="students.php?" class="active">Students Management</a></li>
   	 	<li><a href="notice.php">Notice Management</a></li>
   	 	<li><a href="createexam.php">Set Exam</a></li>
      <li><a href="../login.php">Logout</a></li>
   	 </ul>

   </nav>

	<center><br><h2>Unpublished Exam List</h2><br><br></center>
     
  
     
     <?php 

       if ($result->num_rows <= 0) {
     
        echo "<center><h2>No Results to publish</h2></center>";
     }
     else
     {
           echo" <center><table border=\"1\">
               <tr> <th>Exam Id</th><th>Subject</th><th>Class</th><th>Publish</th></tr>";
                  while($row = $result->fetch_assoc()) {
                  	$exam_id=$row['exam_id'];
                  	$subject="";
                  	$class="";
                  	$sl="select * from results where exam_id='$exam_id';";
                  	$rw=mysqli_query($conn,$sl);
                  	while($r=$rw->fetch_assoc())
                  	{
                  	  $subject=$r['subject'];
                  	  $class=$r['class'];
                  	  break;

                  	}
                  echo "   <tr>
                          <td>$exam_id</td>
                          <td>$class</td>
                          <td>$subject</td>
                          <td><a href=\"res.php?id=$exam_id\">Publish</a></td>

                  </tr>



                  ";

                  }
              }
              
          

     ?>
     	
     </table>
 </center>
</body>
</html>