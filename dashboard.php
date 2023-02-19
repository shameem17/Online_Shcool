<?php include('initialize.php'); ?>


 
<?php  

function routine($dd,$tab,$conn)
{


   $sql="select *from $tab where day='$dd';";
                                 $result=mysqli_query($conn,$sql);
                                  $row = mysqli_fetch_assoc($result);
                                  $c1=$row['c1'];
                                  $c2=$row['c2'];
                                  $c3=$row['c3'];
                                  $c4=$row['c4'];
                                  $c5=$row['c5'];
                                  $c6=$row['c6'];
                                  $c7=$row['c7'];
        $todo=array($c1,$c2,$c3,$c4,$c5,$c6,$c7);
        return $todo;
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
/* SIDEBAR */
#sidebar .copyright{
  position: absolute;
  bottom: 2px;
}
#sidebar p{
  text-align: center;
  color: white;
}




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
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3);
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
  color: var(--dark); 
}





#content main .table-data {
  display: flex;
  flex-wrap: wrap;
  grid-gap: 24px;
  margin-top: 24px;
  width: 100%;
  color: var(--dark);
}
#content main .table-data > div {
  border-radius: 20px;
  background: var(--light);
  padding: 24px;
  overflow-x: auto;
}
#content main .table-data .head {
  display: flex;
  align-items: center;
  grid-gap: 16px;
  margin-bottom: 24px;
}
#content main .table-data .head h3 {
  margin-right: auto;
  font-size: 24px;
  font-weight: 600;
  color: #f9f9f9;
}
#content main .table-data .head .bx {
  cursor: pointer;
}

#content main .table-data .routine {
  flex-grow: 1;
  flex-basis: 500px;
}
#content main .table-data .routine table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid var(--grey);
    text-align: center;
}
#content main .table-data .routine table th {
  padding-bottom: 12px;
  font-size: 14px;
  text-align: center;
}

#content main .table-data .routine table td {
  padding: 16px 0;
}
#content main .table-data .routine table tr td:first-child {
  display: flex;
  align-items: center;
  grid-gap: 10px;
  padding-left: 3px;
}




#content main .table-data .todo {
  flex-grow: 1;
  flex-basis: 300px;
}
.todo a{
  text-decoration: none;
}

#content main .table-data .todo .todo-list {
  width: 100%;
}
#content main .table-data .todo .todo-list li {
  width: 100%;
  margin-bottom: 16px;
  background: var(--grey);
  border-radius: 10px;
  padding: 14px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
#content main .table-data .todo .todo-list li #bx {
  margin-right: 2px;
  cursor: pointer;
}
#content main .table-data .todo .todo-list li.completed {
  border-left: 10px solid var(--blue);
}
#content main .table-data .todo .todo-list li.not-completed {
  border-left: 10px solid var(--orange);
}
#content main .table-data .todo .todo-list li:last-child {
  margin-bottom: 0;
}
/* MAIN */
/* CONTENT */

.active{
	color: var(--blue);
}
.notice{
  width: 100%;
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
  #content main .table-data .routine{
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  }
  #content main .table-data .routine table {
    min-width: 420px;

  }
  #content main .table-data .todo .todo-list {
    min-width: 420px;
  }
}
	</style>

	<title>Dashboard | Home</title>
