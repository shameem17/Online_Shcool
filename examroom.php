<?php include('initialize.php'); ?>

<style type="text/css">
  table{
    border-collapse: collapse;
  }
  td{
     padding: 10px 10px;
     text-align: center;
  }
  .button{
    padding: 10px 10px;
    background: #0df18f;
    bottom: 150px;
    position: absolute;
  }
</style>

<?php
 
  if(isset($_GET['join_exam']))
  {
  	$exam_id=$_GET['join_exam'];
  }

 $find="select *from results where exam_id='$exam_id' and roll='$roll';";
  $result=mysqli_query($conn,$find);
        if ($result->num_rows > 0)
{
   echo "<center><h1 style=\"color:red\">You Have Already Attened the Exam</h1></center>";
}
else
{
   $sql="select *from examschedule where exam_id='$exam_id';";

  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $start_h=$row['start_h'];
  $start_m=$row['start_m'];
  $end_h=$row['end_h'];
  $end_m=$row['end_m'];
  $sb=$row['exam_name'];
  $duration=$row['duration'];
  
  $h=date('h');
  $m=date('i');
  $am=date('A');
  $h=$h+5;
if($am=="PM"&&$h!='12')
{
	$h=$h+'12';
}
 if($end_h==$h&&$end_m<$m)
{
    echo "The Exam Is Over<br>";
    $now="The Exam Is Over";
}
else if($start_h>$h)
{
    echo "The Exam Has not Started Yet";
    $now="The Exam Has not Started Yet";
}
else if(($start_h==$h&&$end_m>=$m&&$m>=$start_m)||$end_h>$h)
{
	echo "<center><h1>Exam is running</h1><br><p>Exam Id: $exam_id &nbsp; &nbsp; Subject: $sb</p></center><br>";
	$sql="select *from $exam_id;";
	  $result=mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
          echo "<form method=\"post\" action=\"result.php?exam_id=$exam_id\"><center><table border=\"1\">
          <tr><td>Question No</td> <td>Question</td> <td colspan=\"4\">Options</td> <td colspan=\"4\">Select Answer</td></tr>";
          while($row = $result->fetch_assoc()) {
          	$qn=$row['question_no'];
          	$q=$row['question'];
          	$a=$row['opa'];
          	$b=$row['opb'];
          	$c=$row['opc'];
          	$d=$row['opd'];
            
          	echo "<tr><td>$qn</td> <td>$q</td><td>(A) $a</td> <td>(B) $b</td> <td>(C) $c</td> <td>(D)$d</td><td> <input type=\"radio\" name=\"$qn\" value=\"A\" >A    </td><td> <input type=\"radio\" name=\"$qn\" value=\"B\" >B    </td><td> <input type=\"radio\" name=\"$qn\" value=\"C\">C    </td><td> <input type=\"radio\" name=\"$qn\" value=\"D\">D    </td></tr>";

          }
        echo  "<br><input type=\"submit\" name=\"submit_ans\" class=\"button\"></input> </form></center></table>";



      }
}
else
{
  echo "The exam is over";
}
}


?>
