<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	body {background-image:url(images/4.jpg);background-size:cover;}
</style>

<?php

	if(isset($_POST['lo']))
	{
		$a=$_POST['l'];
		$p=$_POST['p'];
		if($a=='admin' && $p=='password')
		{
		session_start();	
			$_SESSION['aid']=session_id();
			$_SESSION['ad']=$a;
		header("location:admin.php");
		}
		else if($a=='' && $p=='')
		{
			
				header("location:login.php?alert");
		}
		else if($p=='')
		{
			header("location:login.php?pas");
		}
		else
		{
			include"connect.php";
			$ch=mysqli_query($conn,"select * from user where aadhar_no='$a' and password='$p'");
			if(mysqli_fetch_row($ch)>0)
			{ 
			$tc="select status from user where aadhar_no=$a";
			$stc=mysqli_query($conn,$tc);
			if(!$stc)
			{
				echo'error'.mysqli_error($conn);
			}
			else
			{
				if(mysqli_fetch_array($stc)>0)
				{
					$stc=mysqli_query($conn,$tc);
						while($k=mysqli_fetch_array($stc))
					{
						if($k[0]==1)
						{
						session_start();
						$_SESSION['ch']=session_id();
						$_SESSION['us']=$a;
						header("location:profile.php");
						}
						else
						{
							header("location:login.php?alert2");
						}
					}
				}
			}
			}
			else
				{  
					header("location:login.php?alert2");	
				}
		}
}
?>
<!--style="background-image:url(images/4.jpg);background-size:cover;-->
<?php
if(isset($_POST['fp']))
{
	echo'<div class="container-fluid">';
	echo'<form action="" method="POST" align="center">';
	echo'<div class="row"><br><br><br><br></div>
	<div class="row" style="background-color:rgba(255,255,255,0.3)">
	<div class="col-sm-12 col-md-3"></div>
	<div class="col-sm-12 col-md-6">';
	echo'<br><input type="text" id="email" name="email" class="form-control form-control" placeholder="Enter your aadhar_no"><br></div>';
	echo'<br><div class="col-sm-12 col-md-2">';
	echo'<input type="submit"  class="btn btn-danger" name="sub" value="OK"><a href="profile.php" style="font-size:20px;color:yellow;">Back</a></div>';
	echo'</form></div>';
	
}

if(isset($_POST['sub']))
{	
$n=$_POST['email'];
if($n=='')
	echo'<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Info!</strong> You have not entered any detail
	</div>';
else
{
	session_start();
	$_SESSION['p']=session_id();
	$_SESSION['x']=$n;
	header('location:forget.php');
}
}
?>