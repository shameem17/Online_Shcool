<?php include('server.php');?>
<?php include('config.php'); ?>

<?php 

if (isset($_POST['submit']) && isset($_FILES['profile_picture'])) {
	include "config.php";

	echo "<pre>";
	print_r($_FILES['profile_picture']);
	echo "</pre>";

	$img_name = $_FILES['profile_picture']['name'];
	$img_size = $_FILES['profile_picture']['size'];
	$tmp_name = $_FILES['profile_picture']['tmp_name'];
	$error = $_FILES['profile_picture']['error'];

	if ($error === 0) {
		if ($img_size > 25000000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
					$roll=$_SESSION['id'];
				$sql = "INSERT INTO images(roll,image_url) 
				        VALUES('$roll','$new_img_name')";
				mysqli_query($conn, $sql);
				header("Location: dashboard.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: secondreg.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: secondreg.php?error=$em");
	}

}else {
	header("Location: secondreg.php");
}