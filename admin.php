<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

	body{background-image:url("images/4.jpg");
                     background-size:cover;
					 background-repeat: no-repeat;}

</style>
</head>
<?php
	session_start();
	$m=$_SESSION['ad'];
		if(session_id()!=$_SESSION['aid'])
			{
				header("location:login.php");
			}
?>

<?php
		if(isset($_GET['alert']))
		{
         echo'
		 <div class="alert alert-danger alert-dismissible" ">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>VERIFIED</strong> 
            </div>';
		}
		
		if(isset($_GET['alert1']))
		{
         echo'
		 <div class="alert alert-danger alert-dismissible" ">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>VERIFICATION FAILED</strong> 
             </div> ';
		}
		if(isset($_GET['ins']))
		{
         echo'
		 <div class="alert alert-danger alert-dismissible" ">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>record updated</strong> 
             </div> ';
		}
		if(isset($_GET['del']))
		{
         echo'
		 <div class="alert alert-danger alert-dismissible" ">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>deleted</strong> 
             </div>';
		}
		if(isset($_GET['upd']))
		{
         echo'
		 <div class="alert alert-danger alert-dismissible" ">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>updated</strong> 
             </div>';
		}
?>
<?php
echo'<form action="" method="POST">
					<div class="container">
					<h1 align="center" style="color:yellow;">WELCOME ADMIN</h1>
					<div class="row">
					<div class="col-sm-12 col-md-4"></div>
					<div class="col-sm-12 col-md-4">';
include"connect.php";
	$tc="select aadhar_no from user";
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
					
					echo'<pre align="center"><select name="detail">';
							
							while($k=mysqli_fetch_array($stc))
								{
									echo'<option value="'.$k[0].'">'.$k[0].'</option>';
								}
					echo'</select>';
					echo'<input type="submit" class="btn btn-primary" name="s">';
					include"connect.php";
				}
			else
					echo'<h2 align="center" style="color:red;">There is no record</h2>';
		}
	echo'<a href="end.php"  class="btn btn-success btn-primary">logout</a>';
	echo"</form></pre>";

if(isset($_POST['s']))
			{	
				$n=$_POST['detail'];
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
							echo'<form action="" method="POST">';
								while($k=mysqli_fetch_array($stc))
							{
								$mn=$k[0];
							}
						}
					}
	
	$month=Array('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec');
	$mth=$month[$mn-1];

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

$tc='SELECT * from user where aadhar_no="'.$n.'"';
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
	while($r=mysqli_fetch_row($stc))
	{
		echo'<pre align="center" style="background-color:violet"><br>Aadhar no.:<input type="text" name="ad" value="'.$r[0].'" readonly >';
			echo'<br>name      :<input type="text" name="un" value="'.$r[1].'" >';
			echo'<br>password  :<input type="text" name="p" value="'.$r[2].'" >';
			echo'<br>phone     :<input type="text" name="ph" value="'.$r[3].'" >';
			echo'<br>email     :<input type="text" name="e" value="'.$r[4].'" >';
			echo'<br>address   :<input type="text" name="a" value="'.$r[5].'" >';
			echo'<br>status    :<input type="text" name="s" value="'.$r[7].'" >';
			echo '<br><br><input type="submit" class="btn btn-danger" name="up" value="update">';
		echo '    <input type="submit" name="ver" class="btn btn-dark" value="verify"></pre>';
	}
	}
}

