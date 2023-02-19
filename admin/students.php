<?php include('../config.php'); ?>

<?php 

$class="";
if(isset($_POST['show']))
{
	$class=$_POST['class'];

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
   	 	<li><a href="students.php?" class="active">Students Management</a></li>
   	 	<li><a href="notice.php">Notice Management</a></li>
   	 	<li><a href="createexam.php">Set Exam</a></li>
      <li><a href="../login.php">Logout</a></li>
   	 </ul>

   </nav>

	<center><h2>Students Data</h2></center>
     <form method="post" action="students.php">
     	<label for="class">Select Class</label>
     <select name="class" id="class">
  <option value="1">Class 1</option>
  <option value="2">Class 2</option>
  <option value="3">Class 3</option>
  <option value="4">Class 4</option>
  <option value="5">Class 5</option>
</select>
     	<input type="submit" name="show" value="Show">
     </form>
   <center><table border="1">
     
     <?php 
     if($class=="")
     {
        echo "<h3>Please select a class</h3>";
     }
     else
     {

       $sql="select *from students where class='$class'";
       $result=mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                  	$roll=$row['roll'];
                  	$name=$row['first_name'].' '.$row['last_name'];
                  	$email=$row['email'];
                  	$username=$row['username'];

                  echo "   <tr>
                          <td>$roll</td>
                          <td>$name</td>
                          <td><a href=\"info.php?id=$roll\">$username</a></td>
                          <td>$email</td>


                  </tr>



                  ";

                  }
              }
              else
              {
              	echo "<h3>No Students In this class";
              }
          }

     ?>
     	
     </table>
 </center>
</body>
</html>