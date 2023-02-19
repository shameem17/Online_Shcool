<?php include('../config.php'); ?>

<?php


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		body{
			background: #0df18f;
		}
		table{
			border-collapse: collapse;
		}
		td{
			text-align: center;
			padding: 10px 10px;
		}
		img{
			width: 300px;
			height: 350px;
			
		}
	</style>
	<title>Info</title>
</head>
<body>
<center><h1>Students Information</h1></center>
<?php 
$roll=$_GET['id'];
$sql="select *from students where roll='$roll' limit 1;";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$email=$class=$gurdian_name=$gurdian_email=$date_of_birth=$monthly_fee=$payment_status=$first_name=$last_name="";

$email=$row['email'];
$class=$row['class'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$gurdian_name=$row['gurdian_name'];
$gurdian_email=$row['gurdian_email'];
$date_of_birth=$row['date_of_birth'];




?>
<br><br><br>
<center>
<table border="1">
	<tr>
		<td colspan="2" rowspan="2">
			 <?php  
        $sql = "SELECT * FROM images where roll='$roll' limit 1;";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {  ?>
             
            
              <img src="../uploads/<?=$images['image_url'] ?>">
              
    <?php } }?>
		</td>
		<td>Student Id: <?php echo $roll;?></td>
		<td>Class: <?php echo $class;?></td>
	</tr>
	<tr>
		<td>First Name:<?php echo $first_name;?></td>
		<td>Last Name:<?php echo $last_name;?></td>
		
	</tr>
	
	<tr>
		<td>Email:<?php echo $email;?></td>
		<td>Gurdian Name:<?php echo $gurdian_name;?></td>
		<td>Gurdian_email: <?php echo $gurdian_email;?></td>
		<td>Date Of Birth: <?php echo $date_of_birth;?></td>
	</tr>
</table>
</center>
</body>
</html>

