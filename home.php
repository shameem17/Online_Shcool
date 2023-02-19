<?php include('server.php');?>
<?php

 $username="";

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header('location: login.php');

  }
  if (isset($_GET['feedback'])) {
  	// code...
  	header('location: feedback.php');
  }
  if (isset($_GET['delete'])) {
     // code...
    if(isset($_SESSION['username']))
    {
      $nm=$_SESSION['username'];
     $query = $conn->prepare("DELETE FROM user WHERE fname='$nm'");
    $query->execute();
    session_destroy();
    header('location: login.php');
    }
   }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="homestyle.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
	
</head>
<body>
	<header>
	<nav>
      <div class="logo">The School</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a class="active" href="#"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="home.php?about='1'" name="about"><i class="fas fa-university"></i> About</a></li>
        <li><a href="home.php?courses='1'" name="courses"><i class="fas fa-clipboard-list"></i> Courses</a></li>
        <li><a href="home.php?teachers='1'" name="teachers"><i class="fas fa-chalkboard-teacher"></i> Teachers</a></li>
        <li><a href="home.php?feedback='1'" name="feedback"><i class="fas fa-comment"></i> Feedback</a></li>
        <hr class="line">
        <li class="user"><a href="#"><i class="fas fa-user-circle"></i> <?php echo $_SESSION['username'];?></a></li>
      </ul>
    </nav>

 </header>
 <div class="container">
    	<div class="photo">
    		<img src="img/school.svg">
    	</div>
    	<div class="info-container">
    		<h3>This is about</h3>
    	</div>	
    </div>
 <div class="info">
<center><h1>Welcome</h1></center>
<div>

    <center><h2>Landing Page</h2></center>
   </div>
  
    
     <div class="info2">
       <?php if (isset($_SESSION['succcess'])) :?> 
       	  
       	  <div class="error success">
          <h3>
     <?php  
    echo $_SESSION['success'];
    unset($_SESSION['success']);

      ?>
          </h3>
       	  </div>
       <?php endif ?>

       <?php if (isset($_SESSION['username'])) :?>
        <p> Welcome! <strong><?php echo $_SESSION['username'];?></strong></p>
        <p><a href="home.php?logout='1'" style="color:red" name="logout">Logout</a></p>
        <p><a href="home.php?delete='1'" style="color:red" name="delete">Delete Account</a></p>
    <?php endif ?>
     </div>
    </div>
<script type="text/javascript" src="app.js"></script>
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</body>
</html>