<?php
if(!isset($_SESSION))
{
session_start();
}

      $connection=new PDO("mysql:host=localhost; dbname=online_clearance", "root", "");
      if(isset($_POST['submit_std']))
	  {
		  $first=$_POST['first'];
		  $_SESSION['first']=$first;
		  $last=$_POST['last'];
		  $_SESSION['last']=$last;
		  $middle=$_POST['middle'];
		  $_SESSION['middle']=$middle;
		  $regno=$_POST['regno'];
		  $_SESSION['regno']=$regno;
		  $email=$_POST['email'];
		  $_SESSION['email']=$email;
		  $sex=$_POST['sex'];
		  $_SESSION['sex']=$sex;
		  $town=$_POST['town'];
		  $_SESSION['town']=$town;
		  $lga=$_POST['lga'];
		  $_SESSION['lga']=$lga;
		  $state=$_POST['state'];
		  $_SESSION['state']=$state;
		  $dept=$_POST['dept'];
		  $_SESSION['dept']=$dept;
		  $faculty=$_POST['faculty'];
		  $_SESSION['faculty']=$faculty;
		  $img=$_FILES['image']['name'];
		  if($first==null||$last==null||$middle==null||$regno==null||$email==null||$sex==null||$town==null||$lga==null||$state==null||$dept==null||$faculty==null||$img==null)
		  {
			      $_SESSION['missing']="missed";
				  header("Location:student_page.php");
				  exit();
			  		  }
		  else
		  {
			  $select_student=$connection->prepare("SELECT * FROM student_info where `regno`='$regno' ");
              $select_student->execute();
			  $num=$select_student->fetch();
			  if($num==0)
			  {
	              $image=$_FILES['image']['tmp_name'];
	              $location="uploads/";
	              move_uploaded_file($image, $location.$img);
		          $insert=$connection->prepare("INSERT into student_info(`first`, `last`, `middle`, `regno`, `email`, 
			                         `sex`, `town`, `lga`, `state`, `dept`, `faculty`, `image`, `school_fee`, `dept_c`, `faculty_c`, `library_c`, 
									 `medical_c`, `security_c`, `hostel_c`, `affair_c`) VALUE('$first',
									 '$last', '$middle', '$regno', '$email','$sex', '$town', '$lga', '$state', '$dept', '$faculty', '$img',
									 'not cleared', 'not cleared', 'not cleared', 'not cleared', 'not cleared', 'not cleared', 'not cleared', 'not cleared')");
		          $insert->execute();
				  $_SESSION['reg']="registered";
				  header("Location:student_area.php");
				  exit();
			  }else
			  {
				   $_SESSION['exist']="exist";
				  header("Location:student_page.php");
				  exit();
				 
			  }
	  }
	  }
	  
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Student Page</title>
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
						<a href="#" class="button big" style="margin-top:60px">STUDENT REGISTRATION FORM</a>
					</li>
				</ul>
			</section>

			
		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<form action="student_page.php" method="POST" enctype="multipart/form-data">
					<span>last name</span>
				<label for="lastName"> 
					<input type="text" name="last" id="lastName">
				</label>
					
				<span>first name</span>	
				<label for="firstName"> 
					<input type="text" name="first" id="firstName">
				</label>
				
				
				<span>middle name</span>
				<label for="middle"> 
					<input type="text" name="middle" id="lastName">
				</label>
				
				<span>Reg. No</span>
				<label for="middle"> 
					<input type="text" name="regno" id="lastName">
				</label>
				
				<span>email</span>
				<label for="email"> 
					<input type="text" name="email" id="email">
				</label>
				
				<span>sex</span>
				<label for="sex"> 
				<select name="sex">
				  <option></option>
				  <option>male</option>
				  <option>female</option>
				</select>
				</label>
				
				<span>student's passport</span>
				<label for="email"> 
					<input type="file" name="image">
				</label>
				
				<span>town of origin</span>
				<label for="town"> 
					<input type="text" name="town" id="email">
				</label>
				
				
				<span>local Government</span>
				<label for="lga"> 
					<input type="text" name="lga" id="email">
				</label>
				
				
				<span>state of origin</span>
				<label for="state"> 
					<input type="text" name="state" id="email">
				</label>
				
				
				<span>department</span>
				<label for="dept"> 
					<input type="text" name="dept" id="subject">
				</label>
				
				<span>faculty</span>
				<label for="faculty"> 
					<input type="text" name="faculty" id="subject">
				</label>
				<input type="submit" name="submit_std" value="SUBMIT" id="submit">
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
 

if(isset($_SESSION['missing']) AND ($_SESSION['missing']=="missed"))
{
    echo "<script>alert('THERE ARE MISSING FIELD')</script>";
	$_SESSION['missing']="NOT";
}

if(isset($_SESSION['exist']) AND ($_SESSION['exist']=="exist"))
{
     echo "<script>alert('REGISTRATION NUMBER ALREADY EXIST')</script>";
	$_SESSION['exist']="NOT";
}


?>
	</body>
</html>