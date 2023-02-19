<?php include_once('../config.php'); ?>

<?php 


if (isset($_POST['set_exam'])) {
	session_start();
	$tab=$_POST['examid'];
	$_SESSION['tb']=$tab; 
	setcookie('tb',$tab,time()+3600*2);
	$examname=$_POST['examname'];
	$dx=$_POST['dd'];
	$cl=$_POST['class'];
	$num=$_POST['num'];
	$_SESSION['num']=$num;
	setcookie('num',$num,time()+3600*2);
	$sh=$_POST['starth'];
	$sm=$_POST['startm'];
	$eh=$_POST['endh'];
	$em=$_POST['endm'];
	$du=$_POST['du'];

	$sql="INSERT INTO examschedule (`exam_id`, `class`, `schedule`, `start_h`, `end_h`, `exam_name`, `start_m`, `end_m`, `duration`) VALUES ('$tab','$cl','$dx','$sh','$eh','$examname','$sm','$em','$du');";
	$res=mysqli_query($conn,$sql);
	if(!$res){
        echo "Exam Not Set";
        header('location:createexam.php');
	}
	else
	{
		$sql="create table $tab( question_no varchar(20),question varchar(300),opa varchar(300), opb varchar(300), opc varchar(300), opd varchar(300), ans varchar(10));";
		$res=mysqli_query($conn,$sql);
		if($res)
		{
			echo "Successful ";
			header('location:setquestion.php?setq=1');
			// while($num)
			// {
			// 	$num=$num-1;
			// 	header('location:tem.php');
			// }
		// echo $_SESSION['tb'];
	}
		else
		{
			echo "Error";
		}
		

	}
	// unset($_POST['set_exam']);

}



?>
