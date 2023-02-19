<?php include('server.php');?>
<?php include('config.php'); ?>

<?php 
$username=$_SESSION['username'];
$roll =$_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Upload Using PHP</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
		p{
           font-family: 'Lato', sans-serif;
           font-size: 20px;
		}
	</style>
</head>
<body>
	<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
	<?php 
     echo "<p>$username Please Upload Your Photo(Maximum size 25KB).<br>Your roll/id is $roll<br>"
	?>
	
     <form action="uploadphoto.php"
           method="post"
           enctype="multipart/form-data">
           <input type="file" 
                  name="profile_picture">

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
</body>
</html>
