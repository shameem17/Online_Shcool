 <?php  


if(!isset($_GET['addq1']))
{
   header('location:setquestion.php?setq=1');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Questions</title>
</head>
<body>
 
<center>
		<form  method="post"  action="addq.php" >
			<label for="qn">Quesiton No: </label>
			<input type="number" id="qn" name="qn" required>&nbsp; &nbsp; &nbsp;
         <label for="question">Quesiton: </label>
          <textarea rows="2" cols="15" placeholder="Write the question here" name="question" required></textarea><br><br>
          <label for="opa">Option A: </label>
          <textarea rows="2" cols="15" placeholder="Option A" name="opa" required></textarea>
          <label for="opb">Option B: </label>
          <textarea rows="2" cols="15" placeholder="Option B" name="opb" required></textarea>
          <label for="opc">Option C: </label>
          <textarea rows="2" cols="15" placeholder="Option C" name="opc" required></textarea>
          <label for="opd">Option D: </label>
          <textarea rows="2" cols="15" placeholder="Option D" name="opd" required></textarea>
           <label for="answer">Option A: </label>
               <input type="radio" name="answer" value="A" checked="checked">A &nbsp; &nbsp;
               <input type="radio" name="answer" value="B" >B &nbsp; &nbsp;
               <input type="radio" name="answer" value="C" >C &nbsp; &nbsp;
               <input type="radio" name="answer" value="D" >D &nbsp; &nbsp;
                 <input type="submit" name="add_question" value="Add Question"><br>
                 <label>Exam Id: <?php echo $_COOKIE['tb']; ?></label>
	</form>
</center>

</body>
</html>