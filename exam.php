<?php include('initialize.php'); ?>

<?php


 $sql="select * from results where roll='$roll';";
 $result=mysqli_query($conn,$sql);
 if($result->num_rows >0)
 {
    while($row = $result->fetch_assoc()) 
    {
      $sub=$row['subject'];
      if($sub=="Bangla")
      {
        $mb=$mb+1;
      }
      else if($sub=="English")
      {
        $me=$me+1;
      }
      else if($sub=="Math")
      {
        $mm=$mm+1;
      }
      else if($sub=="Science")
      {
        $ms=$ms+1;
      }
      else if($sub=="History")
      {
        $mh=$mh+1;
      }
      else if($sub=="Religion")
      {
        $mr=$mr+1;
      }
    }
 }


 ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- My CSS -->
	<!-- <link rel="stylesheet" href="dashboardstyle.css"> -->

	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

a {
  text-decoration: none;
}

li {
  list-style: none;
}

:root {
  --poppins: 'Poppins', sans-serif;
  --lato: 'Lato', sans-serif;

  /*--light: #F9F9F9;*/
  --light: #0DF18F;
  --blue: #3C91E6;
  --light-blue: #CFE8FF;
  --grey: #eee;
  --dark-grey: #AAAAAA;
  --dark: #342E37;
  --red: #DB504A;
  --yellow: #FFCE26;
  --light-yellow: #FFF2C6;
  --orange: #FD7238;
  --light-orange: #FFE0D3;
  --custom:  #0DF18F;
}

html {
  overflow-x: hidden;
}

body.dark {
  --custom:  #0C0C1E;
  --light: #0C0C1E;
  --grey: #060714;
  --dark: #FBFBFB;
}

body {
  background: var(--grey);
  overflow-x: hidden;
}





/* SIDEBAR */
#sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 280px;
  height: 100%;
  /*background: var(--light);*/
  background: var(--custom);
  z-index: 2000;
  font-family: var(--lato);
  transition: .3s ease;
  overflow-x: hidden;
  scrollbar-width: none;
}
#sidebar::--webkit-scrollbar {
  display: none;
}
#sidebar.hide {
  width: 60px;
}
#sidebar .brand {
  font-size: 24px;
  font-weight: 700;
  height: 56px;
  display: flex;
  align-items: center;
 /*color: var(--blue);*/
  color: #F9F9F9;
  position: sticky;
  top: 0;
  left: 0;
 /* background: var(--light);*/
 background: var(--custom);
  z-index: 500;
  padding-bottom: 20px;
  box-sizing: content-box;
}
#sidebar .brand .fa {
  min-width: 60px;
  display: flex;
  justify-content: center;
}
#sidebar .side-menu {
  width: 100%;
  margin-top: 48px;
}
#sidebar .side-menu li {
  height: 48px;
  background: transparent;
  margin-left: 6px;
  border-radius: 48px 0 0 48px;
  padding: 4px;
}
#sidebar .side-menu li.active {
  background: var(--grey);
  position: relative;
}
#sidebar .side-menu li.active::before {
  content: '';
  position: absolute;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  top: -40px;
  right: 0;
  box-shadow: 20px 20px 0 var(--grey);
  z-index: -1;
}
#sidebar .side-menu li.active::after {
  content: '';
  position: absolute;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  bottom: -40px;
  right: 0;
  box-shadow: 20px -20px 0 var(--grey);
  z-index: -1;
}
#sidebar .side-menu li a {
  width: 100%;
  height: 100%;
 /* background: var(--light);*/
 background: var(--custom);
  display: flex;
  align-items: center;
  border-radius: 48px;
  font-size: 16px;
  color: var(--dark);
  white-space: nowrap;
  overflow-x: hidden;
}
#sidebar .side-menu.top li.active a {
  color: var(--blue);
}
#sidebar.hide .side-menu li a {
  width: calc(48px - (4px * 2));
  transition: width .3s ease;
}
#sidebar .side-menu li a.logout {
  color: var(--red);
}
#sidebar .side-menu.top li a:hover {
  color: var(--blue);
}
#sidebar .side-menu li a .bx {
  min-width: calc(60px  - ((4px + 6px) * 2));
  display: flex;
  justify-content: center;
}
#sidebar .copyright{
  position: absolute;
  bottom: 2px;
}
#sidebar p{
  text-align: center;
  color: white;
}
/* SIDEBAR */





