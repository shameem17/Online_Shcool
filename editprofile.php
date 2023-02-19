<?php include('initialize.php') ?>

<?php
 if(!isset($_SESSION['id']))
 {
 	header('location:login.php');
 }

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Your Profile</title>
  <style type="text/css">
    body{
      background: #0df18f;
    }
    .button{
      padding: 13px 28px;
      background: blue;
      color: white;
      border: 1px solid blue;
      border-radius: 20px;
      font-size: 22px;
    }
    input{
      align-items: center;
    }
  </style>
</head>
<body>
	<center><h1>Update Your Data</h1></center>
	<center>
  <form  method="post"  action="server.php" >
    <label for="user_name">Username: </label>
   <input type="text" id="user_name" name="user_name" value="<?php echo $username; ?>" required>&nbsp; &nbsp; &nbsp;
  	<label for="first_name">First Name: </label>
   <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>&nbsp; &nbsp; &nbsp;
   <label for="last_name">Last Name: </label>
   <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required><br><br>

   <label for="date_of_birth">Date Of Birth: </label>
   <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth; ?>" required>&nbsp; &nbsp; &nbsp;
  <label for="gurdian_name">Gurdian Name: </label>
   <input type="text" id="gurdian_name" name="gurdian_name" value="<?php echo $gurdian_name; ?>" required><br><br>

   <label for="gurdian_email">Gurdian Email: </label>
   <input type="email" id="gurdian_email" name="gurdian_email" value="<?php echo $gurdian_email; ?>" required>&nbsp; &nbsp; &nbsp;
   <label for="password">Password: </label>
   <input type="password" id="password" name="password" required>&nbsp; &nbsp; &nbsp;
  <label for="cpassword">Confirm Password: </label>
   <input type="password" id="cpassword" name="cpassword" required>&nbsp; &nbsp; &nbsp;
   <br><br>
  <input type="submit" name="update" value="Update" class="button">
</form>
</center>
<<!-- script type="text/javascript">
  

function conform() {
  var txt;
  if (confirm("Are You Sure To Update?")) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  // document.getElementById("demo").innerHTML = txt;
}
</script> -->
</body>
</html>