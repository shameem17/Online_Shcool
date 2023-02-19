<?php include('config.php'); ?>
 
<?php
session_start();
 $regerr=$logerr="";
function formate_text($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
function roll($cl,$con)
{
	$roll="";
	$sql="select max(roll) from students where class='$cl';";
     $res=mysqli_query($con, $sql);
     $r=mysqli_fetch_assoc($res);
     if($r['max(roll)']==NULL)
     {
       if ($cl=='1') {
         // code...
          $roll='2201001';
       }
       else if($cl=='2')
       {
         $roll='2202001';
       }
       else if($cl=='3')
       {
         $roll='2203001';
       }
       else if($cl=='4')
       {
         $roll='2204001';
       }
       else if($cl=='5')
       {
         $roll='2205001';
       }
     }
     else
      { 
        
         $roll = $r['max(roll)'];
         $roll = $roll + '1';
      }
      return $roll;
}

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
	//login 
  if (isset($_POST['loginbtn'])) {

     $roll = formate_text($_POST['student_id']);
     $pp=$_POST['password'];
     $password = md5($_POST['password']);
     if($roll=="admin"&&$pp=="xyz")
     {
      $_SESSION['admin']=$roll;
       header('location:admin/adminpanel.php');
     }
     else
     {
     if(!empty($roll)&&!empty($password)){
          $sql = "select * from students where roll = '$roll' and password='$password' limit 1;";
          $result = mysqli_query($conn,$sql);
          if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
             $_SESSION['fullname'] = $row['first_name'].' '.$row['last_name'];
              $_SESSION['id'] = $roll;
             $_SESSION['username'] = $row['username'];
             $stat=$row['payment_status'];
            
             unset($_SESSION['msg']);       
            header('location: dashboard.php');
          }
          else{
            $logerr="Wrong password or username";
          }
     }
   }
}
//registration 
if (isset($_POST['regbtn'])) {
 
   unset($_SESSION['username']);
     $first_name=$last_name=$date_of_birth=$class=$email=$gurdian_name=$gurdian_email=$password=$cpassword="";
     $gender="";
     $first_name=formate_text($_POST['first_name']);
     $last_name=formate_text($_POST['last_name']);
     $date_of_birth=$_POST['date_of_birth'];
     $class=formate_text($_POST['class']);
     $gurdian_name=formate_text($_POST['gurdian_name']);
     $gurdian_email=formate_text($_POST['gurdian_email']);
     $email=formate_text($_POST['email']);
     $pp=$_POST['password'];
     $password=md5($_POST['password']);
     $gender=formate_text($_POST['gender']);
     $cpassword=md5($_POST['cpassword']);
     $username=formate_text($_POST['username']);
     $roll=roll($class,$conn);
     $addfee=$monthly_fee=$payment_status="";
     $addfee=$class*1000;
     $monthly_fee=$class*80;
     $payment_status='0';
     
     $flag=0;

        if(!empty($password)&&!empty($cpassword))
        {
   
        	if($password!=$cpassword)
        	{
        		$regerr="Password does not match";
        	}
        else
        {
        	$ss="select *from students where email='$email' or username='$username' limit 1;";
        	$dup=mysqli_query($conn, $ss);
        	$user=mysqli_fetch_assoc($dup);
        	if(mysqli_num_rows($dup)==1)
        	{
                   $regerr="This email or username has already been taken. Try another";
        	}
        	else
        	{

                  $new="insert into students(username,first_name,last_name,date_of_birth,class,roll,gender,email,gurdian_name,gurdian_email,addfee,monthly_fee,payment_status,password) values('$username','$first_name','$last_name','$date_of_birth','$class','$roll','$gender','$email','$gurdian_name','$gurdian_email','$addfee','$monthly_fee','$payment_status','$password');";
        
             $done=mysqli_query($conn,$new);
              $_SESSION['id'] = $roll;
             $_SESSION['username'] = $username;
             $_SESSION['fullname'] = $first_name.' '.$last_name;
             
             unset($_SESSION['msg']);
            header('location: secondreg.php');
           
        	}
        }
      }
}

}
//update
if(isset($_POST['update'])&&isset($_SESSION['id']))
{
  $uname=$_POST['user_name'];
    $first_name=formate_text($_POST['first_name']);
     $last_name=formate_text($_POST['last_name']);
     $date_of_birth=$_POST['date_of_birth'];
      $gurdian_name=formate_text($_POST['gurdian_name']);
     $gurdian_email=formate_text($_POST['gurdian_email']);
      $password=md5($_POST['password']);
      $cpassword=md5($_POST['cpassword']);
      $id=$_SESSION['id'];
      if(!empty($password)&&!empty($cpassword))
        {
   
          if($password!=$cpassword)
          {
            $regerr="Password does not match";
          }
        else
        {
          $ss="select *from students where username='$username' limit 1;";
          $dup=mysqli_query($conn, $ss);
          $user=mysqli_fetch_assoc($dup);
          if(mysqli_num_rows($dup)==1)
          {
                   echo "This username has already been taken. Try another";
          }
          else
          {

            $up="UPDATE `students` SET `username`='$uname', `first_name`='$first_name',`last_name`='$last_name',`date_of_birth`='$date_of_birth',`gurdian_name`='$gurdian_name',`gurdian_email`='$gurdian_email', `password`='$password' WHERE  roll='$id';";
            $run=mysqli_query($conn,$up);
            if($run)
            {
              session_destroy();
              $logerr="Login Again";
              header('location:login.php');
            }
            else
            {
              echo "Error in updating information. Please try again $id $first_name $last_name $date_of_birth $gurdian_email $gurdian_name $password";
            }
          }
        }
}

}