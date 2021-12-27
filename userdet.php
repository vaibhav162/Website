<html>
<?php
session_start();
$z=$_SESSION['key'];
if(session_id()!=$_SESSION['uid'])
	header('location:login.php');
?>

<?php
$fd='';
if(isset($_POST['s']))
{
	if($_FILES['m']['name']!='')
	{
		$in=$_FILES['m']['name'];
		$l=strlen($in);
		$d=strripos($in,'.');
		$sub=substr($in,$d+1,$l-$d+1);
		$all=Array('jpg','bmp','png');
		if(in_array($sub,$all))
		{
		$in=$_FILES['m']['name'];	
		$ta=$_FILES['m']['tmp_name'];
		$fd='images/'.uniqid().''.$in;
		move_uploaded_file($ta,$fd);
		}
		else
			echo'<div class="alert alert-danger alert-dismissible" ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>ERROR!</strong> File format not supported
             </div>';
	}
	else
		echo'<div class="alert alert-danger alert-dismissible" ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>ERROR!</strong> update profile
             </div>';
	include"connect.php";
	mysqli_query($conn,'update user set picid="'.$fd.'" where aadhar_no="'.$z.'"');
}
?>

<?php
$ad=0;
$un=$ps=$ph=$e=$a=$img=''; 


include"connect.php";
$tc="select * from user where aadhar_no='$z'";
$stc=mysqli_query($conn,$tc);
if(!$stc)
{
	echo'error'.mysqli_error($conn);
}
else
{
	if(mysqli_fetch_row($stc)>0)
	{
		$stc=mysqli_query($conn,$tc);
		while($r=mysqli_fetch_row($stc))
		{
			if($r[6]=='')
			{
				echo'<div class="alert alert-danger alert-dismissible" ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>ERROR!</strong> update profile pic
             </div>';
			}
			else
			{
				$img=$r[6];
			}
			$ad=$r[0];
			$un=$r[1];
			$ps=$r[2];
			$ph=$r[3];
			$e =$r[4];
			$a =$r[5];
			
		}
	}
}
if(isset($_POST['up']))
{
	$u=$_POST['un'];
	$p=$_POST['p'];
	$ph=$_POST['ph'];
	$e=$_POST['e'];
	$a=$_POST['a'];
	mysqli_query($conn,'update user set uname="'.$u.'",password="'.$p.'",phone="'.$ph.'",email="'.$e.'",address="'.$a.'" where aadhar_no="'.$z.'"');
	header("location:userdet.php");
}

?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {background-color:blue;}

</style>
</head>
<body>
<div class="container-fluid">
<form action="" method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-12 col-md-3"></div>
<div class="col-sm-12 col-md-6">
<br>
<pre style="background-color:magenta;color:green;" align="center">
<h4 style="color:white">select image:</h4>
<input type="file" name="m" style="position:absolute;left:40%;"><br>
<input type="submit" name="s" value="upload"><br>
<img src="<?php echo$img; ?>" width="100" height="100"><br><br></pre>

<pre align="center" style="background-color:green;">
<input type="text" name="ad" value="<?php echo$ad; ?>" disabled><br><br>
<input type="text" name="un" value="<?php echo$un; ?>" > <br><br>
<input type="text" name="p"  value="<?php echo$ps; ?>" > <br><br>
<input type="text" name="ph" value="<?php echo$ph; ?>" > <br><br>
<input type="text" name="e"  value="<?php echo$e; ?>" >  <br><br>
<input type="text" name="a"  value="<?php echo$a; ?>" >  <br><br>
<input type="submit" class="btn btn-primary" name="up" value="update">
<br><a href="profile.php" style="color:white">back</a></pre>
</div>

</div>
</div>
</form>
</body>
</html>