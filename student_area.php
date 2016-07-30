<?php
if(!isset($_SESSION))
{
session_start();		
}

$connection=new PDO("mysql:host=localhost; dbname=online_clearance", "root", "");
 if(isset($_POST['submit_dept']))
 {
	 $_SESSION['submit']="department";
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $select=$connection->prepare("SELECT * FROM dept_login WHERE `username`='$username' AND `password`='$password'");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 header("Location:student_reg.php");
			 exit();
		 }

 }
 
 if(isset($_POST['submit_faculty']))
 {
	 $_SESSION['submit']="faculty";
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $select=$connection->prepare("SELECT * FROM faculty_login WHERE `username`='$username' AND `password`='$password'");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 header("Location:student_reg.php");
			 exit();
		 }

 }

if(isset($_POST['submit_library']))
 {
	 $_SESSION['submit']="library";
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $select=$connection->prepare("SELECT * FROM library_login WHERE `username`='$username' AND `password`='$password'");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 header("Location:student_reg.php");
			 exit();
		 }

 }
 
 if(isset($_POST['submit_medical']))
 {
	 $_SESSION['submit']="medical";
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $select=$connection->prepare("SELECT * FROM medical_login WHERE `username`='$username' AND `password`='$password'");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 header("Location:student_reg.php");
			 exit();
		 }

 }
 
 
 if(isset($_POST['submit_security']))
 {
	 $_SESSION['submit']="security";
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $select=$connection->prepare("SELECT * FROM security_login WHERE `username`='$username' AND `password`='$password'");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 header("Location:student_reg.php");
			 exit();
		 }

 }
 
 if(isset($_POST['submit_hostel']))
 {
	 $_SESSION['submit']="hostel";
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $select=$connection->prepare("SELECT * FROM hostel_login WHERE `username`='$username' AND `password`='$password'");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 header("Location:student_reg.php");
			 exit();
		 }

 }
 
 if(isset($_POST['submit_affair']))
 {
	 $_SESSION['submit']="affair";
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $select=$connection->prepare("SELECT * FROM affair_login WHERE `username`='$username' AND `password`='$password'");
		 $select->execute();
		 $num=$select->rowCount();
		 if($num>=1)
		 {
			 header("Location:student_reg.php");
			 exit();
		 }

 }
 
 if(isset($_POST['submit_pay']))
 {
	 $_SESSION['submit']="pay";
	 $_SESSION['reg']=$_POST['reg'];
	 
	 $username=$_POST['reg'];
	 //$password=$_POST['password'];
	 		 header("Location:student_reg.php");
			 exit();

 }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Student Area</title>
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
		 img{ height:180px;
		       width:215px;}
		</style>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1>ONLINE STUDENT CLEARANCE</h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
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
						<a href="#" class="button big" style="margin-top:60px">STUDENT SECTIONS</a>
					</li>
				</ul>
			</section>

			
		<!-- One -->
			<section id="one" class="wrapper style1 special">
			<div id="featured">
		<div>
				<ul>
				<li>
					<h3>PAY SCHOOL FEES</h3>
					<div>
						<p>
							<form action="student_reg.php" method="POST">
							   <h4>REG NO:</h4><input type="text" name="reg" style="height:30px" placeholder="Enter your reg no"/></br/>
							   <input type="submit" name="submit_pay" value="Login" />
							</form>
						</p>
						
					</div>
					<img src="images/Online_department.jpg" alt="">
				</li>
				
					
					<div>
							<section>
								<a href="student_page.php"><img src="images/Online_student.jpg" width=120px; height=120px; style='border-radius:50%' alt=""></a>
								<h3>NEW STUDENT</h3>
								<!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quam consectetur quibusdam magni minus aut modi aliquid.</p>-->
							</section>
						</div>
				
				
			</ul>
				</div>
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
					echo "<script>alert('registration number does not exist')</script>";
					$_SESSION['std_Reg']="hoo";
					unset($_SESSION['std_Reg']);
					
				}
				
				if(isset($_SESSION['reg']) AND ($_SESSION['reg']=="registered"))
{
    echo "<script>alert('REGISTRATION NUMBER WAS SUCCESSFUL')</script>";
	$_SESSION['reg']="NOT";
}
				
				?>
	</body>
</html>