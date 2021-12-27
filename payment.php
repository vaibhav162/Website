<?php
session_start();
$total=$_SESSION['t'];
$adhar=$_SESSION['adh'];
$billno=$_SESSION['b'];
$month=$_SESSION['mnth'];
$year=$_SESSION['year'];
if(session_id()!=$_SESSION['bank'])
	{
		header("location:profile.php");
	}
?>

<?php

		$mon=Array('01','02','03','04','05','06','07','08','09','10','11','12');

?><h2 style="font-size:30px;color:yellow;text-align:center">Pay Your Bill</h2>
			
<?php

$cns=$ms=$ys=$cvs=$nocs='';
$cnr=$mr=$yr=$cvr=$nocr=0;
$cn=$mm=$yy=$cv=$nc=$ac='';
if(isset($_POST['pay']))
{
	$cn=$_POST['cn'];
	$mm=$_POST['m'];
	$yy=$_POST['y'];
	$cv=$_POST['cvv'];
	$nc=$_POST['noc'];
	$ac='/^[0-9]{0,16}$/';
	if(!preg_match($ac,$cn))
	{
		$cns="error";
	}
	else
	{
		$cns="";
		$cnr=1;
	}
	if($mm=='month')
	{
		$ms="error";
	}
	else
	{
		$ms="";
		$mr=1;
	}
	if($yy=='year')
	{
		$ys="error";
	}
	else
	{
		$ys="";
		$yr=1;
	}
	if($cv=="")
	{
		$cvs="error";
	}
	else
	{
		$cvs="";
		$cvr=1;
	}
	if($nc=="")
	{
		$nocs="error";
	}
	else
	{
		$nocs="";
		$nocr=1;
	}
	if($cnr==1 && $mr==1 && $yr==1 && $cvr==1 && $nocr==1)
	{
	session_start();
	$_SESSION['gate']=session_id();
	$_SESSION['total']=$total;
	$_SESSION['month']=$month;
	$_SESSION['yr']=$year;
	$_SESSION['cn']=$cn;
	$_SESSION['a']=$adhar;
	$_SESSION['bill']=$billno;
	header("location:paydb.php");
	}
	else
	{
		echo'<script>alert("error occured");</script>';
	}
}
?>
<script>
function acheck()
{
	a=document.getElementById("cn").value;
	ac=/^[0-9]{0,16}$/;
	if(!a.match(ac))
	{
		document.getElementById("msg").innerHTML="error";
	}
	else
	{
		document.getElementById("msg").innerHTML="";
		return 1;
	}
}
function mm()
{
	a=document.getElementById("m").value;
	if(a=="month")
	{
		document.getElementById("sm").innerHTML="error";
	}
	else
	{
		document.getElementById("sm").innerHTML="";
		return 1;
	}
}
function yy()
{
	a=document.getElementById("y").value;
	if(a=="year")
	{
		document.getElementById("ys").innerHTML="error";
	}
	else
	{
		document.getElementById("ys").innerHTML="";
		return 1;
	}
}
function cv()
{
	a=document.getElementById("cvv").value;
	ac=/^[0-9]{3,3}$/;
	if(!a.match(ac))
	{
		document.getElementById("cs").innerHTML="error";
	}
	else
	{
		document.getElementById("cs").innerHTML="";
		return 1;
	}
}
function nam()
{
	a=document.getElementById("noc").value;
	ac=/^[a-zA-Z ]{1,30}$/;
	if(!a.match(ac))
	{
		document.getElementById("ns").innerHTML="error";
	}
	else
	{
		document.getElementById("ns").innerHTML="";
		return 1;
	}
}

function check()
{
	if(acheck()==1 && mm()==1 && yy()==1 && cv()==1 && nam()==1)
	{
	       document.getElementById("pay").onclick="";
	}
    else
	{  
		acheck();
		mm();
		yy();
		cv();
		nam();
	}
	
	
}
</script>
<style>
body {background-image:url("images/3.jpg");
background-size:cover;}
input{font-size:20px;}
</style>
<body>
<div class="row">
<div class="col-sm-12 col-md-4"></div>
<div class="col-sm-12 col-md-4">
			<form action="" method="POST" id="f">
			<br><br>
			<?php 
			echo'<pre align="center" style="background-color:rgba(0,0,0,0.5);font-size:20px;color:white;"><br>Total .:&nbsp; <input type="text" name="ad" value="'.$total.'" readonly >';
			    echo'<br>Bill no.: <input type="text" name="un" value="'.$billno.'" >';
			     echo'<br>Month :   <input type="text" name="p" value="'.$month.'" ></pre>';
						//echo'Total:-₹'.$total; 
						//echo'<br>Bill no.:-'.$billno;
						//echo'<br>MONTH.:-'.$month;
			?>
			<br><br>
<input type="text" id="cn" name="cn" placeholder="Enter your card number" size="30" maxlength="16" onkeyup="acheck()" required><span id="msg"><?php echo$cns; ?></span><br><br>
<select name="m" id="m" onchange="mm()">
<option value="month">Month</option>
<?php
				foreach($mon as $k)
							{
								echo'<option value="'.$k.'">'.$k.'</option>';
							}
?>
</select>
<span id="sm"><?php echo$ms; ?></span>&nbsp;&nbsp;

<select name="y" id="y" onchange="yy()">
<option value="year">Year</option>
<?php
			for($i=18;$i<=40;$i++)
			{
				echo'<option value="'.$i.'">'.$i.'</option>';
			}
?>
</select>
<span id="ys"><?php echo$ys; ?></span>&nbsp;&nbsp;
<input type="text" id="cvv" name="cvv" placeholder="CVV" size="3" maxlength="3" onblur="cv()" required><span id="cs"><?php echo$cvs; ?></span>&nbsp;&nbsp;<br><br>
<input type="text" id="noc" name="noc" placeholder="Name on card" size="30" onblur="nam()" required><span id="ns"><?php echo$cns; ?></span>&nbsp;&nbsp;<br><br>
<input type="submit" name="pay" id="pay" value="Pay now" onclick="check()" style="font-size:20px;background-color:cyan;">&nbsp;&nbsp;<a href="profile.php" style="font-size:20px;color:cyan;">logout</a>
</form>
</body>
