
<?php include('initialize.php');?>

<?php 
if(!isset($_SESSION['id']))
{
  $logerr="You Must LogIn First";
   header(('location:login.php'));
}
if(!isset($_SESSION['admin']))
{
   $logerr="You Must LogIn First";
     header(('location:../login.php'));
}
$day=date('l');
$month=date('m');
$date=date('Y-m-d');

if(isset($_GET['message']))
{
  unset($_GET['message']);
  header('location:message.php');
}

if(isset($_GET['profile']))
{
  
  
  unset($_GET['profile']);
  header('location:profile.php');
}
if(isset($_GET['dashboard']))
{
  unset($_GET['dashboard']);
  header('location:dashboard.php');
}

if(isset($_GET['classroom']))
{
  unset($_GET['classroom']);
  header('location:classroom.php');
}
if (isset($_GET['exam'])) {
  // code...
  unset($_GET['exam']);
  header('location:exam.php');
}

if(isset($_GET['join']))
{
   $now=$_GET['join'];

   $roll=$_SESSION['id'];
    $sql="select *from $now where dt='$date' and roll='$roll'; ";
    $rr=mysqli_query($conn,$sql);
    if($rr->num_rows >0)
    {
       echo "<p style=\"color:red; font-size:20px; text-align:center; font-weight:500; top:50%;\">$roll Has Already Joined $now Class Successfully</p>";
    }
    else
    {

         $sql="insert into $now (dt,month,class,roll) values('$date','$month','$class','$roll');";
        $res=mysqli_query($conn,$sql);
       echo "<p style=\"color:red; font-size:20px; text-align:center; font-weight:500; top:50%;\">$roll Joined $now Class Successfully</p>";
    }

   
   unset($_GET['join']);

}
 if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');

  } 

  if(isset($_GET['ok'])){
  
  $sql="update todo set done='1' where roll='$roll' and (dt='$dt' or dt='$dt2');";
  $result=mysqli_query($conn,$sql);
  unset($_GET['ok']);
  header('location:dashboard.php');
}
if(isset($_GET['clear'])){

  $id=$_GET['clear'];
  $dt=date("d/m/Y");
  $dt2=date("Y-m-d");
  $sql="delete from todo where roll='$roll' and (dt='$dt' or dt='$dt2');";
  $result=mysqli_query($conn,$sql);
  unset($_GET['clear']);
   header('location:dashboard.php');
}
if(isset($_GET['addtodo'])){
  header('location: addtodo.php');
}

if(isset($_GET['hoyegase']))
{
  $id=$_GET['hoyegase'];
  $sql="update todo set done='1' where roll='$roll' and id='$id';";
  $result=mysqli_query($conn,$sql);
  unset($_GET['hoyegase']);
   header('location:dashboard.php');
}






?>