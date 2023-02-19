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
    font-size: 20px;

  }
  h1{
    color: red;
  }
</style>
 <?php

 if(isset($_POST['submit_ans']))
  {
   $roll=$_SESSION['id'];

    $ex=$_GET['exam_id'];
    $correct=$wrong=0;
    $sub="";
    $sl="select *from examschedule where exam_id='$ex';";
    $rs=mysqli_query($conn,$sl);
    if ($rs->num_rows > 0) 
      while($row = $rs->fetch_assoc()) {
      $sub=$row['exam_name'];
     
      break;
    }

    echo "<center><br><br> <h1>Exam Evaluation</h1></center>";
    echo "<center><p style=\"font-style:bold\">Roll: $roll &nbsp; &nbsp; Exam: $ex<br>Subject:$sub<p></center><br>";
    $sql="select *from $ex;";
  
    echo "<center><table border=\"1\"><tr><th>Ouestion No</th><th>Your Answer</th></tr>";

    $result=mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
          $ans=$row['ans'];
          $qn=$row['question_no'];
          $rp=$_POST[$qn];
          
          

          if($ans==$rp)
          {
            $correct=$correct+1;
            echo "<tr><td>$qn</td><td>$rp</td></tr>";
          }
          else
          {
             echo "<tr><td>$qn</td><td>$rp</td></tr>";
            $wrong=$wrong+1;
          }

        }
     }
     echo"</table>";
     $mark=$correct;
     echo"<p>Your Answer Has Been Counted Successfully. Please Wait For Result to be Published.</center>";

     $sl="select * from results where roll='$roll' and exam_id='$ex';";
     $rls=mysqli_query($conn,$sl);
        if ($rls->num_rows > 0) {
            header('location:exam.php');
        }
        else
        {

     $sql="INSERT INTO `results` (`exam_id`,`subject`, `roll`, `class`, `correct`, `wrong`, `marks`,`publish`) VALUES ('$ex','$sub','$roll','$class','$correct','$wrong','$mark','0');";
     $res=mysqli_query($conn,$sql);
   }

     



  }
?>