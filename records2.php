<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
body{  }
</style>
</head>
<?php
session_start();
$m=$_SESSION['no'];

if(session_id()!=$_SESSION['all'])
{
header("location:admin.php");
}
?>
<?php
include"connect.php";
$month=Array('month','jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec');
echo'<div class="container">
		<h1 align="center">YEARLY RECORDS</h1>
		<div class="row">
<div class="col-sm-12 col-md-4"></div>
<div class="col-sm-12 col-md-4">';
echo'<form action="" method="POST"><PRE align="center"><select name="month">';
foreach($month as $k)
{
	echo'<option value="'.$k.'">'.$k.'</option>';
}
echo'</select>';
echo'<input type="submit" name="s">';
echo"</form></PRE>";

if(isset($_POST['s']))
{
$n=$_POST['month'];	
if($n=='month')
				{
					echo'<script>alert("plz select month");</script>';
				}
				else
				{	

$year=Array('2019','2020','2021','2022','2023','2024','2025','2026','2027');
echo'<form action="" method="POST"><PRE align="center"><select name="year">';
	echo'<option value="2019" selected>2019</option>';
	echo'<option value="2020">2020</option>';
	echo'<option value="2021">2021</option>';
	echo'<option value="2022">2022</option>';
	echo'<option value="2023">2023</option>';
	echo'<option value="2024">2024</option>';
	echo'<option value="2025">2025</option>';
	echo'<option value="2026">2026</option>';
	echo'<option value="2027">2027</option>';
echo'</select>';
echo"<br><input type='text' name='m' value=".$n." style='visibility:hidden'><br>";
echo'<input type="submit" name="ys">';
echo"</form></PRE>";
}
}		
				
if(isset($_POST['ys']))
{
	$mon=$_POST['m'];
					$y=$_POST['year'];
					$tc="select month from bill where aadhar_no='$m' and month='$mon' and year='$y'";
$stc=mysqli_query($conn,$tc);
if(!$stc)
{
	echo'error'.mysqli_error($conn);
}
else
{
	if(mysqli_fetch_array($stc)>0)
	{
		$tc="select * from user where aadhar_no='$m'";
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
		echo'<form action="" method="POST">';
			while($k=mysqli_fetch_array($stc))
		{
			echo'<PRE align="center"><br><input type="text" name="ad" value="'.$k[0].'" readonly >';
			echo'<br><input type="text" name="un" value="'.$k[1].'" >';
			echo'<br><input type="text" name="p" value="'.$k[2].'" >';
			echo'<br><input type="text" name="ph" value="'.$k[3].'" >';
			echo'<br><input type="text" name="e" value="'.$k[4].'" >';
			echo'<br><input type="text" name="a" value="'.$k[5].'" >';
			echo'<br><input type="text" name="s" value="'.$k[7].'" ></PRE>';
		}
	}
}
 $tc="SELECT * from bill where aadhar_no='$m' and month='$mon'  and year='$y'";
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
		echo'<form action="" method="POST">';
	while($k=mysqli_fetch_row($stc))
	{	
				$tc="select billno from paydb where aadhar_no='$m' and month='$mon'  and year='$y'";
    $stc=mysqli_query($conn,$tc);
    if(!$stc)
    {
		echo'error'.mysqli_error($conn);
    }
    else
    {
		if(mysqli_fetch_row($stc)>0)
	{
		echo'payment done';
	}
	else
		echo'payment pending';
	}
			
			echo '<PRE align="center"><br><br>billno   :<input type="text" name="b" value="'.$k[1].'" ><br>';
		echo '<br>load     :<input type="text" id="l" name="l" value="'.$k[2].'" onblur="change()"><br>';
		echo 'rate     :<input type="text" id="r" name="r" value="'.$k[3].'" readonly><br>';
		echo 'prev read:<input type="text" id="pr" name="pr" value="'.$k[4].'" ><br>';
		echo 'new read :<input type="text" id="nr" name="nr" value="'.$k[5].'" ><br>';
		echo 'amount   :<input type="text" id="amt" name="amt" value="'.$k[6].'" ><br>';
		echo 'total    :<input type="text" id="t" name="t" value="'.$k[7].'" ><br>';
		echo 'month    :<input type="text" id="mth" name="mth" value="'.$k[8].'" ><br>';
		echo'</form></PRE></div></div></div>';
	}
	}
}
	}
	else
	{
		echo'record not available for the month:'.$mon.' year:'.$y;
	}
}
}
?>

<a href="profile.php">back</a>