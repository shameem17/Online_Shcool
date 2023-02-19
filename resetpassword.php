<?php include('server.php');?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="regstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

   <div class="container">

   	<div class="img">
   		<img src="img/forget.svg">
   		
   	</div>
   	<div class="login-container">
   		<form  method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> >
   			<h2>Reset Password</h2>
   			<center><p>You need to provide other information correctly</p></center>
   			<div class="input-div one">
   				<div class="i">
   					<i class="fas fa-user"></i>
   				</div>
   				<div>
   					<h5>Full Name</h5>
   					<input class="input" type="text" name="fname" required>
   				</div>

   			</div>
             
   			<div class="input-div">
   				<div class="i">
   					<i class="fa fa-envelope"></i>
   				</div>
   				<div>
   					<h5>Email</h5>
   					<input class="input" type="email" name="email" required>
   				</div>
   				
   			</div>
   			
   			<div class="input-div">
   				<div class="i">
   					<i class="fas fa-user-circle"></i>
   				</div>
   				<div>
   					<h5>Username</h5>
   					<input class="input" type="text" name="name" required>
   				</div>
   				
   			</div>
   			<div class="input-div">
   				<div class="i">
   					<i class="fas fa-lock"></i>
   				</div>
   				<div>
   					<h5>Password (new)</h5>
   					<input class="input" type="password" name="password" required>
   				</div>
   				
   			</div>
   			<div class="input-div two">
   				<div class="i">
   					<i class="fas fa-lock"></i>
   				</div>
   				<div>
   					<h5>Confirm Password</h5>
   					<input class="input" type="password" name="cpassword" required>
   				</div>
   				
   			</div>
   			<span class="error">
   			<?php if (isset($_POST['reset'])) {
   				// code...
   				echo "<center><p>$reserr</p></center><br>";

   			}

   			?>
   		</span>
   			<input type="submit" class="button" name="reset" value="Reset Password">
   			<p class="reg">Don't Have Account? <a href="registration.php">Register</a></p><br>

   		</form>
   		
   	</div>
   </div>


   <script type="text/javascript" src="main.js"></script>
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
<?php 

?>

</body>
</html>