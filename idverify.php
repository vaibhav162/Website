<?php
session_start();
$x=$_SESSION['adr'];
$e=$_SESSION['email'];
if(session_id()!=$_SESSION['vid'])
header("location:admin.php");
?>
<head>
<style>
p{align:center;}
body {background-image:url("images/4.jpg");
background-size:cover;}
confirm,reject{font-size:30px;color:white;}
</style>
</head>
<?php
include"connect.php";
echo'<body><form action="" method="POST">';
$tc="select * from user where aadhar_no=$x";
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
			echo '<pre style="font-size:20px;color:white;">Aadhar_no:<input type="text" name="adr" id="a" value="'.$k[0].'" readonly><br>';
		echo 'Username :<input type="text" name="un" value="'.$k[1].'" ><br>';
		echo 'Password :<input type="text" name="pd" value="'.$k[2].'" ><br>';
		echo 'Phone    :<input type="text" name="ph" value="'.$k[3].'" ><br>';
		echo 'Email    :<input type="text" name="e" value="'.$k[4].'" ><br>';
		echo 'Address  :<input type="text" name="ad" value="'.$k[5].'" ><br>';
				echo'<img src="'.$k[6].'" height="300" width="300" >;<br>';
				echo'<input type="submit" name="confirm" value="confirm" style="font-size:20px;background-color:cyan">	<input type="submit" name="reject" value="reject" style="font-size:20px;background-color:cyan;"></form></body>';
		}
	}
}
echo' <a href="admin.php" style="font-size:23px;color:cyan">back</a>';
if(isset($_POST['confirm']))
{
	mysqli_query($conn,"update user set picid='',status='1' where aadhar_no=$x");
	mail($e,"Account verified","your acount has been verified successfully you can now login with your aadhar and password");
	header("location:admin.php");
}
if(isset($_POST['reject']))
{
	mysqli_query($conn,"update user set status='-1' where aadhar_no=$x");
	mysqli_query($conn,"delete from user where aadhar_no=$x");
	header("location:admin.php");
}
?>