/* CONTENT */
#content {
  position: relative;
  width: calc(100% - 280px);
  left: 280px;
  transition: .3s ease;
}
#sidebar.hide ~ #content {
  width: calc(100% - 60px);
  left: 60px;
}




/* NAVBAR */
#content nav {
  height: 56px;
  /*background: var(--light);*/
  background: var(--custom);
  padding: 0 24px;
  display: flex;
  align-items: center;
  grid-gap: 24px;
  font-family: var(--lato);
  position: sticky;
  top: 0;
  left: 0;
  z-index: 1000;
}
#content nav::before {
  content: '';
  position: absolute;
  width: 40px;
  height: 40px;
  bottom: -40px;
  left: 0;
  border-radius: 50%;
  box-shadow: -20px -20px 0 var(--light);
}
#content nav a {
  color: var(--dark);
}
#content nav .bx.bx-menu {
  cursor: pointer;
  color: var(--dark);
}
#content nav .nav-link {
  font-size: 16px;
  transition: .3s ease;
}
#content nav .nav-link:hover {
  color: var(--blue);
}
#content nav form {
  max-width: 400px;
  width: 100%;
  margin-right: auto;
}
#content nav form .form-input {
  display: flex;
  align-items: center;
  height: 36px;
}
#content nav form .form-input input {
  flex-grow: 1;
  padding: 0 16px;
  height: 100%;
  border: none;
  background: var(--grey);
  border-radius: 36px 0 0 36px;
  outline: none;
  width: 100%;
  color: var(--dark);
}
#content nav form .form-input button {
  width: 36px;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background: var(--blue);
  color: var(--light);
  font-size: 18px;
  border: none;
  outline: none;
  border-radius: 0 36px 36px 0;
  cursor: pointer;
}
#content nav .notification {
  font-size: 20px;
  position: relative;
}
#content nav .notification .num {
  position: absolute;
  top: -6px;
  right: -6px;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 2px solid var(--light);
  background: var(--red);
  color: var(--light);
  font-weight: 700;
  font-size: 12px;
  display: flex;
  justify-content: center;
  align-items: center;
}
#content nav .profile img {
  width: 36px;
  height: 36px;
  object-fit: cover;
  border-radius: 50%;
  float: left;
}
#content nav .profile p{
  font-size: 16px;
   font-weight: 550;
   color: #F9F9F9;
}



/* MAIN */
#content main {
  width: 100%;
  padding: 36px 24px;
  font-family: var(--poppins);
  max-height: calc(100vh - 56px);
  overflow-y: auto;
}
#content main .head-title {
  display: flex;
  align-items: center;
  justify-content: space-between;
  grid-gap: 16px;
  flex-wrap: wrap;
}
#content main .head-title .left h1 {
  font-size: 36px;
  font-weight: 600;
  margin-bottom: 10px;
  color: var(--dark);
}
#content main .head-title .left .breadcrumb {
  display: flex;
  align-items: center;
  grid-gap: 16px;
}
#content main .head-title .left .breadcrumb li {
  color: var(--dark);
}
#content main .head-title .left .breadcrumb li a {
  color: var(--dark-grey);
  pointer-events: none;
}
#content main .head-title .left .breadcrumb li a.active {
  color: var(--blue);
  pointer-events: unset;
}





#content main .box-info {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  grid-gap: 24px;
  margin-top: 36px;
}
#content main .box-info li {
  padding: 24px;
  background: var(--light);
  
  display: flex;
  align-items: center;
  grid-gap: 24px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

