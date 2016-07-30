<?php
if(!isset($_SESSION))
{
session_start();
}

       
	  $connection=new PDO("mysql:host=localhost; dbname=online_clearance", "root", "");
	  //$regno=$_SESSION['regno']; 	
      
	   $reg=$_SESSION['registration'];
			$select_student=$connection->prepare("SELECT * FROM student_info where `regno`='$reg' ");
            $select_student->execute();
	        $fetch_student=$select_student->fetch();
            $pin=$_SESSION['bank_pin'];	  
            $select_bank=$connection->prepare("SELECT * FROM bank where `pin`=$pin ");
            $select_bank->execute();
			$fetch_bank=$select_bank->fetch();
			
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Receipt Page</title>
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
						<a href="#" class="button big" style="margin-top:60px"></a>
					</li>
				</ul>
			</section>
            
			
		<!-- One -->
			<section id="one" class="wrapper style1 specia">
			<span style="margin-left:150px; position:absolute;margin-top:-70px"><h3> SCHOOL FEES RECEIPT</h3></span>
			<div style="float:right; margin-left:920px; position:absolute;"><img data-u='image' src="uploads/<?php if(isset($fetch_student)){echo $fetch_student['image'];}?>" width=150px; height=100px; alt='' class='img-indent'></div>
				<div class="container">
				 
					<form action="pay.php" method="POST">
				<span>serie number:</span>	
				<label for="sn"> 
					  <h3><?php if(isset($fetch_bank)){echo "sn".$fetch_bank['pin'];}?></h3>
				</label>
				<span>name:</span>	
				<label for="firstName"> 
					  <h3><?php if(isset($fetch_student)){echo $fetch_student['first']." ".$fetch_student['last']." ".$fetch_student['middle'] ;}?></h3>
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
				
				<span>level paid:</span>	
				<label for="lpd"> 
					  <h3><?php if(isset($fetch_bank)){echo $fetch_bank['level'];}?></h3>
				</label>
				
				<span>amount paid:</span>	
				<label for="ampd"> 
					  <h3><?php if(isset($fetch_bank)){echo $fetch_bank['amount'];}?></h3>
				</label>
				
				<span>session:</span>	
				<label for="sn"> 
					  <h3><?php if(isset($fetch_bank)){echo $fetch_bank['section'];}?></h3>
				</label>
				
				<span>department:</span>
				<label for="dept"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['dept'];}?></h3>
				</label>
				
				<span>faculty:</span>
				<label for="dept"> 
					<h3><?php if(isset($fetch_student)){echo $fetch_student['faculty'];}?></h3>
				</label>
				
				
				
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

			    if(isset($_SESSION['no']) AND ($_SESSION['not']=="not_paid"))
				{
					echo "<script>alert('SCHOOL FEES FOR PREVIOUS SESSION HAVE NOT BEEN PAID')</script>";
					$_SESSION['not']="hoo";
				}	
			?>
			
			
	</body>
</html>