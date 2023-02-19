
<?php 


if(!isset($_GET['setq']))
{
	header('location:createexam.php');
}
unset($_GET['addq1']);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Set Questions</title>
</head>
<body>

<center><a href="tem.php?addq1='1'" style="padding: 8px 20px; background: blue; text-decoration: none; color: white; margin-top: 50%; left: 50% ;">Add Question</a><br>

<h1>Exam Id: <?php echo $_COOKIE['tb']; ?></h1>

</center>

</body>
</html>