<html>
<head>
<?php

session_start();
if(isset($_SESSION['ad']))	
header("location:admin.php");	
if(isset($_SESSION['us']))
  {
	  header("location:profile.php");
      header("location:payment.php");
  }
?>
<?php
if(isset($_GET['alert']))
    {
         echo'
			<div class="alert alert-danger alert-dismissible" ">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>ERROR!</strong> empty login-id and password
            </div>';
    }
if(isset($_GET['pas']))
    {
         echo'
			 <div class="alert alert-danger alert-dismissible" ">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			 <strong>ERROR!</strong> empty  password
             </div>';
    }
if(isset($_GET['alert2']))
    {
         echo'
		        <div class="alert alert-danger alert-dismissible" ">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>ERROR!</strong> Wrong!!! login-id and password
                </div>';
    }
?>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.card{ background-color:black; }
body {background-image:url(images/4.jpg);background-size:cover;}
</style>
</head>
<body>

<div class="container-fluid">

	<form action="check.php" method="POST" >
			<div class="row">
					<div class="col-sm-12 col-md-4"></div>
					<div class="col-sm-12 col-md-4">
							<div class="card" style="width:480px">
									<img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
									<div class="card-body" style="background-color:black">
									<h4 class="card-title" align="center" style="color:white;">LOGIN HERE</h4>
									<div class="form-group col-xs-12">
										<input class="form-control" id="inputdefault" name="l" placeholder="enter your aadhar number" type="text">
									</div>
									<div class="form-group col-xs-12">
										<input class="form-control" type="password" name="p" placeholder="enter your password" size="30" >
									</div>
									<div class="form-group col-xs-12" align="center">
										<button type="submit" class="btn btn-success" name="lo"><span class="glyphicon glyphicon-envelope"></span>LOGIN</button>
										<input type="submit"  class="btn btn-danger" value="forget password" name="fp">
									</div>
								<a href="register.php">New user? click here to create account</a>  
								<a href="index.php" 
								class="btn btn-success" style="position:absolute;top:90%;left:65%;"><span class="glyphicon glyphicon-header"></span>OME</a>
								
									</div>
							</div>
									</div>
			<!--<div class="row">
			    <div class="col-sm-12 col-md-4"></div>
			<div class="col-sm-12 col-md-4">
						<a href="index.php" class="btn btn-success btn-lg" style="position:absolute;top:90%;left:40%;">
						<span class="glyphicon glyphicon-header"></span>OME
						</a>
			</div>
            </div>-->
					</div>
	
	</form>


</div>
</body>
</html>
