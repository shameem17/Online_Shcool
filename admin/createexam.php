



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
   </style>
	<title>Create Exam|Admin</title>
</head>
<body>
    <button style="padding:10px 10px; color:white; background: blue;"><a href="adminpanel.php" style="text-decoration:none; color: white;">Home</a></button>
	<center><h1>Set Your Exam</h1></center>
	<center>
  <form  method="post"  action="admin.php" >
  	<label for="examid">Exam Id: </label>
   <input type="text" id="examid" name="examid" required>&nbsp; &nbsp; &nbsp;
   <label for="examname">Subject: </label>
   <input type="text" id="examname" name="examname" required>&nbsp; &nbsp; &nbsp;
   <label for="class">Class: </label>
   <select name="class" id="class">
  <option value="1">Class 1</option>
  <option value="2">Class 2</option>
  <option value="3">Class 3</option>
  <option value="4">Class 4</option>
  <option value="5">Class 5</option>
</select>&nbsp; &nbsp; &nbsp;
   <label for="dd">Date: </label>
   <input type="date" id="dd" name="dd"  required>&nbsp; &nbsp; &nbsp;
   <label for="starth">Start At(24H): </label>
   <input type="number" id="starth" name="starth" min="0" max="24" required>&nbsp; &nbsp; &nbsp;
   <label for="startm">Start Min: </label>
   <input type="number" id="startm" name="startm" min="0" max="60" required><br><br>

   <label for="endh">End At(24H): </label>
   <input type="number" id="endh" name="endh"  min="0" max="24" required>&nbsp; &nbsp; &nbsp;
   
   <label for="endm">End Min: </label>
   <input type="number" id="endm" name="endm" min="0" max="60" required>&nbsp; &nbsp; &nbsp;
   <label for="du">Duration: </label>
    <input type="number" id="du" name="du" min="0" max="60" required>&nbsp; &nbsp; &nbsp;
     <label for="num">Number Of Questions: </label>
   <input type="number" id="num" name="num" min="1"  required>
   <br><br>
  <input type="submit" name="set_exam" value="Submit" style="padding:8px 8px; background: blue; color:white;">
</form>
</center>
</body>
</html>