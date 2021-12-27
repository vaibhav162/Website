<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
body {background-image:url("images/4.jpg"); 	background-size:cover;}
.row{ width:60%;position:relative;left:22.5%; }
h3{color:yellow;}
</style>
<?php
session_start();
$m=$_SESSION['x'];
if(session_id()!=$_SESSION['p'])
{
header("location:login.php");
}
?>
<?php
include"connect.php";
	$ch=mysqli_query($conn,"select aadhar_no from user where aadhar_no='$m'");
     if(mysqli_fetch_row($ch)>0)
     { 
			echo'<div class="container">
			<h3 align="center">FORGET PASSWORD</h3>
			';
         echo'<form action="" method="POST" align="center">';
		 echo'<div class="row" style="background-color:rgba(255,255,255,0.3);">';
		 echo'<div class="col-sm-12 col-md-3"></div>';
		 echo'<div class="col-sm-12 col-md-6">';
         echo'<br><input type="password" name="np" class="form-control form-control" placeholder="Enter new password"></div></div>';
		 echo'<div class="row" style="background-color:rgba(255,255,255,0.3);">';
		 echo'<div class="col-sm-12 col-md-3"></div>';
		 echo'<div class="col-sm-12 col-md-6">';
         echo'<br><input type="password" name="rp" class="form-control form-control" placeholder="Re-enter password"></div></div>';
		 echo'<div class="row" style="background-color:rgba(255,255,255,0.3);">';
		 echo'<div class="col-sm-12 col-md-3"></div>';
		 echo'<div class="col-sm-12 col-md-6">';
		 echo'<br><input type="submit" class="btn btn-success" name="do" value="submit"><br></div>
		 </div></div></form>';
		 
     }
	 else
	 {
		 echo'No record found';
		echo'<a href="login.php">login</a>';
	 }
	 

if(isset($_POST['do']))
{
	$np=$_POST['np'];
	$rp=$_POST['rp'];
	if($np!=$rp)
	{
		echo'Password mismatch try again<br><br>';
		echo'<a href="login.php">Or login</a>';
	}
	else
	{   
		include"connect.php";
		mysqli_query($conn,"update user set password='".$rp."'where aadhar_no='$m'");
		echo'<script>alert("Password successfully changed.Please login!!");</script>';
		echo'<a href="login.php" style="font-size:20px;color:yellow;align:center;">login</a>';
	}
}
?>
