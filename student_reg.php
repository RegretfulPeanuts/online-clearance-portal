<?php
if(!isset($_SESSION))
{
session_start();
}

$connection=new PDO("mysql:host=localhost; dbname=online_clearance", "root", "");
 
 if(isset($_POST['submit']) AND ($_SESSION['submit']=="department"))
 {
	 $regno=$_POST['regno'];
	 $select=$connection->prepare("SELECT * FROM student_info WHERE `regno`='$regno' ");
		 $select->execute();
		 $num=$select->rowCount();
		 $_SESSION['std_Reg']="hoo";
		 if($num>=1)
		 {
			 $_SESSION['regno']=$regno;
			 header("Location:department.php");
			 exit();
		 }else
		 {
			$_SESSION['std_Reg']="missed";
			header("Location:student_reg.php");
			exit();
		 }

 }
 
 
 if(isset($_POST['submit']) AND ($_SESSION['submit']=="faculty"))
 {
	 $regno=$_POST['regno'];
	 $select=$connection->prepare("SELECT * FROM student_info WHERE `regno`='$regno' ");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 $_SESSION['regno']=$regno;
			 header("Location:faculty.php");
			 exit();
		 }else
		 {
			 $_SESSION['std_Reg']="missed";
			header("Location:student_reg.php");
			exit();
		 }

 }
 
 if(isset($_POST['submit']) AND ($_SESSION['submit']=="library"))
 {
	 $regno=$_POST['regno'];
	 $select=$connection->prepare("SELECT * FROM student_info WHERE `regno`='$regno' ");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 $_SESSION['regno']=$regno;
			 header("Location:library.php");
			 exit();
		 }else
		 {
			 $_SESSION['std_Reg']="missed";
			header("Location:student_reg.php");
			exit();
		 }

 }
 
 if(isset($_POST['submit']) AND ($_SESSION['submit']=="medical"))
 {
	 $regno=$_POST['regno'];
	 $select=$connection->prepare("SELECT * FROM student_info WHERE `regno`='$regno' ");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 $_SESSION['regno']=$regno;
			 header("Location:medical.php");
			 exit();
		 }else
		 {
			 $_SESSION['std_Reg']="missed";
			header("Location:student_reg.php");
			exit();
		 }

 }
 
 if(isset($_POST['submit']) AND ($_SESSION['submit']=="security"))
 {
	 $regno=$_POST['regno'];
	 $select=$connection->prepare("SELECT * FROM student_info WHERE `regno`='$regno' ");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 $_SESSION['regno']=$regno;
			 header("Location:security.php");
			 exit();
		 }else
		 {
			 $_SESSION['std_Reg']="missed";
			header("Location:student_reg.php");
			exit();
		 }

 }
 
 if(isset($_POST['submit']) AND ($_SESSION['submit']=="hostel"))
 {
	 $regno=$_POST['regno'];
	 $select=$connection->prepare("SELECT * FROM student_info WHERE `regno`='$regno' ");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 $_SESSION['regno']=$regno;
			 header("Location:hostel.php");
			 exit();
		 }else
		 {
			$_SESSION['std_Reg']="missed";
			header("Location:student_reg.php");
			exit();
		 }

 }
 
 if(isset($_POST['submit']) AND ($_SESSION['submit']=="affair"))
 {
	 $regno=$_POST['regno'];
	 $select=$connection->prepare("SELECT * FROM student_info WHERE `regno`='$regno' ");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 $_SESSION['regno']=$regno;
			 header("Location:affair.php");
			 exit();
		 }else
		 {
			 $_SESSION['std_Reg']="missed";
			header("Location:student_reg.php");
			exit();
		 }

 }
 
 
 if(isset($_POST['submit']) AND ($_SESSION['submit']=="admin"))
 {
	 $regno=$_POST['regno'];
	 $select=$connection->prepare("SELECT * FROM student_info WHERE `regno`='$regno' ");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 $_SESSION['regno']=$regno;
			 header("Location:admin.php");
			 exit();
		 }else
		 {
			 $_SESSION['std_Reg']="missed";
			header("Location:student_reg.php");
			exit();
		 }

 }
 
 if(isset($_POST['submit_pay']))
 {
	 $regno=$_POST['reg'];
	 $select=$connection->prepare("SELECT * FROM student_info WHERE `regno`='$regno' ");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 $_SESSION['regno']=$regno;
			 header("Location:school_fees.php");
			 exit();
		 }else
		 {
			$_SESSION['std_Reg']="missed";
			header("Location:student_area.php");
			exit();
			}

 }
	
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>login student</title>
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
		</style>
	</head>
	<body class="landing">
	<?php

			    if(isset($_SESSION['dept']) AND ($_SESSION['dept']=="due"))
				{
					echo "<script>alert('DEPARTMEENTAL DUE PAYMENT WAS SUCCESSFUL')</script>";
					$_SESSION['dept']="hoo";
				}	
			?>
			
			<?php

			    if(isset($_SESSION['faculty']) AND ($_SESSION['faculty']=="due"))
				{
					echo "<script>alert('FACULTY DUE PAYMENT WAS SUCCESSFUL')</script>";
					$_SESSION['faculty']="hoo";
				}	
			?><?php

			    if(isset($_SESSION['library']) AND ($_SESSION['library']=="due"))
				{
					echo "<script>alert('LIBRARY CLEARANCE WAS SUCCESSFUL')</script>";
					$_SESSION['library']="hoo";
				}	
			?><?php

			    if(isset($_SESSION['medical']) AND ($_SESSION['medical']=="due"))
				{
					echo "<script>alert('MEDICAL CLEARANCE WAS SUCCESSFUL')</script>";
					$_SESSION['medical']="hoo";
				}	
			?><?php

			    if(isset($_SESSION['security']) AND ($_SESSION['security']=="due"))
				{
					echo "<script>alert('SECURITY CLEARANCE WAS SUCCESSFUL')</script>";
					$_SESSION['security']="hoo";
				}	
			?><?php

			    if(isset($_SESSION['hostel']) AND ($_SESSION['hostel']=="due"))
				{
					echo "<script>alert('HOSTEL CLEARANCE WAS SUCCESSFUL')</script>";
					$_SESSION['hostel']="hoo";
				}	
			?><?php

			    if(isset($_SESSION['affair']) AND ($_SESSION['affair']=="due"))
				{
					echo "<script>alert('STUDENT AFFAIR CLEARANCE WAS SUCCESSFUL')</script>";
					$_SESSION['affair']="hoo";
				}	
			?>

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
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<form action="student_reg.php" method="POST">
				<label for="regno"> <span>REGISTRATION NO:</span>
					<input type="text" name="regno" >
				</label>

				<input type="submit" name="submit" value="SUBMIT" id="submit">
			</form>
			</br></br></br></br></br></br></br></br></br></br></br>
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
			if(isset($_SESSION['std_Reg']) AND ($_SESSION['std_Reg']="missed"))
				{
					echo "<script>alert('registration does not exist')</script>";
					$_SESSION['std_Reg']="hoo";
					unset($_SESSION['std_Reg']);
					
				}
				
				?>

	</body>
</html>