#content main .box-info li .bx, #fas {
  width: 80px;
  height: 80px;
  border-radius: 10px;
  font-size: 36px;
  display: flex;
  justify-content: center;
  align-items: center;
}
#content main .box-info li:nth-child(1) .bx, #fas {
  background: var(--light-blue);
  color: var(--blue);
}
#content main .box-info li:nth-child(2) .bx, #fas {
  background: var(--light-yellow);
  color: var(--yellow);
}
#content main .box-info li:nth-child(3) .bx, #fas {
  background: var(--light-orange);
  color: var(--orange);
}
#content main .box-info li .text h3 {
  font-size: 24px;
  font-weight: 600;
  color: var(--dark);
}
#content main .box-info li .text p {
  color: #f9f9f9; 
}
#content main .box-info .holiday{
	background: red;
	}
#content main .box-info .holiday .text h3{
	color: white;
}
#content main .box-info .holiday .text p{
	color: white;
}
.active{
	color: var(--blue);
}

@import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');


.class_info{
  position: absolute;
  top: 170%;
  left: 50%;
  transform: translate(-50%,-50%);
  width: 95%;
  display: flex;
  box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
}

.class_info .left{
  width: 35%;
  background: var(--light);
  padding: 30px 25px;
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  text-align: center;
  color: #fff;
  border-top-right-radius:10px ;
  border-bottom-right-radius: 10px;
}

.class_info .left img{
  border-radius: 5px;
  margin-bottom: 10px;
}

.class_info .left h4{

  font-size: 25px;
  margin-bottom: 10px;
}

.class_info .left p{
  font-size: 18px;
   margin-top: 20px;
}
.class_info .left .join_class{
	text-decoration: none;
	margin-left: 80px;
  margin-top: 20px;
	padding: 5px 50px;
	background: var(--blue);
	border-radius: 40px;
	border: 1px solid var(--blue);
	font-size: 15px;
	color: white;
	font-weight: 400;
	cursor: pointer;

}
.class_info .left .join_class a{
	text-decoration: none;
	color: white;
}
.class_info .left .line{
  width: 95%;
  height: 2px;
  background: #9fc;
  margin-top: 8px;
}

.class_info .right{
  width: 65%;
  background: #f9f9f9;
  padding: 30px 25px;
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
}

.class_info .right .info,
.class_info .right .gurdian{
  margin-bottom: 25px;
  padding: 10px 10px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.class_info .right .info h3,
.class_info .right .gurdian h3{
    margin-bottom: 15px;
    padding-bottom: 5px;
    border-bottom: 1px solid #e0e0e0;
    color: #353c4e;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.class_info .right .info_data,
.class_info .right .gurdian_data{
  display: flex;
  justify-content: space-between;
}

.class_info .right .info_data .data,
.class_info .right .gurdian_data .data{
  width: 15%;
  background: var(--custom);
  padding: 10px;
 
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.class_info .right .info_data .data h4,
.class_info .right .gurdian_data .data h4{
   text-align: center;
    color: #353c4e;
    margin-bottom: 5px;
}

.class_info .right .info_data .data p,
.class_info .right .gurdian_data .data p{
  text-align: center;
  font-size: 18px;
  margin-bottom: 10px;
  color: white;
}

.class_info .button{
  text-align: center;

}
.class_info .button button{
  background: var(--custom);
  padding: 10px;
  border: 1px solid var(--custom);
  border-radius: 3px;
}
.class_info .button a{
  text-decoration: none;
  color: white;
}




@media screen and (max-width: 768px) {
  #sidebar {
    width: 200px;
  }

  #content {
    width: calc(100% - 60px);
    left: 200px;
  }

  #content nav .nav-link {
    display: none;
  }
}






