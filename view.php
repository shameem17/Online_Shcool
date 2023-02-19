<?php include('initialize.php'); ?>

<?php


$sub=$_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Results</title>
	<style type="text/css">
		body{
			background: #0DF18F;
			padding: 10px;
		}
		table{
			border-collapse: collapse;
		}
		

		td,th{
			padding: 15px 15px;
			text-align: center;

		}
		a{
			text-decoration: none;
		}
		*{
 			margin: 0;
 			padding: 0;

 		}
 		p{
 			font-size: 22px;
 		}
 		h2{
 			font-size: 28px;
 			color:red;
 		}
 		ul {
 		
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: tomato;
}
.active {
  background-color: #4148E0;
  border: 1px solid #4148e0;
  border-radius: 200px;
}
	</style>
</head>

<body>
<nav>
   	 <ul>
   	 	<li><a href="dashboard.php">Home</a></li>
   	 	<li><a href="exam.php?">Exam</a></li>
   	 	<li><a href="classroom.php">Class</a></li>
   	 </ul>

   </nav>
    <?php echo " <center><br> <h2>$sub Exam List</h2><br>";

         echo "<p>Roll: $roll  &nbsp; &nbsp; &nbsp; Class:$class</P>";
     ?>
     
       <?php 
 
        $sql="select * from results where subject='$sub' and roll='$roll'; ";
       $result=mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
        	echo "<table  border=\"1\"><tr> <th>Exam Id</th><th>Subject</th><th>Show Result</th></tr>";
          while($row = $result->fetch_assoc()) {
        $exam_now=$row['subject'];
        $exam_id=$row['exam_id'];
        
        echo "<tr><td>$exam_id </td><td> $exam_now</td><td> <a href=\"show.php?show_res=$exam_id\">Show</a></td></tr>";
            echo "<div class=\"line\"></div><br>";

    }
  }
else
  {
     
      echo "<br><h2>No Exam</h2>";
  }

     
       ?>
  
</body>
</html>