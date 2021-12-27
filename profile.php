<html>
<?php
session_start();
$m=$_SESSION['us'];
if(session_id()!=$_SESSION['ch'])
{
header("location:login.php");
}

?>

<?php
function mnthsts($mon,$m)
{	include"connect.php";
	$bm=$pm='';
	
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
					$y=$k[0];
		     }
	     }
    }
	$yr=$y;
	include"connect.php";
	$tc="select billno from paydb where aadhar_no='$m' and month='$mon' and year='$yr'";
    $stc=mysqli_query($conn,$tc);
    if(!$stc)
    {
		echo'error'.mysqli_error($conn);
    }
    else
    {
		if(mysqli_fetch_row($stc)>0)
	{
		echo'  paid';
	}
	
	}
	
	
	$tc="select month from bill where aadhar_no='$m' and month='$mon' and year='$yr'";
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
			$bm=$r[0];
		}
	}
	else
		echo' bill not prepared';
	}
	
	$tc="select month from paydb where aadhar_no='$m' and month='$mon' and year='$yr'";
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
							$pm=$r[0];
						}
				}
	
		}
if($bm!=$pm)
	echo' pending';
}
?>

<?php
include"connect.php";
$tc="select picid,uname from user where aadhar_no='$m'";
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
				$img='img_avatar1.png';
			else
			$img=$r[0];
		
			$username=$r[1];
		}
	}
}
?>
<?php
include"connect.php";
	$bill='';
	$load=$rate=$pr=$nr=$amt=$tot=$y=0;
	$x=$mon='';


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
		$mon =$mth;	
		$y=$year;
	}
	}

}
	}
	else
	{
		echo'
		<div class="alert alert-danger alert-dismissible" ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>SORRY!</strong> record not available for the month-'.$mth.' year:'.$year.'
             </div>';
	}
        $mon =$mth;	
		$y=$year;
}

if(isset($_POST['pay']))
			{
				$year=$_POST['y'];
				$x='';
				if(isset($_POST['q']))
	              {
		              $r=$_POST['q'];
		              foreach($r as $k)
		                {
			                $x=$k;
		                }
	              }
				  else
				  {
					  echo'<div class="alert alert-danger alert-dismissible" ">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ERROR!</strong> PLZ!! select any month!!!!!!!
							</div>';
				  }
				$tc="select month from bill where aadhar_no='$m' and month='$x' and year='$year'";

				$stc=mysqli_query($conn,$tc);
				if(!$stc)
					{
						echo'error'.mysqli_error($conn);
					}
				else
				{
					if(mysqli_fetch_array($stc)>0)
					{
						$tc="SELECT * from bill where aadhar_no='$m' and month='$x' and year='$year'";
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
						$k[8]=$x;
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
						echo'<div class="alert alert-danger alert-dismissible" ">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ERROR!</strong> record not available for the month-'.$x.'
							</div>';
					}
				}
			
	$year=$_POST['y'];
	include"connect.php";
	
	$tc="select month from bill where aadhar_no='$m' and month='$x' and year='$year'";
$stc=mysqli_query($conn,$tc);
    if(!$stc)
    {
		echo'error'.mysqli_error($conn);
    }
    else
    {
		if(mysqli_fetch_row($stc)>0)
	{
		
	$tc="select billno,month from paydb where aadhar_no='$m' and month='$x' and year='$year'";
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
			$z=$r[0];
		}
	}
	else
		echo'<div class="alert alert-danger alert-dismissible" ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Bill not Generated</strong>
             </div>';
	}
	if($_POST['b']==$z)
	{
		echo'<div class="alert alert-danger alert-dismissible" ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong> Payment done</strong>
             </div>';
	}
	else
	{
		$year=$_POST['y'];
	$tc="select total,billno from bill where aadhar_no='$m' and month='$x' and year='$year'";
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
	$_SESSION['mnth']=$x;
	$_SESSION['year']=$year;
	$_SESSION['t']=$total;
	$_SESSION['b']=$bno;
	header("location:payment.php");
	}
}
else
	echo'<div class="alert alert-danger alert-dismissible" ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>SORRY!</strong> Bill not available!!!!!!!!
             </div>';
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
if(isset($_POST['rec']))
{
	session_start();
	$_SESSION['all']=session_id();
	$_SESSION['no']=$m;
	
	header("location:records2.php");
}

