<?php include_once('config.php'); ?>
<?php
session_start();

function formate_text($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $name=$password="";
   $logerr="";

   if (isset($_POST['loginbtn2'])) {

     $name = formate_text($_POST['name']);
     $password = md5($_POST['password']);
     if(!empty($name)&&!empty($password)){
          $sql = "select * from user where name = '$name' and password='$password' limit 1;";
          $result = mysqli_query($conn,$sql);
          if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
             $_SESSION['username'] = $row['fname'];
             $_SESSION['success'] ="You are now logged in";
             unset($_SESSION['msg']);
              
            header('location: dashboard.php');

          }
          else{
            $logerr="Wrong password or username";
          }


     }

   }

   //registration 

   if (isset($_POST['regbtn']) ) {
    unset($_SESSION['username']);
    $regerr="";
     $first_name=$last_name=$date_of_birth=$class=$email=$gurdian_name=$gurdian_email=$password=$cpassword="";
     $gender="";
     $first_name=formate_text($_POST['first_name']);
     $last_name=formate_text($_POST['last_name']);
     $date_of_birth=$_POST['date_of_birth'];
     $class=formate_text($_POST['class']);
     $gurdian_name=formate_text($_POST['gurdian_name']);
     $gurdian_email=formate_text($_POST['gurdian_email']);
     $email=formate_text($_POST['email']);
     $password=md5($_POST['password']);
     $gender=formate_text($_POST['gender']);
     $cpassword=md5($_POST['cpassword']);
     $roll=$addfee=$monthly_fee=$payment_status="";
     $new_img_name="";
     $flag=0;
     $sql="select max(roll) from students where class='$class';";
     $res=mysqli_query($conn, $sql);
     $r=mysqli_fetch_assoc($res);


     if($r['max(roll)']=='0')
     {
       if ($class=='1') {
         // code...
          $roll='2201001';
       }
       else if($class=='2')
       {
         $roll='2202001';
       }
       else if($class=='3')
       {
         $roll='2203001';
       }
       else if($class=='4')
       {
         $roll='2204001';
       }
       else if($class=='5')
       {
         $roll='2205001';
       }
     }
     else
      { 
        $row1=mysqli_fetch_assoc($res);
         $roll = $row1['max(roll)'];
         $roll = $roll + '1';
      }


      //picture upload 
      if (isset($_FILES['profile_picture'])) 
      {
       
         $img_name = $_FILES['profile_picture']['name'];
        $img_size = $_FILES['profile_picture']['size'];
        $tmp_name = $_FILES['profile_picture']['tmp_name'];
        $error = $_FILES['profile_picture']['error'];
        if ($error === 0) {
    if ($img_size > 125000) {
      $em = "Sorry, your file is too large.";
      $flag=0;
        // header("Location: registration.php?error=$em");
      $regerr=$em;
    }

    else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png"); 

      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = 'uploads/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        // // Insert into Database
        // $sql = "INSERT INTO images(image_url) 
        //         VALUES('$new_img_name')";
        // mysqli_query($conn, $sql);
        // header("Location: view.php");
        $flag=1;
      }
      else {
        $em = "You can't upload files of this type";
        $flag=0;
            // header("Location: registration.php?error=$em");
        $regerr=$em;
      }
    }
  }
  else {
    $em = "unknown error occurred!";
    $flag=0;
    // header("Location: registration.php?error=$em");
    $regerr="Image unknown error";
  }

    }
else {
  $regerr="File Not selected";
}

  if(!empty($password)&&!empty($cpassword)&&$flag)
  {
    if($password!=$cpassword)
    {
      $regerr="Password does not match";
    }
    else
    {
       $user_check = "SELECT * FROM students WHERE email ='$email' LIMIT 1;";
             $result = mysqli_query($conn,$user_check );
            $u = mysqli_fetch_assoc($result);
            if($u)
            {
              if($u['email']==$email)
              {
              $regerr="This email has already been taken. Try another";
              }

            }
            else
            {
               //create user
              // $new="insert into students(first_name,last_name,date_of_birth,class,roll,gender,email,gurdian_name,gurdian_email,addfee,monthly_fee,payment_status,password,profile_picture) values ('$first_name','$last_name','$date_of_birth','$class','$roll','$gender','$email','$gurdian_name','$gurdian_email','$addfee','$monthly_fee','$payment_status','$password','$new_img_name'); ";
              // $done=mysqli_query($conn, $new);
             
             
            }
       }
     }

   }

 if(!empty($first_name)&&!empty($email)&&!empty($password)&&$flag)
     {
         if ($password!=$cpassword) {
           // password don't match
          $regerr="Password does not match";
         }
         else{
          $user_check = "SELECT * FROM students WHERE email ='$email' LIMIT 1;";
             $result = mysqli_query($conn,$user_check );
            $u = mysqli_fetch_assoc($result);
         if($u)
         {
             if($u['email']==$email)
            {
              $regerr="This email has already been taken. Try another";
            }
             
         }
          else
          {
            //create user
            $new="insert into students(first_name,last_name,date_of_birth,class,roll,gender,email,gurdian_name,gurdian_email,addfee,monthly_fee,payment_status,password,profile_picture) values('$first_name','$last_name','$date_of_birth','$class','$roll','$gender','$email','$gurdian_name','$gurdian_email','$addfee','$monthly_fee','$payment_status',  '$password','$new_img_name');";
            $done=mysqli_query($conn,$new);
             $_SESSION['username'] = $first_name;
             $_SESSION['success'] ="You are now logged in";
             unset($_SESSION['msg']);
            header('location: home.php');
          }

         }
     }


}



   //delete
  if(isset($_POST['reset'])){
    $reserr="";
    $fname=$email=$password=$cpassword=$uname="";
     $fname=formate_text($_POST['fname']);
    
     $email=formate_text($_POST['email']);
     $password=md5($_POST['password']);
     $uname=formate_text($_POST['name']);
     $cpassword=md5($_POST['cpassword']);
     if ($password!=$cpassword) {
           // password don't match
          $reserr="Password does not match";
         }
         else{
       $sql = "select * from user where name = '$uname' and email='$email' limit 1;";
       $result = mysqli_query($conn,$sql);
       if(mysqli_num_rows($result)==1){
        $sq="update user set password='$password' where name='$uname' and email='$email';";
        $done=mysqli_query($conn,$sq);
        if($done)
        {
          header('location: login.php');
        }
        else
          { 
            $reserr="Something Went Wrong";
          }
        

       }
       else
       {
        $reserr="User not found";
       }
     }

  }
   

   

}

?>