$tc='SELECT month from bill where month="'.$mth.'" and aadhar_no="'.$n.'" and year="'.$year.'"';
$stc=mysqli_query($conn,$tc);
if(!$stc)
{
	echo'error'.mysqli_error($conn);	
}
else
{   
    if(mysqli_fetch_row($stc)>0)
    {
	    $tc='SELECT * from bill where aadhar_no="'.$n.'" and month="'.$mth.'" and year="'.$year.'"';
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
					while($r=mysqli_fetch_row($stc))
					{
						$tc="select billno from paydb where aadhar_no='$n' and month='$mth' and year='$year'";
				$stc=mysqli_query($conn,$tc);
				if(!$stc)
				{
						echo'error'.mysqli_error($conn);
				}
				else
				{
						if(mysqli_fetch_row($stc)>0)
					{
						echo'<div class="alert alert-success alert-dismissible" ">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>PAYMENT DONE</strong>
						</div>';
					}
					else
						echo'<div class="alert alert-danger alert-dismissible" ">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>PENDING PAYMENT</strong> 
						</div>';
					}
							
						$r[8]=$mth;
						echo '<pre align="center" style="background-color:blue;color:magenta;"><br><br>billno   :<input type="text" name="b" value="'.$r[1].'" ><br>';
						echo 'aadhar   :<input type="text" name="adr" value="'.$r[0].'" ><br>';
						echo '<br>rate     :<input type="text" id="r" name="r" value="'.$r[3].'" readonly><br>';
						echo 'load     :<input type="text" id="l" name="l" value="'.$r[2].'" onblur="change()"><br>';
						echo 'prev read:<input type="text" id="pr" name="pr" value="'.$r[4].'" ><br>';
						echo 'new read :<input type="text" id="nr" name="nr" value="'.$r[5].'" ><br>';
						echo 'amount   :<input type="text" id="amt" name="amt" value="'.$r[7].'" ><br>';
						echo 'total    :<input type="text" id="t" name="t" value="'.$r[7].'" ><br>';
						echo 'month    :<input type="text" id="mth" name="mth" value="'.$r[8].'" ><br>';
						echo 'year     :<input type="text" id="y" name="y" value="'.$year.'" ><br><br>';
						echo '<input type="submit" class="btn btn-secondary" name="ins" value="insert">';
						echo '  <input type="submit" class="btn btn-primary" name="rec" value="records">';
					}
					echo'   <input type="submit" class="btn btn-danger" value="delete" name="del"></pre>';
					echo'</form></pre>';
				}
			}
	}
	else
	{
		echo'<pre align="center" style="background-color:blue;color:magenta;"><form action="" method="POST">';
		$r[8]=$mth;
		echo '<br><br>billno   :<input type="text" name="b" value="0" ><br>';
		echo 'aadhar   :<input type="text" name="adr" value="'.$n.'" ><br>';
		echo '<br>rate     :<input type="text" id="r" name="r" value="0" ><br>';
		echo 'load     :<input type="text" id="l" name="l" value="0" onkeyup="change()"><br>';
		echo 'prev read:<input type="text" id="pr" name="pr" value="0" ><br>';
		echo 'new read :<input type="text" id="nr" name="nr" value="0" ><br>';
		echo 'amount   :<input type="text" id="amt" name="amt" value="0" ><br>';
		echo 'total    :<input type="text" id="t" name="t" value="0" ><br>';
		echo 'month    :<input type="text" id="mth" name="mth" value="'.$r[8].'" ><br>';
		echo 'year     :<input type="text" id="y" name="y" value="'.$year.'" ><br><br>';
		echo '<input type="submit" class="btn btn-secondary" name="ins" value="insert">';
		echo '   <input type="submit" class="btn btn-primary" name="rec" value="records">';
		echo'   <input type="submit" class="btn btn-danger" value="delete" name="del"></pre>';
		echo'</form></div></div></div>';
	}
}
}	
if(isset($_POST['ins']))
{
	
	$l=$_POST['l'];
	$r=$_POST['r'];
	$pr=$_POST['pr'];
	$nr=$_POST['nr'];
	$am=$_POST['amt'];
	$b='JH'.uniqid();
	$t=$_POST['t'];
	$a=$_POST['adr'];
	$mon=$_POST['mth'];
	$y=$_POST['y'];
	
	include"connect.php";
	mysqli_query($conn,'delete from bill where aadhar_no="'.$a.'" and month="month" and year="0"');
	mysqli_query($conn,'delete from bill where aadhar_no="'.$a.'" and month="'.$mon.'" and year="'.$y.'"');
    mysqli_query($conn,"insert into bill values('$a','$b',$l,$r,$pr,$nr,$am,$t,'$mon',$y)");
	mail($e,"new BILL generated","pay now ");
	header("location:admin.php?ins");
}	 
if(isset($_POST['up']))
{
	$v=$_POST['s'];
	$a=$_POST['ad'];
	$u=$_POST['un'];
	$p=$_POST['p'];
	$ph=$_POST['ph'];
	$e=$_POST['e'];
	if($v==0)
	{
		echo'<script>alert("verification not done plz verify");</script>';
	}
	else if($v==-1)
	{
		echo'<script>alert("verification failed plz delete the record");</script>';
	}
	else
	{	
	mysqli_query($conn,'update user set uname="'.$u.'",password="'.$p.'",phone="'.$ph.'",email="'.$e.'" where aadhar_no="'.$a.'"');
    header("location:admin.php?upd");
	}
}
if(isset($_POST['ver']))
{ 
	$e=$_POST['e'];
	$n=$_POST['ad'];
	$vs=$_POST['s'];
	if($vs==1)
	{
		echo'<div class="alert alert-success alert-dismissible" ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>VERIFIED</strong>
             </div>';
		header("location:admin.php?alert");
	}
	else if($vs==-1)
	{
			 header("location:admin.php?alert1");
	}
	else
	{
	session_start();
	$_SESSION['vid']=session_id();
	$_SESSION['adr']=$n;
	$_SESSION['email']=$e;
	header("location:idverify.php");
	}
}
if(isset($_POST['del']))
{
	$a=$_POST['adr'];
mysqli_query($conn,'delete from bill where aadhar_no="'.$a.'"');
mysqli_query($conn,'delete from user where aadhar_no="'.$a.'"');
header("location:admin.php?del");
}
if(isset($_POST['rec']))
{
	$a=$_POST['adr'];
	$m=$_POST['mth'];
	$y=$_POST['y'];
	session_start();
	$_SESSION['all']=session_id();
	$_SESSION['no']=$a;
	$_SESSION['month']=$m;
	$_SESSION['year']=$y;
	header("location:records.php");
}
?>
<!--a div class="col-sm-12 col-md-12">
<href="end.php" class="btn btn-success btn-lg" style="position:absolute;top:90%;left:40%;">
      <span></span>LOGout
    </a>
</div>-->
<script>
function change()
{
	$l=document.getElementById("l").value;
    $nr=document.getElementById("nr").value;
	document.getElementById("pr").value=$nr;
	document.getElementById("nr").value=$l;
	$r=document.getElementById("r").value;
	$amt=$l*$r;
	document.getElementById("amt").value=$amt;
	document.getElementById("t").value=+$amt+$amt*0.01;
}
</script>
<body>

</body>
</html>