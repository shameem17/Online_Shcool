<?php include('server.php');?>
<?php include('config.php'); ?>

<?php 
//initiliaze
if(!isset($_SESSION['id']))
{
  $logerr="You Must LogIn First";
   header(('location:login.php'));
}
$classmate="";
$fullname=$_SESSION['fullname'];
$username=$_SESSION['username'];
$roll =$_SESSION['id'];
$class="";
$cl="select *from students where roll='$roll';";
$r=mysqli_query($conn,$cl);
$rr=mysqli_fetch_assoc($r);
$class=$rr['class'];
$teacher="";
//classmate


//student count

$email=$class=$gurdian_name=$gurdian_email=$date_of_birth=$monthly_fee=$payment_status=$first_name=$last_name="";

$sql="select * from students where roll = '$roll' and username='$username' limit 1;";
// $result=mysqli_query($conn,$data);
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) == 1) {
 $row = mysqli_fetch_assoc($result);
$email=$row['email'];
$class=$row['class'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$gurdian_name=$row['gurdian_name'];
$gurdian_email=$row['gurdian_email'];
$date_of_birth=$row['date_of_birth'];
$monthly_fee=$row['monthly_fee'];
$payment_status=$row['payment_status'];
}
//student count
$sql = "select count(roll) from students;";
 $result = mysqli_query($conn,$sql);
$row1=mysqli_fetch_assoc($result);
$total_count=$row1['count(roll)']-5;
//classmates
$sql="select count(roll) from students where class='$class';";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$classmate=$row['count(roll)'];
$table="";
if($class==1)
{
  $table="class1_routine";
}
else if($class==2)
{
  $table="class2_routine";
}
else if($class==3)
{
  $table="class3_routine";
}
else if($class==4)
{
  $table="class4_routine";
}
else if($class==5)
{
  $table="class5_routine";
}

$c1=$c2=$c3=$c4=$c5=$c6=$c7="";
$dt=date("d/m/Y");
  $dt2=date('Y-m-d');
  $ddd="select count(id) from todo where roll='$roll' and (dt='$dt' or dt='$dt2') and done='0';";
  $rr=mysqli_query($conn,$ddd);
  $r=mysqli_fetch_assoc($rr);
$count_of_works=$r['count(id)'];
//teachers

$te="select count(teacher_id) from teachers;";
$res=mysqli_query($conn,$te);
$row=mysqli_fetch_assoc($res);
$no_of_teachers=$row['count(teacher_id)'];


//class Now

         $hour=date('h');
        $hour=$hour+5;
         $min=date('i');
         $now="";
         $day=date('l');
         // $day='Monday';
         if($day=='Saturday'||$day=='Friday')
         {
              $now="No Class Today";
         }
         else
         {
          if($day=='Sunday')
          {
            $day='Sun';
          }
          else if($day=='Monday')
          {
            $day='Mon';
          }
          else if($day=='Tuesday')
          {
            $day="Tue";
          }
          else if($day=='Wednesday')
          {
            $day='Wed';
          }
          else
          {
            $day='Thu';
          }
           $sq="select *from $table where day='$day';";
           if($hour>=4&&$hour<9||($hour<4&&$hour>9&&date('A')=='PM'))
           {
              $now="No Class In This Priod";
           }
           else{
            $res=mysqli_query($conn,$sq);
             $row=mysqli_fetch_assoc($res);
               // echo "<p>$row['c1']  $row['c2'] $row['c3']  $row['c4'] $row['c5']  $row['c6'] $row['c1']  $row['c7']</p>";
           if($hour==9 && $min<=50)
           {
                $now=$row['c1'];
           }
           else if(($hour==9 && $min>50)||($hour==10&&$min<=40))
           {
            $now=$row['c2'];
           }
           else if(($hour==10&&$min>40)||($hour==11&&$min<=30))
           {
            $now=$row['c3'];
           }
            else if(($hour==11&&$min>30)||($hour==12&&$min<=20))
           {
            $now=$row['c4'];
           }
            else if(($hour==12&&$min>20&&$hour!=01))
           {
            $now='BREAK';
           }
           else if(($hour=='01'||$hour==13)&&$min<=50)
           {
            $now=$row['c5'];
           }
           else if(($hour==13&&$min>50)||($hour==14&&$min<=40))
           {
            $now=$row['c6'];
           }
            else if(($hour==14&&$min>40)||($hour==15&&$min<=30))
           {
            $now=$row['c7'];
           }
           else
           {
            $now='No Class In This Priod';
           }
            
           }
           if($now!="No Class In This Priod"&&$now!="No Class Today"&&$now!="BREAK"&&$now!='-')
           {
              $sq="select *from teachers where subject='$now';";
              $res=mysqli_query($conn,$sq);
              $row=mysqli_fetch_assoc($res);
              $teacher=$row['teacher_name'];
           }
           


         }


//attendance info
          $bangla=$english=$math=$science=$religion=$history="";
            $sql ="select count(roll) from bangla where roll='$roll' and class ='$class'; ";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $bangla=$row['count(roll)'];

             $sql ="select count(roll) from english where roll='$roll' and class ='$class'; ";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $english=$row['count(roll)'];

            $sql ="select count(roll) from math where roll='$roll' and class ='$class'; ";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $math=$row['count(roll)'];

            $sql ="select count(roll) from science where roll='$roll' and class ='$class'; ";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $science=$row['count(roll)'];

            $sql ="select count(roll) from history where roll='$roll' and class ='$class'; ";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $history=$row['count(roll)'];

            $sql ="select count(roll) from religion where roll='$roll' and class ='$class'; ";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $religion=$row['count(roll)'];

// Exam Now
  //result 
            $mb=$mm=$me=$mr=$ms=$mh="0";


       
    // $sql="select *from results;";
    // $res=mysqli_query($conn,$sql);
    // $row=mysqli_fetch_assoc($res);
    // $pub=$row['publish'];
    // if($pub!='0')
    // {
    //    $sq="SELECT results.marks, examschedule.exam_name, 
    //    FROM results
    //     JOIN examschedule ON examschedule.exam_id=results.exam_id where results.roll='$roll';";
    //     $result=mysqli_query($conn,$sq);
    //    if ($result->num_rows > 0) {
    //               while($row = $result->fetch_assoc()) {
    //                 $sub=$row['exam_name'];
    //                 if($sub=='Bangla'||$sub=='bangla')
    //                 {
    //                   $mb=$row['marks'];
    //                 }
    //                 else if($sub=='Math')
    //                 {
    //                   $mm=$row['marks'];
    //                 }
    //                 else if($sub=='English')
    //                 {
    //                   $me=$row['marks'];
    //                 }
    //                 else if($sub=='Science')
    //                 {
    //                   $ms=$row['marks'];
    //                 }
    //                 else if($sub=='History')
    //                 {
    //                   $mh=$row['marks'];
    //                 }
    //                 else if($sub=='Religion')
    //                 {
    //                   $mr=$row['marks'];
    //                 }


    //               }
    //             }

    // }



?>

