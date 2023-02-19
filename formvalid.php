
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="test2";
$flag = 0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

}
echo "Connected successfully";
$flag=1;
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Validation</title>
	<style>
		.error{
			color: red;
		}
	</style>
</head>
<body>
	<?php 
    $name=$age=$email=$gender="";
    $nameerr=$ageerr=$emailerr="";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	// code...
    	  $name = formate_text( $_POST['name']);
    $email = formate_text( $_POST['email']);
    $age = formate_text( $_POST['age']);
    $gender = formate_text( $_POST['gender']);
    if(empty($name))
    {
    	$nameerr="Name Required";
    }
    if(empty($age))
    {
    	$ageerr="Age Required";
    }
    if(empty($email))
    {
    	$emailerr="Email Required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailerr = "Invalid email format";
}
if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
  $nameerr = "Only letters and white space allowed";
}

    }

  function formate_text($data){
  	$data = trim($data);
  	$data = stripcslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;

  }

	?>
	<p style="color: red;">* Required Field</p><br><br>

	<form method="post" action= <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> >
		Name: <input type="text" name="name">
		<span class="error">* <?php echo $nameerr; ?> </span>
		<br> <br>
		Email: <input type="text" name="email">
		<span class="error">* <?php echo $emailerr; ?> </span>
		<br> <br>

		Age: <input type="text" name="age">
		<span class="error">* <?php echo $ageerr; ?> </span>
		<br> <br>
		Gender:
		<input type="radio" name="gender" value="male" checked="checked">Male<br> <br>
		<input type="radio" name="gender" value="female">Female<br> <br>
		<input type="radio" name="gender" value="others">Others<br> <br>
		<input type="submit" name="btn"><br> <br>
	</form>

	<?php 
	if($nameerr==""&&$ageerr==""&&$emailerr=="")
	{
		if($flag)
		{
              $sql = "insert into user(name,email,age,gender) values('$name','$email','$age','$gender');";
              if ($conn->query($sql) === TRUE) {
                   echo "Sign Up successfully";
                  }
                 else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
        }
		}
	echo "<h1>Your Data</h1><br>";
     echo "Name=" . $name . "<br>";
     echo "Age=" . $age . "<br>";
     echo "Email=" . $email . "<br>";
     echo "Gender=" . $gender . "<br>";
 }
	?>

</body>
</html>