@media screen and (max-width: 576px) {
  #content nav form .form-input input {
    display: none;
  }

  #content nav form .form-input button {
    width: auto;
    height: auto;
    background: transparent;
    border-radius: none;
    color: var(--dark);
  }

  #content nav form.show .form-input input {
    display: block;
    width: 100%;
  }
  #content nav form.show .form-input button {
    width: 36px;
    height: 100%;
    border-radius: 0 36px 36px 0;
    color: var(--blue);
    background: var(--red);
  }

  #content nav form.show ~ .notification,
  #content nav form.show ~ .profile {
    display: none;
  }

  #content main .box-info {
    grid-template-columns: 1fr;
  }

  #content main .table-data .head {
    min-width: 420px;
  }
  #content main .table-data .routine table {
    min-width: 420px;
  }
  #content main .table-data .todo .todo-list {
    min-width: 420px;
  }
}
td{
  padding: 10px 10px;
}
	</style>

	<title>Dashboard | Exam</title>
</head>
<body onload="initClock()">


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class="fa fa-university" aria-hidden="true"> </i>
		<span class="text"> The School</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.php?dashboard='1'">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
      <li>
        <a href="index.php?profile='1'">
          <i class='bx bxs-id-card'></i>
          <span class="text">My Profile</span>
        </a>
      </li>
			<li>
				<a href="index.php?classroom='1'">
					<i class='bx bx-book' ></i>
					<span class="text">Class Room</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bx-check-circle'></i>
					<span class="text">Exams</span>
				</a>
			</li>
			<li>
				<a href="index.php?message='1'">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="index.php?logout='1'" class="logout" name="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>

     <div class="copyright">
    <p>&copy;Copyright 2022-2025|Shameem Ahammed</p>
  </div>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
			<abbr title="Unfinished Todo">	<span class="num"><?php echo $count_of_works;?></span></abbr>
			</a>
		<a href="#" class="profile">
        <?php  
        $sql = "SELECT * FROM images where roll='$roll' limit 1;";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
            while ($images = mysqli_fetch_assoc($res)) {  ?>
             
            
              <img src="uploads/<?=$images['image_url']?>">
              
    <?php } }?>
        <p style="color:white;"><?php echo $username;?></p>
      </a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Exam Hall</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Exam</a>
						</li>
					</ul>
				</div>
				<div class="date">
					<p><span id="dat">DD</span>-<span id="mon">MM</span>-<span id="year">YY</span></p>
					<p><span id="h">HH</span>:<span id="m">MM</span>:<span id="s">SS</span><span id="pe">&nbsp; &nbsp; AM</span>,<span id="day">Day</span></p>
					<script>
				function updateTime(){
                   var dt = new Date();
                   var dn=dt.getDay(),
                       mo=dt.getMonth(),
                       dd=dt.getDate(),
                       yy=dt.getFullYear(),
                       hh=dt.getHours(),
                       mm=dt.getMinutes(),
                       ss=dt.getSeconds(),
                       p=" AM";
                       
                       if(hh==0)
                       {
                       	 hh=12;
                       }
                       if(hh>12)
                       {
                       	hh=hh-12;
                       	p=" PM";
                       }

                    Number.prototype.pad=function(digits){
                    	for(var n=this.toString();n.length<digits;n=0+n);
                    		return n;

                    }

                       var month=["January", "February","March","April","May","June","July","August","September","October","November","December"];
                       var week=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                       var ids=["dat","mon","year","h","m","s","pe","day"];
                       var values=[dd.pad(2),month[mo],yy,hh.pad(2),mm.pad(2),ss.pad(2),p,week[dn]];
                       for(var i=0;i<ids.length;i++)
                       {
                       	 document.getElementById(ids[i]).innerHTML = values[i];
                       }
                   }
                   function initClock(){
                   	updateTime();
                   	window.setInterval("updateTime()",1);
                   }
                   </script>
					
				</div>
				
			</div>

			<ul class="box-info">
        <li>
          <i class="fa fa-user-circle" aria-hidden="true" id="fas"></i>
          <span class="text">
            <h3><?php echo $fullname;?></h3>
            <p>Class:<?php echo $class; ?>&nbsp; &nbsp; Roll:<?php echo $roll; ?></p>
          </span>
        </li>
        <?php 
        if(date("l")=='Friday'||date("l")=='Saturday')
        {
        	echo "<li class=\"holiday\">
          <i class=\"fa fa-bed\" aria-hidden=\"true\" id=\"fas\"></i>
          <span class=\"text\">
            <h3>Holiday</h3>
            <p>No Class Today</p>
          </span>
        </li>";
        }
        else
        {
        	echo "
        <li>
          <i class=\"fa fa-user-circle\" aria-hidden=\"true\" id=\"fas\"></i>
          <span class=\"text\">
            <h3>Join Class Regualrly</h3>
           
          </span>
        </li>";

    }
		?>		
			</ul>

    
  