if(isset($_POST['bil']))
{
	$x='';
	if(isset($_POST['q']))
	              {
		              $r=$_POST['q'];
		              foreach($r as $k)
		                {
			                $x=$k;
		                }
	              }
				  else
				  {
					  echo'<div class="alert alert-danger alert-dismissible" ">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>ERROR!</strong> PLZ!! select any month!!!!!!!
							</div>';
				  }
	$year=$_POST['y'];
	include"connect.php";
	
	$tc="select month from bill where aadhar_no='$m' and month='$x' and year='$year'";
$stc=mysqli_query($conn,$tc);
    if(!$stc)
    {
		echo'error'.mysqli_error($conn);
    }
    else
    {
		if(mysqli_fetch_row($stc)>0)
	{
		
	$tc="select billno,month from paydb where aadhar_no='$m' and month='$x' and year='$year'";
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
			$z=$r[0];
		}
	}
	else
		echo'bill not generated';
	}
	if($_POST['b']==$z)
	{
		session_start();
		$_SESSION['bil']=session_id();
		$_SESSION['b']  =$_POST['b'];
		$_SESSION['l']  =$_POST['l'];
		$_SESSION['r']  =$_POST['r'];
		$_SESSION['pr'] =$_POST['pr'];
		$_SESSION['nr'] =$_POST['nr'];
		$_SESSION['amt']=$_POST['amt'];
		$_SESSION['t']  =$_POST['t'];
		$_SESSION['mth']=$_POST['mth'];
		$_SESSION['y']  =$_POST['y'];
		header("location:print.php");
	}
}
else
	echo'<div class="alert alert-danger alert-dismissible" ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>SORRY!</strong> Bill not available!!!!!!!!
             </div>';
	}
}
?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <style>
  body 
  {
  background-image:url(images/4.jpg);
  background-size:cover;}
  h3,h1{color:yellow;}
  
  pre{ box-shadow:0px 0px 30px #FFBF00;color:yellow;}
  strong,q{color:white;}
  
  </style>
</head>
<body>
<h1 align="center">WELCOME TO ONLINE ELECRICITY BILL PAYMENT </h1>
<form action="" method="POST">
<div class="container mt-3">
<div class="row">
<div class="col-sm-12 col-md-4">
<br><h3>Select Month to see Record</h3>
<br>
<pre>
<strong>JANUARY  </strong><input type="radio" name="q[]" value="jan"><?php mnthsts('jan',$m); ?><br>
<strong>FEBRUARY </strong><input type="radio" name="q[]" value="feb"><?php mnthsts('feb',$m); ?><br>
<strong>MARCH    </strong><input type="radio" name="q[]" value="mar"><?php mnthsts('mar',$m); ?><br>
<strong>APRIL    </strong><input type="radio" name="q[]" value="apr"><?php mnthsts('apr',$m); ?><br>
<strong>MAY      </strong><input type="radio" name="q[]" value="may"><?php mnthsts('may',$m); ?><br>
<strong>JUNE     </strong><input type="radio" name="q[]" value="jun"><?php mnthsts('jun',$m); ?><br>
<strong>JULY     </strong><input type="radio" name="q[]" value="jul"><?php mnthsts('jul',$m); ?><br>
<strong>AUGUST   </strong><input type="radio" name="q[]" value="aug"><?php mnthsts('aug',$m); ?><br>
<strong>SEPTEMBER</strong><input type="radio" name="q[]" value="sep"><?php mnthsts('sep',$m); ?><br>
<strong>OCTOBER  </strong><input type="radio" name="q[]" value="oct"><?php mnthsts('oct',$m); ?><br>
<strong>NOVEMBER </strong><input type="radio" name="q[]" value="nov"><?php mnthsts('nov',$m); ?><br>
<strong>DECEMBER </strong><input type="radio" name="q[]" value="dec"><?php mnthsts('dec',$m); ?><br></pre>
<br>
</div>
<div class="col-sm-12 col-md-4">
<input type="text" name="sm" value="<?php echo$x; ?>" style="visibility:hidden"><br>
<h3>Current month Bill Details</h3><br>

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Bill No.</span>
    </div>
    <input type="text" class="form-control" name="b" value="<?php echo$bill; ?>" readonly>
  </div>
<div class="input-group mb-3">
      <input type="text" class="form-control " id="l" name="l" value="<?php echo$load; ?>" readonly>
      <div class="input-group-append">
        <span class="input-group-text">Load</span>
      </div>
    </div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Rate</span>
    </div>
    <input type="text" class="form-control " id="r" name="r" value="<?php echo$rate; ?>" disabled>
  </div>
<div class="input-group mb-3">
      <input type="text" class="form-control " id="pr" name="pr" value="<?php echo$pr; ?>" readonly>
      <div class="input-group-append">
        <span class="input-group-text">Previous Read</span>
      </div>
    </div>
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">New Read</span>
    </div>
    <input type="text" class="form-control " id="nr" name="nr" value="<?php echo$nr; ?>" readonly>
  </div>
<div class="input-group mb-3">
      <input type="text" class="form-control" id="amt" name="amt" value="<?php echo$amt; ?>" readonly>
      <div class="input-group-append">
        <span class="input-group-text">Amount</span>
      </div>
    </div>
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">total</span>
    </div>
    <input type="text" class="form-control " id="t" name="t" value="<?php echo$tot; ?>" readonly>
  </div>
<div class="input-group mb-3">
     <input type="text" class="form-control " id="mth" name="mth" value="<?php echo$mon; ?>" readonly>
      <div class="input-group-append">
        <span class="input-group-text">Month</span>
      </div>
    </div>
	<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">year</span>
    </div>
	<input type="text" class="form-control" id="y" name="y" value="<?php echo$y; ?>" readonly>
  </div>

<input type="submit" class="btn btn-success" name="pay" value="Pay Bill">
<input type="submit" class="btn btn-info" name="bil" value="Bill report">
</div>
<div class="col-sm-12 col-md-4" id="abc">
<br><h3>PROFILE</h3>
<br>
<pre>
<img src="<?php echo$img; ?>" height="150" width="180"><br>
<?php echo$username; ?><br>
<input type="submit" class="btn btn-secondary" name="pro" value="pro"><br>
<input type="submit" class="btn btn-primary" name="rec" value="records"><br>
<input type="submit" class="btn btn-dark" name="logout" value="logout"><br>
</pre>
</div>
</form>
</div>
</div>
</body>
</html>