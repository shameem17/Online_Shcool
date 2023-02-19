<?php include('server.php');?>
<?php include('config.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="regstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

   <div class="container">

   	<div class="img">
   		<img src="img/reg.svg">

   		
   	</div>
   	<div class="login-container">
   		<form  method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> >
   			<img class="avater" src="img/av.svg">
   			<h2>Create account|Student Information</h2>
   			<div class="input-div one">
   				<div class="i">
   					<i class="fas fa-user"></i>
   				</div>
   				<div>
   					<h5>First Name</h5>
   					<input class="input" type="text" name="first_name" required>
   				</div>

   			</div>
             
   			<div class="input-div">
   				<div class="i">
   					<i class="fas fa-user"></i>
   				</div>
   				<div>
   					<h5>Last Name</h5>
   					<input class="input" type="text" name="last_name" required>
   				</div>
   				
   			</div>
   			<div class="input-div">
   				<div class="i">
   					<i class="fa fa-user-circle-o" aria-hidden="true"></i>
   				</div>
   				<div>
   					<h5>Username(unique)</h5>
   					<input class="input" type="text" name="username" required>
   				</div>
   				
   			</div>
   			<div class="input-div">
   				<div class="i">
   					<i class="fa fa-calendar" aria-hidden="true"></i>
   				</div>
   				<div>
   					<h5>Date Of Birth (DD/MM/YY)</h5>
   					<input class="input" type="date" name="date_of_birth" placeholder="" required>
   				</div>
   				
   			</div>
   			<div class="input-div">
   				<div class="i">
   					<i class="fa fa-user"></i>
   				</div>
   				<div>
   					<h5>Gender</h5>
   					<input class="input" type="text" name="gender" required>
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
   					<i class="fa fa-user"></i>
   				</div>
   				<div>
   					<h5>Class</h5>
   					<input class="input" type="number" name="class" min="1" max="5" required>
   				</div>
   				
   			</div>
   			<div class="input-div">
   				<div class="i">
   					<i class="fa fa-user"></i>
   				</div>
   				<div>
   					<h5>Gurdian's Name</h5>
   					<input class="input" type="text" name="gurdian_name" required>
   				</div>
   				
   			</div>

   			<div class="input-div">
   				<div class="i">
   					<i class="fa fa-envelope"></i>
   				</div>
   				<div>
   					<h5>Gurdian's Email</h5>
   					<input class="input" type="text" name="gurdian_email" required>
   				</div>
   				
   			</div>
   			
   			<div class="input-div">
   				<div class="i">
   					<i class="fas fa-lock"></i>
   				</div>
   				<div>
   					<h5>Password</h5>
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
   			<?php if (isset($_POST['regbtn'])) {
   				// code...
   				echo "<center><p>$regerr</p></center><br>";
              // echo "$roll $first_name $last_name $gurdian_name<br> $gurdian_email $email $class<br>";
              // echo "$_SESSION['username']";
   			}

   			?>
   		</span>
   			<input type="submit" class="button" name="regbtn" value="Register">
   			<p class="reg">Already Have Account? <a href="login.php">Login</a></p><br>

   		</form>
   		
   	</div>
   </div>


   <script type="text/javascript" src="main.js"></script>
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
<?php 

?>

</body>
</html>