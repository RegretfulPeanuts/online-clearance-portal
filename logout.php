<?php
if(!isset($_SESSION))
{
session_start();		
}

     $connection=new PDO("mysql:host=localhost; dbname=education_db","root", "");
 unset($_SESSION['dept']);
 unset($_SESSION['faculty']);
 unset($_SESSION['library']);
 unset($_SESSION['medical']);
 unset($_SESSION['security']);
 unset($_SESSION['hostel']);
 unset($_SESSION['affair']);
 Header("Location:index.php");
?>