<div class="class_info">
    <div class="left">
      <h4>Today Exam List</h4>
     
       <?php 
        

        $sql="select *from examschedule where schedule='$dt' or schedule='$dt2' and class='$class'; ";

       $result=mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
        $exam_now=$row['exam_name'];
        $exam_id=$row['exam_id'];
        $start_h=$row['start_h'];
        $start_m=$row['start_m'];
        $end_h=$row['end_h'];
        $end_m=$row['end_m'];
        $duration=$row['duration'];
        // echo "<p>$exam_id  $exam_now</p>";
  
  $h=date('h');
  $m=date('i');
  $am=date('A');
  $h=$h+5;
  //echo "$h  $m  $am";
if($am=="PM"&&$h!='12')
{
  $h=$h+'12';
}
if($end_h<$h)
{
  // echo "The Exam Is Over 1 $h $dt2<br>";
  $now="The Exam Is Over";
}
else if($end_h==$h&&$end_m<$m)
{
    // echo "The Exam Is Over 2<br>";
    $now="The Exam Is Over";
}
// else if($start_h>$h)
// {
//     // echo "The Exam Has not Started Yet";
//     $now="The Exam Has not Started Yet $h";
// }
else
{

        echo "<h3>$exam_now <a href=\"examroom.php?join_exam=$exam_id\" class=\"join_class\"  >Join Exam</a></h3>";
            echo "<div class=\"line\"></div><br>";
 }

    }
  }
else
  {
     
      echo "<h3>No Exam Today </h3>";
  }

      

       ?>
    </div>
    <div class="right">
        <div class="info">
      



            <h3>Exam Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Bangla</h4>
                   <?php echo "<p><a href=\"view.php?id=Bangla\">$mb</a><p>"; ?>
                 </div>
                 <div class="data">
                   <h4>English</h4>
                 <?php echo " <p> <a href=\"view.php?id=English\">$me</a></p>"; ?>
              </div>
              <div class="data">
                   <h4>Math</h4>
                 <?php echo "<p> <a href=\"view.php?id=Math\">$mm</a></p>"; ?>
              </div>
              <div class="data">
                   <h4>Science</h4>
                 <?php echo "<p> <a href=\"view.php?id=Science\">$ms</a></p>"; ?>
              </div>
              <div class="data">
                   <h4>History</h4>
                 <?php echo "<p><a href=\"view.php?id=History\">$mh</a></p>"; ?>
              </div>
              <div class="data">
                   <h4>Religioun</h4>
                 <?php echo "<p><a href=\"view.php?id=Religion\">$mr</a></p>"; ?>
              </div>


            </div>
        </div>
      
      <div class="gurdian">
            <h3>Attendance Information</h3>
            <div class="gurdian_data">
                  <div class="data">
                    <h4>Bangla</h4>
                   <?php echo "<p>$bangla</p>"; ?>
                 </div>
                 <div class="data">
                   <h4>English</h4>
                 <?php echo "  <p>$english</p>"; ?>
              </div>
              <div class="data">
                   <h4>Math</h4>
                 <?php echo "  <p>$math</p>"; ?>
              </div>
              <div class="data">
                   <h4>Science</h4>
                 <?php echo "  <p>$science</p>"; ?>
              </div>
              <div class="data">
                   <h4>History</h4>
                 <?php echo "  <p>$history</p>"; ?>
              </div>
              <div class="data">
                   <h4>Religioun</h4>
                 <?php echo "  <p>$religion</p>"; ?>
              </div>
            </div>
        </div>
      
    </div>
</div>

   

			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</body>
</html>