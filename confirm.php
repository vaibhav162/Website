<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	.card{ background-color:black; }
	body {background-image:url("images/4.jpg");
	background-size:cover;}
</style>
</head>

<?php
			session_start();
			$a=$_SESSION['a']; 
			$u=$_SESSION['u']; 
			$ph=$_SESSION['ph'];
			$e=$_SESSION['e'] ;
			$ad=$_SESSION['ad'];
			if(session_id()!=$_SESSION['rg'])
			{	
					header("location:login.php");
			}
?>

<?php
$fd='img_avatar1.png';
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
			echo'file format not supported';
	}
	else
		echo'no image uploaded';
	
	
	include"connect.php";
	mysqli_query($conn,'update user set picid="'.$fd.'" where aadhar_no="'.$a.'"');
	echo'
	<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong>
	Congrats '.$u.' ,your details is submitted successfully
	and you will recieve a confirmation after the 
	verification is completed on your<br>
	phone:'.$ph.'<br>email:'.$e.'<br>
<a href="end.php">Login</a>	
</div>';
	echo'';
	ini_set("SMTP","mail.example.com");
ini_set("smtp_port","25");
ini_set('sendmail_from', 'example@YourDomain.com');
	mail($e,"Account created","you will recieve a confirmation email to login easily");
}
?>

<body>
<div class="container-fluid">
<form method="POST" action="" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-12 col-md-12"></div>
</div>
<div class="row">
<div class="col-sm-12 col-md-4"></div>
<div class="col-sm-12 col-md-4">
<div class="card" style="width:350px">
    <img class="card-img-top" src="<?php echo$fd; ?>" alt="Card image" style="width:100%">
    <div class="card-body" style="background-color:black">
      <h4 class="card-title" align="center" style="color:white;">Verification Document</h4>
	  <div class="form-group col-xs-12" align="center">
	  <font color="red">Please upload a document as a proof for address verification</font><br><br>
      <input type="file" class="form-control-file border" name="m" style="background-color:grey;color:white;"><br>
      <input type="submit"  class="btn btn-danger" value="upload" name="s">
	  </div>
	  <a href="register.php">New user? click here to create account</a>
      </form>
    </div>
  </div>
</div>
</div>
<div class="row">
<div class="col-sm-12 col-md-12"></div>
</div>
</div>
</form>
</body>
</html>