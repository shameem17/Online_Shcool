<?php include('server.php');?>
<?php include('config.php');?>
<?php
 if (isset($_SESSION['username'])) {
  	header('location: dashboard.php'); 
  }
  //session_destroy();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<center><h1 class="headline">THE SCHOOL</h1></center>
   <div class="container">

   	<div class="img">
   		<img src="img/bg.svg">
   		
   	</div>
   	<div class="login-container">
   		<form  method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> >
   			<img class="avater" src="img/av.svg">
   			<h2>Welcome</h2>
   			<div class="input-div one">
   				<div class="i">
   					<i class="fas fa-user"></i>
   				</div>
   				<div>
   					<h5>Student Id</h5>
   					<input class="input" type="text" name="student_id" required>
   				</div>
   			</div>
             <div class="input-div two">
   				<div class="i">
   					<i class="fas fa-lock"></i>
   				</div>
   				<div>
   					<h5>Password</h5>
   					<input class="input" type="password" name="password" required>
   				</div>
   				
   			</div>
   			
   			<a class="resetpassword" href="resetpassword.php">Forget Password?</a>
   			<input type="submit" class="button" name="loginbtn" value="Login">
   			<p class="register">New Student? <a href="registration.php">Register</a></p>
   			<span class="error">
   			<?php
   			 if (isset($_POST['loginbtn'])) {
   				// code...
   				echo "<center><p>$logerr</p></center><br>";
   			}
   			if (isset($_SESSION['msg'])) {
   				$mg=$_SESSION['msg'];
   				echo "<center><p>$mg</p></center><br>";
   			}

   			?>
   		</span>

   		</form>
   		
   		
   	</div>
   </div>


   <script type="text/javascript" src="main.js"></script>
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
<?php 

?>

</body>
</html>