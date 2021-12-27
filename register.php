<?php
if(isset($_POST['h']))
{
	header("location:index.php");
}
$adh=$un=$p=$ph=$e=$a=$ac=''; 
$as=$us=$ps=$phs=$es=$ads='';
$ar=$ur=$pr=$phr=$er=$adr=0;
if(isset($_POST['s']))
{
	$adh=$_POST['a'];
	$un =$_POST['u'];
	$p  =$_POST['p'];
	$ph =$_POST['ph'];
	$e  =$_POST['e'];
	$a  =$_POST['ad'];
	$ac ='/^[0-9]{12,12}$/';
	if(!preg_match($ac,$adh))
	{
		$as='error';
	}
	else
	{
		$as='';
		$ar=1;
	}
	if($un=="")
	{
		$us="error";
	}
	else
	{
		$us="";
		$ur=1;
	}
	$pc='/^[0-9a-zA-Z._-]{6,30}$/';
	if(!preg_match($pc,$p))
	{
		$ps="error";
	}
	else
	{
		$ps="";
		$pr=1;
	}
	$phc='/^[0-9]{10,10}$/';
	if(!preg_match($phc,$ph))
	{
		$phs="error";
	}
	else
	{
		$phs="";
		$phr=1;
	}
    $ec='/^[a-zA-Z0-9._-]+\@[a-zA-Z0-9]+\.[a-zA-Z.]{2,10}$/';
	if(!preg_match($ec,$e))
	{
		$es="error";
	}
	else
	{
		$es="";
		$er=1;
	}
	if($a=='')
	{
		$ads='error';
	}
	else
	{
		$ads="";
		$adr=1;
	}
	
  if($ar==1 && $ur==1 && $pr==1 && $phr1=1 && $er==1 && $adr==1)
  {
	  session_start();
	  $_SESSION['reg']=session_id();
	  $_SESSION['a']  =$adh;
	  $_SESSION['u']  =$un;
	  $_SESSION['p']  =$p;
      $_SESSION['ph'] =$ph;
      $_SESSION['e']  =$e;
      $_SESSION['ad'] =$a;	  
 header("location:getconn.php");
  }
  else
	  echo'<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>ERROR!!</strong> Please fill the form correctly
</div>';
}
?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body{
background-image: url("images/4.jpg");
background-size: cover;
background-repeat: no-repeat;
    background-attachment: scroll;
	position:relative;
}
span{color:red;}
</style>
</head>
<body>
<div class="container-fluid">
<h2 align="center" style="color:yellow;">REGISTER YOURSELF</h2>
<hr></hr>
<form action="" method="POST"  enctype="multipart/form-data" id="f" >

<div class="row">
<div class="col-sm-12 col-md-4"></div>
<div class="col-sm-12 col-md-4">
<input type="text"  class="form-control form-control"   placeholder="Aadhar no." id="a"      value="<?php echo$adh; ?>" name="a" maxlength="12"><span><?php echo$as; ?></span><br><br>
</div></div>
<div class="row">
<div class="col-sm-12 col-md-4"></div>
<div class="col-sm-12 col-md-4">
<input type="text"  class="form-control form-control"   placeholder="Username"   id="u"      value="<?php echo$un; ?>" name="u" ><span><?php echo$us; ?></span><br><br>
</div></div>
<div class="row">
<div class="col-sm-12 col-md-4"></div>
<div class="col-sm-12 col-md-4">
<input type="Password" placeholder="Password"   id="p" class="form-control form-control"      name="p" ><span><?php echo$ps; ?></span><br><br>
</div></div>
<div class="row">
<div class="col-sm-12 col-md-4"></div>
<div class="col-sm-12 col-md-4">
<input type="text"     placeholder="Phone no."  id="ph"  class="form-control form-control"   value="<?php echo$ph; ?>" name="ph" maxlength="10" ><span><?php echo$phs; ?></span><br><br>
</div></div>
<div class="row">
<div class="col-sm-12 col-md-4"></div>
<div class="col-sm-12 col-md-4">
<input type="email"    placeholder="example@mail.co" class="form-control form-control" id="e" value="<?php echo$e; ?>" name="e"><span><?php echo$es; ?></span><br><br>
</div></div>
<div class="row">
<div class="col-sm-12 col-md-4"></div>
<div class="col-sm-12 col-md-4">
<input type="text"     placeholder="Address"    id="ad"  class="form-control form-control"   value="<?php echo$a; ?>" name="ad" ><span><?php echo$ads; ?></span><br><br>
</div></div>
<div class="row">
<div class="col-sm-12 col-md-4"></div>
<div class="col-sm-12 col-md-4">
<input type="submit" name='s' class="btn btn-success" value="Register">
<input type='submit' name='h' id='h' class="btn btn-primary" value='Home' style='font-size:20px;color:white;'>
<a href="login.php" style="color:white;font-size:20px;"><b>Already registered</b></a>
</div></div>
</form>
</div>

  <!--<a href="index.php" class="btn btn-info btn-sm" style="position:absolute;top:90%;left:45%;">HOME</a>-->
</body>