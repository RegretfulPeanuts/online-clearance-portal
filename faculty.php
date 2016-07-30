<?php
if(!isset($_SESSION))
{
session_start();
}
          if(!isset($_SESSION['faculty']))
   {
		header("Location:index.php");
	    
    }else
	{
      $connection=new PDO("mysql:host=localhost; dbname=online_clearance", "root", "");
	  $regno=$_SESSION['regno'];
	  $select=$connection->prepare("SELECT * FROM faculty WHERE `regno`='$regno' ");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num==0)
		 {
            $insert=$connection->prepare("INSERT into faculty(`regno`, `due_100`, `due_200`, `due_300`, `due_400`, `due_500`, `due_600`) 
																   VALUE('$regno' , '100', '200', '300', '400', '500', '600')");
		    $insert->execute();
			}
			
			if(isset($_POST['submit_faculty']))
			{
				$due=$_POST['dept_due'];
				//$_SESSION['fac']="no";
				if($due=='100')
				{
					$update=$connection->prepare("UPDATE `faculty` SET `due_100`='100 due paid' WHERE `regno`='$regno'");
					$update->execute();
					$_SESSION['faculty']="due";
					header("Location:student_reg.php");
					exit();
				}else if($due=='200')
				  {
					$select=$connection->prepare("SELECT * FROM faculty WHERE `due_100`='100' AND `regno`='$regno'");
		            $select->execute();
		            $num=$select->rowCount();
		            if($num==0)
		           {
					$update=$connection->prepare("UPDATE `faculty` SET `due_200`='200 due paid' WHERE `regno`='$regno'");
					$update->execute();
					$_SESSION['faculty']="due";
					header("Location:student_reg.php");
					exit();
				   }else 
				   {
					$_SESSION['fac']="not_paid";
					header("Location:faculty.php");
					exit();
				   }
				}else if($due=='300')
				{
					$select=$connection->prepare("SELECT * FROM faculty WHERE `due_200`='200' AND `regno`='$regno'");
		            $select->execute();
		            $num=$select->rowCount();
		            if($num==0)
		           {
					$update=$connection->prepare("UPDATE `faculty` SET `due_300`='300 due paid' WHERE `regno`='$regno'");
					$update->execute();
					$_SESSION['faculty']="due";
					header("Location:student_reg.php");
					exit();
				   }else 
				   {
					$_SESSION['fac']="not_paid";
					header("Location:faculty.php");
					exit();
				   }
				}else if($due=='400')
				{
					$select=$connection->prepare("SELECT * FROM faculty WHERE `due_300`='300' AND `regno`='$regno'");
		            $select->execute();
		            $num=$select->rowCount();
		            if($num==0)
		           {
					$update=$connection->prepare("UPDATE `faculty` SET `due_400`='400 due paid' WHERE `regno`='$regno'");
					$update->execute();
					$update=$connection->prepare("UPDATE `student_info` SET `faculty_c`='cleared' WHERE `regno`='$regno'");
					$update->execute();
					$_SESSION['faculty']="due";
					header("Location:student_reg.php");
					exit();
					
				   }else 
				   {
					$_SESSION['fac']="not_paid";
					header("Location:faculty.php");
				     exit();
				   }
				}
            }

			$select_student=$connection->prepare("SELECT * FROM student_info where `regno`='$regno' ");
            $select_student->execute();
	        $fetch_student=$select_student->fetch();

            $select_due=$connection->prepare("SELECT * FROM faculty where `regno`='$regno' ");
            $select_due->execute();
	}		
			
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Faculty Page</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<style>
		 label{width:560px; margin-top:-25px; margin-left:200px}
		 span{margin-right:920px}
		 h4{margin-left:-450px}
		</style>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1>ONLINE STUDENT CLEARANCE</h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<!--<li><a href="about.php">About</a></li>-->
						<!--<li><a href="#" class="button special">Sign Up</a></li>-->
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<!--<h2>&nbsp</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
				<ul class="actions">
					<li>
						<a href="logout.php" class="button big" style="margin-top:60px">Logout</a>
					</li>
				</ul>
			</section>
            
			
		<!-- One -->
			<section id="one" class="wrapper style1 specia">
				<div class="container">
					<form action="faculty.php" method="POST">
				<span>first name:</span>	
				<label for="firstName"> 
					  <h3><?php if(isset($fetch_student)){echo $fetch_student['first'];}?></h3>
				</label>
				<span>last name:</span>
				<label for="lastName"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['last'];}?></h3>
				</label>
				
				<span>middle name:</span>
				<label for="middle"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['middle'];}?></h3>
				</label>
				
				<span>Reg. No</span>
				<label for="middle"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['regno'];}?></h3>
				</label>
				
				<span>email:</span>
				<label for="email"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['email'];}?></h3>
				</label>
				
				<span>sex:</span>
				<label for="sex"> 
				<h3><?php if(isset($fetch_student)){echo $fetch_student['sex'];}?></h3>
				</label>
				
				<span>town of origin:</span>
				<label for="email"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['town'];}?></h3>
				</label>
				
				
				<span>local Government:</span>
				<label for="email"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['lga'];}?></h3>
				</label>
				
				
				<span>state of origin:</span>
				<label for="email"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['state'];}?></h3>
				</label>
				
				
				<span>department:</span>
				<label for="dept"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['dept'];}?></h3>
				</label>
				
				<span>faculty:</span>
				<label for="faculty"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['faculty'];}?></h3>
				</label>
				
				<span>Faculty Due</span>
				<label for="dept_due"> 
				<select name="dept_due">
				  <option></option>
				  <?php
				     $fetch_due=$select_due->fetch();
					 echo "<option>".$fetch_due['due_100'] ."</option>";
					 echo "<option>".$fetch_due['due_200'] ."</option>";
					 echo "<option>".$fetch_due['due_300'] ."</option>";
					 echo "<option>".$fetch_due['due_400'] ."</option>";
					
				  ?>
				  
				</select>
				</label>
				
				
				<input type="submit"  name="submit_faculty" value="SUBMIT" id="submit">
			</form>
				</div>
			</section>

		
		<!-- Footer -->
			<footer id="footer">
				<div class="container"  style="height:40px">
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li>
								<li>Design by: <a href="#">Chibuzo</a></li>
								
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
<?php

			    if(isset($_SESSION['fac']) AND ($_SESSION['fac']=="not_paid"))
				{
					echo "<script>alert('FACULTY DUE FOR PREVIOUS SESSION HAVE NOT BEEN PAID')</script>";
					 $_SESSION['fac']="hoo";
					
				}
				
				
			?>
	</body>
</html>