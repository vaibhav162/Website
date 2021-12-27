<?php
session_start();
$a= $_SESSION['a']; 
$u= $_SESSION['u']; 
$p= $_SESSION['p']; 
$ph=$_SESSION['ph'];
$e= $_SESSION['e'];
$ad=$_SESSION['ad'];
if(session_id()!=$_SESSION['reg'])
	header("location:register.php");
?>
<?php
include"connect.php";
$ch=mysqli_query($conn,"select aadhar_no from user where aadhar_no='$a'");
if(mysqli_fetch_row($ch)>0)
{
	echo'error account already exist';
	echo'<br><a href="register.php">back</a>';
}	
else
{
	$x='temp'.uniqid();
	mysqli_query($conn,"insert into user values('$a','$u','$p',$ph,'$e','$ad','',0)");
	mysqli_query($conn,"insert into bill values('$a','$x',0,0,0,0,0,0,'month')");
    session_start();
	$_SESSION['rg']=session_id();
	$_SESSION['a'] =$a;
	$_SESSION['u'] =$u;
	$_SESSION['ph']=$ph;
	$_SESSION['e'] =$e;
	$_SESSION['ad']=$ad;
	header("location:confirm.php");
}
?>