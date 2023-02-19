 <?php include_once('initialize.php'); ?>

 <style type="text/css">
  table{
    border-collapse: collapse;
  }
  td,th{
     padding: 15px 15px;
     text-align: center;
  }
  .button{
    padding: 10px 10px;
    background: #0df18f;
    bottom: 150px;
    position: absolute;
  }
  p{
    font-size: 22px;

  }
  h1{
    color: red;
    font-size: 30px;
  }
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
<nav>
     <ul>
      <li><a href="dashboard.php">Home</a></li>
      <li><a href="exam.php?">Exam</a></li>
      <li><a href="classroom.php">Class</a></li>
     </ul>

   </nav>


 <?php

    $ex=$_GET['show_res'];
    $correct=$wrong=0;
    $sub="";

    $sl="select *from results where exam_id='$ex' and roll='$roll' and publish='1';";
    $rs=mysqli_query($conn,$sl);
    if ($rs->num_rows > 0) 
    {
      while($row = $rs->fetch_assoc()) {
      $sub=$row['subject'];
      $correct=$row['correct'];
      $wrong=$row['wrong'];
      break;
    }

    echo "<center><br><br> <h1>Exam Evaluation</h1></center>";
    echo "<center><p style=\"font-style:bold\">Roll: $roll &nbsp; &nbsp; Exam: $ex<br><br>Subject: $sub<p></center><br>";
     $sql="select *from $ex;";
  
     echo "<center><table border=\"1\"><tr><th>Ouestion No</th><th>Right Answer</th></tr>";

     $result=mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
          $ans=$row['ans'];
          $qn=$row['question_no'];
           echo "<tr><td>$qn</td><td>$ans</td></tr>";
          }
        }
     
     echo"</table><br><br>";
     echo "<p>Right Answer: $correct";
     echo "<br>";
     echo "Wrong Answer: $wrong <br>";
     $mark=$correct;
     echo "Marks= $mark </p></center>";
   }
   else
   {
       echo "<center><br><br> <h1>Result Has Not Published Yet</h1></center>";
   }

     
?>