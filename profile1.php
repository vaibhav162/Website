<?php
session_start();
$m=$_SESSION['us'];
if(session_id()!=$_SESSION['ch'])
{
header("location:login.php");
}

?>
<?php
include"connect.php";
$tc="select picid from user where aadhar_no='$m'";
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
			if($r[0]=='')
				echo'upload profile pic';
			else
				echo'<img src="'.$r[0].'" height="100" width="100">';
		}
	}
}
?>
<?php
include"connect.php";
	$bill='';
	$load=$rate=$pr=$nr=$amt=$tot=$y=0;
	$mon='';


$tc="select MONTH(CURDATE())";
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
			$mn=$k[0];
		}
	}
}
	$mont=Array('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec');
	$mth=$mont[$mn-1];


$tc="select YEAR(CURDATE())";
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
			$yr=$k[0];
		}
	}
}

$year=$yr;

	
$tc="select month from bill where aadhar_no='$m' and month='$mth' and year='$year'";
$stc=mysqli_query($conn,$tc);
if(!$stc)
{
	echo'error'.mysqli_error($conn);
}
else
{
	if(mysqli_fetch_array($stc)>0)
	{
		 $tc="SELECT * from bill where aadhar_no='$m' and month='$mth' and year='$year'";
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
	$bill='';
	$load=$rate=$pr=$nr=$amt=$tot=$y=0;
	$mon='';
		$bill=$k[1];
		$load=$k[2];
		$rate=$k[3];
		$pr  =$k[4];
		$nr  =$k[5];
		$amt =$k[6];
		$tot =$k[7];
		$mon =$k[8];	
		$y=$k[9];
	}
	}
}
	}
	else
	{
		echo'record not available for the month-'.$mth.' year:'.$year;
	}
}







$month=Array('month','jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec');




if(isset($_POST['s']))
			{
				$year=$_POST['y'];
				$n=$_POST['month'];
				if($n=='month')
				{
					echo'<script>alert("plz select month");</script>';
				}
				else
				{
					$tc="select month from bill where aadhar_no='$m' and month='$n' and year='$year'";
$stc=mysqli_query($conn,$tc);
if(!$stc)
{
	echo'error'.mysqli_error($conn);
}
else
{
	if(mysqli_fetch_array($stc)>0)
	{
		 $tc="SELECT * from bill where aadhar_no='$m' and month='$n' and year='$year'";
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
	while($k=mysqli_fetch_row($stc))
	{	
		$bill='';
	$load=$rate=$pr=$nr=$amt=$tot=$y=0;
	$mon='';
	
	$tc="select billno from paydb where aadhar_no='$m' and month='$n' and year='$year'";
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
	
	
	
		$bill=$k[1];
		$load=$k[2];
		$rate=$k[3];
		$pr  =$k[4];
		$nr  =$k[5];
		$amt =$k[6];
		$tot =$k[7];
		$mon =$k[8];
		$y=$k[9];
	}
	}
}
	}
	else
	{
		echo'record not available for the month-'.$n;
	}
}
}
}

if(isset($_POST['pay']))
{
	$n=$_POST['mth'];
	$year=$_POST['y'];
	include"connect.php";
	$tc="select billno from paydb where aadhar_no='$m' and month='$n' and year='$year'";
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
			$x=$r[0];
		}
	}
	}
	if($_POST['b']==$x)
	{
		echo'already paid';
	}
	else
	{
		$n=$_POST['mth'];
		$year=$_POST['y'];
	$tc="select total,billno from bill where aadhar_no='$m' and month='$n' and year='$year'";
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
			$total=$r[0];
			$bno=$r[1];
		}
	}
	}
	session_start();
	$_SESSION['bank']=session_id();
	$_SESSION['adh']=$m;
	$_SESSION['mnth']=$n;
	$_SESSION['year']=$year;
	$_SESSION['t']=$total;
	$_SESSION['b']=$bno;
	header("location:payment.php");
	}
}
if(isset($_POST['logout']))
{
	header('location:end.php');
}
if(isset($_POST['pro']))
{
	session_start();
	$_SESSION['uid']=session_id();
	$_SESSION['key']=$m;
	header('location:userdet.php');
}
if(isset($_POST['record']))
{
	session_start();
	$_SESSION['all']=session_id();
	$_SESSION['no']=$m;
	header("location:records.php");
}
?>
<form action="" method="POST">
<select name="month">
<?php
foreach($month as $k)
echo'<option value="'.$k.'">'.$k.'</option>';
?>
</select>
<input type="submit" name="s">
<input type="submit" name="pro" value="pro">
<input type="submit" name="record" value="records"><br>
<input type="submit" name="logout" value="logout"><br>


billno   :<input type="text" name="b" value="<?php echo$bill; ?>" ><br>
load     :<input type="text" id="l" name="l" value="<?php echo$load; ?>"><br>
rate     :<input type="text" id="r" name="r" value="<?php echo$rate; ?>" readonly><br>
prev read:<input type="text" id="pr" name="pr" value="<?php echo$pr; ?>" ><br>
new read :<input type="text" id="nr" name="nr" value="<?php echo$nr; ?>" ><br>
amount   :<input type="text" id="amt" name="amt" value="<?php echo$amt; ?>" ><br>
total    :<input type="text" id="t" name="t" value="<?php echo$tot; ?>" ><br>
month    :<input type="text" id="mth" name="mth" value="<?php echo$mon; ?>" ><br>
year    :<input type="text" id="y" name="y" value="<?php echo$y; ?>" ><br>
<input type="submit" name="pay" value="pay">
</form>