</head>
<body onload="initClock()">


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class="fa fa-university" aria-hidden="true"> </i>
		<span class="text"> The School</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
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
			<li>
				<a href="index.php?exam='1'">
					<i class='bx bx-check-circle'></i>
					<span class="text">Exams</span>
				</a>
			</li>
			<li>
				<a href="index.php?message='1'" >
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
			<form action="search.php" method="post">
				<div class="form-input">
					<input type="search" placeholder="Search..." name="ss">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<abbr title="Unfinished Todo">  <span class="num"><?php echo $count_of_works;?></span></abbr>
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
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
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
      <div class="notice" style="width:100%">
          <p style="color:white;background:red; font-size: 18px;padding: 2px; border-radius: 100px; width:100%">&nbsp;&nbsp;Notice:
          <marquee scrolldelay="5">
          <?php 
           $sql="select *from notice where receiver='$roll';";
           echo "<p>Welcome <a href=\"#\">$fullname</a> :: Join Your Class regualrly &nbsp;";
                      $result=mysqli_query($conn,$sql);
                      if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    $notice=$row['message'];
                    echo ":: $notice :: &nbsp;&nbsp;";
                  }
                }
          ?>
                    </marquee></p>
                  </div>

			<ul class="box-info">
        <li>
          <i class="fa fa-user-circle" aria-hidden="true" id="fas"></i>
          <span class="text">
            <h3><?php echo $fullname;?></h3>
            <p>Class: <?php echo $class;?>&nbsp; &nbsp;<br> Roll: <?php echo $roll;?></p>
          </span>
        </li>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $total_count;?></h3>
						<p>Total Sutdents</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $classmate; ?></h3>
						<p>Classmates</p>
					</span>
				</li>
				<li>
					<i class="fa fa-users" aria-hidden="true" id="fas"></i>
					<span class="text">
						<h3><?php echo $no_of_teachers; ?></h3>
						<p>Teachers</p>
					</span>
				</li>
				
			</ul>


			<div class="table-data">
				<div class="routine">
					<div class="head">
						<h3>Class Routine</h3>
					</div>
					<table border="1">
						<thead style=" color: #f9f9f9;">
							<tr>
								<th>Time-></th>
								<th >9:00<br>-<br>9:50 <br> AM</th>
								<th>9:50<br>-<br>10:40 <br> AM</th>
								<th>10:40<br>-<br>11:30  <br>AM</th>
								<th>11:30<br>-<br>12:20  <br>AM</th>
								<th style="background-color: red;">12:20<br>-<br>1:00 <br> AM</th>
								<th>1:00<br>-<br>1:50 <br> AM</th>
								<th>1:50<br>-<br>2:40 <br> AM</th>
								<th>2:40<br>-<br>3:30 <br> AM</th>
							</tr>
						</thead>
						<tbody>

             
							<!-- Sunday -->
							<?php
								if(date("l")=="Sunday")
								{
									echo "<tr class=\"active\">";
								}
								else
								{
									echo "<tr>";
								}


								?>
								
								<td>Sunday</td>
								<?php
                $dd='Sun';
                  $dd='Sun';
                 $todo= routine($dd,$table,$conn);
                      
                ?>
                <td><?php echo $todo[0];?></td>
                <td><?php echo $todo[1];?></td>
                <td><?php echo $todo[2];?></td>
                <td><?php echo $todo[3];?></td>
              
                
								<td rowspan ="6" style="background-color: red;">B<br>R<br>E<br>A<br>K</td>
								<td><?php echo $todo[4];?></td>
                <td><?php echo $todo[5];?></td>
                <td><?php echo $todo[6];?></td>
					
							</tr>

           
							<!-- Monday -->
							<?php
								if(date("l")=="Monday")
								{
									echo "<tr class=\"active\">";
								}
								else
								{
									echo "<tr>";
								}


								?>
								<td>Monday</td>
								<?php
                            
                  $dd='Mon';
                 $todo= routine($dd,$table,$conn);
                      
                ?>
                <td><?php echo $todo[0];?></td>
                <td><?php echo $todo[1];?></td>
                <td><?php echo $todo[2];?></td>
                <td><?php echo $todo[3];?></td>
              
                <td><?php echo $todo[4];?></td>
                <td><?php echo $todo[5];?></td>
                <td><?php echo $todo[6];?></td>
							</tr>
         
							<!-- Tuesday -->
							<?php
								if(date("l")=="Tuesday")
								{
									echo "<tr class=\"active\">";
								}
								else
								{
									echo "<tr>";
								}


								?>
								<td>Tuesday</td>
								<?php
                $dd='Tue';
                 $todo= routine($dd,$table,$conn);
                      
                ?>
                <td><?php echo $todo[0];?></td>
                <td><?php echo $todo[1];?></td>
                <td><?php echo $todo[2];?></td>
                <td><?php echo $todo[3];?></td>
              
                <td><?php echo $todo[4];?></td>
                <td><?php echo $todo[5];?></td>
                <td><?php echo $todo[6];?></td>
					
							</tr>
           
							<!-- Wednessday -->
							<?php
								if(date("l")=="Wednesday")
								{
									echo "<tr class=\"active\">";
								}
								else
								{
									echo "<tr>";
								}


								?>
								<td>Wednessday</td>
								<?php
                                 $dd='Wed';
                 $todo= routine($dd,$table,$conn);
                      
								?>
								<td><?php echo $todo[0];?></td>
								<td><?php echo $todo[1];?></td>
								<td><?php echo $todo[2];?></td>
								<td><?php echo $todo[3];?></td>
							
								<td><?php echo $todo[4];?></td>
								<td><?php echo $todo[5];?></td>
								<td><?php echo $todo[6];?></td>
					
							</tr>
              
							<!-- Thursday -->
							
								<?php
								if(date("l")=="Thursday")
								{
									echo "<tr class=\"active\">";
								}
								else
								{
									echo "<tr>";
								}


								?>
								<td>Thursday</td>
								<?php
                   $dd='Thu';
                 $todo= routine($dd,$table,$conn);
                      
                ?>
                <td><?php echo $todo[0];?></td>
                <td><?php echo $todo[1];?></td>
                <td><?php echo $todo[2];?></td>
                <td><?php echo $todo[3];?></td>
              
                <td><?php echo $todo[4];?></td>
                <td><?php echo $todo[5];?></td>
                <td><?php echo $todo[6];?></td>
					
							</tr>

							
							
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Todos</h3>
           <a href="index.php?ok='1'" style="text-decoration: none;"> <i class='bx bx-check'></i></a>
           <a href="index.php?addtodo='1'" style="text-decoration: none;"> <i class='bx bx-plus' ></i></a>
						
						<a href="index.php?clear='1'" style="text-decoration: none;"><i class="fa fa-trash" aria-hidden="true"></i></a>
					</div>
					<ul class="todo-list">
                      
                      <?php
                      $dt=date("d/m/Y");
                      $dt2=date("Y-m-d");
                      $sql="select *from todo where roll='$roll' and (dt='$dt' or dt='$dt2');";
                      $result=mysqli_query($conn,$sql);
                      if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                       $work=$row['work'];
                       $ok=$row['done'];
                       $id=$row['id'];
                       if($ok=='1')
                       {
                       	
                       echo  "<li class=\"completed\"><p>$work</p><a href=\"delete.php?no= $id\" name=\"todo-delete\"><i class=\"fa fa-trash\" aria-hidden=\"true\" id=\"bx\"></i></a></li>";
                       }
                       else
                       {
                       	  echo  "<li class=\"not-completed\"><p>$work</p><a href=\"delete.php?no= $id\" name=\"todo-delete\"><i class=\"fa fa-trash\" aria-hidden=\"true\" id=\"bx\"></i></a><a href=\"index.php?hoyegase=$id\" style=\"text-decoration: none;\"> <i class=\"bx bx-check\"></i></a></li>";
                       }
                  }
                   } else {
                       echo "<li class=\"completed\"><p>No Work Left Today</p></li>";;
                      }


                      ?>

					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
</body>

</html>