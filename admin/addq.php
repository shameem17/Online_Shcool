<?php include_once('../config.php'); ?>

<?php


$tab=$_COOKIE['tb'];

$qn=$_POST['qn'];
$qs=$_POST['question'];
$opa=$_POST['opa'];
$opb=$_POST['opb'];
$opc=$_POST['opc'];
$opd=$_POST['opd'];
$ans=$_POST['answer'];


$sql="INSERT INTO $tab(`question_no`, `question`, `opa`, `opb`, `opc`, `opd`, `ans`) VALUES ('$qn','$qs','$opa','$opb','$opc','$opd','$ans');";
$res=mysqli_query($conn,$sql);
$sq="select count(question) from $tab;";
$rr=mysqli_query($conn,$sq);
$row=mysqli_fetch_assoc($rr);
$cnt=$row['count(question)'];
// setcookie('cnt',$cnt,time()+3600*2);
if($cnt>=$_COOKIE['num'])
{
	unset($_GET['set_exam']);
	session_destroy();
	setcookie('tb',$tab,time()-3600*2);
	setcookie('num',$tab,time()-3600*2);
	header('location:createexam.php');
}
else
{
	header('location:setquestion.php?setq=1');
}



?>
