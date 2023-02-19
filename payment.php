<?php include('initialize.php');?>
<?php
 if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
$username=$_SESSION['username'];
$ok='0';
$total_count=0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add todo</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        body{
            text-align: center;
        }
        body h2{
            text-align: center;
            color: #0df18f;
            font-size: 30px;
        }
        form{
            margin-top: 60px;
            font-size: 20px;
        }
        #button{
            background: #0df18f;
            padding: 10px 10px;
            border: 1px solid #0df18f;
            border-radius: 10px;
            color: #f9f9f9;
            font-weight: 400;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
        <div class="login-container">
        <form  method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> >
            <h2>Add Your ToDo</h2>
            
            <div class="text-area">
                <textarea rows="10" cols="40"placeholder="Add your Text" name="text" required></textarea>
                
            </div>
            <br>
            <div class="deadline">
             <p>Deadline: <input type="date" name="time"  placeholder="dd/mm/yyyy" value=""min="1997/01/01" max="2050/12/31"required></p>   
            </div>
            <br>

            <br>
            <div class="completed">
                Completed?:<br>
               <input type="radio" name="done" value="Completed" >Completed<br>
               <input type="radio" name="done" value="Not-Completed" checked="checked">Not-Completed<br>
            </div>
            <br><br>
            <input  type="submit" name="addbtn" value="Add" id="button">
            

        </form>
        <a href="addtodo.php?back='1'" id="button" style="text-decoration: none;">Back</a>
        
        <?php  
           if(isset($_POST['addbtn']))
           {
            $txt=$_POST['text'];
            $dd=$_POST['time'];
            $sql = "SELECT max(id) FROM todo;";
            $result = mysqli_query($conn,$sql);
            $row1=mysqli_fetch_assoc($result);
            $total_count=$row1['max(id)'];
            $total_count=$total_count+1;
            $msg=$_POST['done'];
            if($msg=="Completed")
            {
                $ok='1';
            }
            else
            {
                $ok='0';
            }
            // $ok='0';
            // if(isset($done) && $done=="completed")
            // {
            //       $ok='1';
            // }
            $ss="insert into todo(id,username,class,roll,work,done,dt) values('$total_count','$username','$class','$roll','$txt','$ok','$dd')";
            $result=mysqli_query($conn,$ss);

           }
           echo "<br><br><p style=\"font-size:20px;\">$ok</p><br>";
          echo"<p>Added Successfully</p>";
           if(isset($_GET['back']))
           {
              header('location:dashboard.php');
           }

        ?>
    </div>
    

</body>
</html>