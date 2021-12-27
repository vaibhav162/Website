<html>
<head><title>HOME</title>
<link rel="icon" href="logo.jpg" >
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
body {
background-image:url("images/4.jpg");
background-size:cover;
}
#but{ position:absolute;top:0%;right:0%;background-color:rgba(0,0,0,0.5);width:3%;height:5%;text-align:center;color:red;font-size:1.5vw;padding-bottom:5px; }
a{color:white;}
a:hover{
  color: yellow;
}
h1{color:yellow;text-align:center;font-size:4vw;}
p{color:white;text-align:center;}
marquee{color:red;}
#cpr{background-color:yellow;}
#notice{background-color:red;}
#box{background-color:cyan;}
#box1{background-color:pink;}
#logo{ position:absolute;left:0%;top:0%; }
#info{ position:absolute;left:12.5%;top:5%;width:75%;background-color:gray;visibility:hidden;box-shadow:0px 0px 150px 150px black; }
#pp{ position:absolute;left:12.5%;top:5%;width:75%;background-color:gray;visibility:hidden;box-shadow:0px 0px 150px 150px black; }
#dis{ position:absolute;left:12.5%;top:5%;width:75%;background-color:gray;visibility:hidden;box-shadow:0px 0px 150px 150px black; }
</style>
<script>
function visi1()
{
document.getElementById("pp").style.visibility="visible";
}
function visi2()
{
document.getElementById("dis").style.visibility="visible";
}
function xxx()
{
document.getElementById("pp").style.visibility="hidden";
document.getElementById("dis").style.visibility="hidden";
}
</script>
<body>
<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
  <div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
    <a class="navbar-brand" href="#">ELECTICITY BILL MANAGEMENT</a>
  </div>
  <div class="collapse navbar-collapse" id="mynavbar">
  <ul class="nav navbar-nav">
	<li class="active"><a href="#">Home</a></li>
	<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">New Features<span class="caret"></span></a>
	<ul class="dropdown-menu">
	<li><a href="calc.php" target="blank">Calculator</a></li>
	</ul>
	</li>
	<li><a href="aboute.php">About Us</a></li>
	<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">CONTACT<span class="caret"></span></a>
	<ul class="dropdown-menu">
	<li><img src="watsap.png" height="40" width="25">7352400868</a></li>
	<li><img src="Gmail.png"  height="40" width="25">Prashant@gmail.com</a></li>
	<li><img src="ma.png"     height="40" width="25">cr7.fb.in</a></li>
	</ul>
	</li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
	<li><a href="register.php"><span class="glyphicon glyphicon-user"></span>Sign-up</a></li>
	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
	</ul>
 </div>
 </div>
</nav>
 <img src="logo1.png" id="logo" height="100" width="100">
 
 
 <h1>ONLINE ELECRICITY BILL PAYMENT WEBSITE</h1>
 
 <br><br><br>
<br>    
<div class="container" style="box-shadow:5px 5px 5px 10px black;">
  
  <marquee scrollamount="5" onMouseMove="this.stop()" onMouseOut="this.start()"><!--<img src="alert.gif" height="20" width="60">-->
  <strong style="text-shadow: 0 0 3px black; font-size:1.6vw">Alert! Please register your home address with us,else your ELECRICITY connection will be closed</marquee>
  <br>
  <div class="row">
  <div class="col-sm-12 col-md-4">
  <div class="well well-lg" id="notice" style="color:white">
  <strong><u>NOTICE</u></strong><br>
  NOT available
  </div>
  </div>
  <div class="col-sm-12 col-md-4">
  <div class="well well-lg" id="box">
  <strong><u>LINKS</u></strong><br>
  <img src="new.gif">JUBVNL<br>
  <img src="new.gif">payonline<br>
  <img src="new.gif">PAytm<br>
  </div>
  </div>
  <div class="col-sm-12 col-md-4">
  <div class="well well-lg" id="box1">
  <strong><u>DOWNLOADS</u></strong><br>
  <img src="new.gif">Bill form<br>
  <img src="new.gif">Documents<br>
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-sm-12 col-md-12">
  <div class="extra"><h3 align="center"><a href="feedback.php"">Feedback</a> | <a href="#" onclick="visi1()">Privacy Policy</a> |  <a href="#" onclick="visi2()">Disclaimer</a></h3></div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-sm-12 col-md-12">
  <div class="well well-sm" id="cpr"><h5 align="center">All Rights Reserved @2021,ONLINE ELECRICITY BILL PAYMENT AND MANAGEMENT WEBSITE.This site belongs to Prashant Siddharth  Last updated 24/01/2021</h5></div>
   </div>
  </div>
</div>
<div class="info" id="pp">
<div id="but" onclick="xxx()"><a href="#" >X</a></div>
<div style="font-size:18px;font-weight:bold;padding:10px;text-align:left" >Copyright Policy</div>

<p> "Material feature on this site may be reproduced free of charge in any format or media without requiring specific permission. This is subject to the material being reproduced accurately and note being used in a derogatory manner or in misleading context. Where the material is being published or issued to others, the soure must be prominently acknowledged". This neeeds to be incorporated.</p>

<div style="font-size:18px;font-weight:bold;padding:10px;text-align:left" >Hyperlink Policy</div>

<p> "We do not object to you linking directly to the information that is hosted onb our site and no prior permission is required for the same. However, we would like you to inform us about any links provided to our site so that you can be informed of any changes or updations therein. Also, we do not permit our pages to be loaded ijto frames on your site. Our website's pages must load into a newly opened browser window of the user." This needs to be incorporated.</p>

<div style="font-size:18px;font-weight:bold;padding:10px;text-align:left" >Privacy Policy</div>

<p>"We do not collect personal information for any purpose other than to respond to you (for example, to respond to your queries). If you choose to provide us with personal information like filling out a Contact Us form with and e-mail address or postal address, and submitting it to us through the website, we use the information to respod to your message, and to help you get the information you have requested. Our website never collects information or creates individual profiles for commercial marketing. While you mhust provide and e-mail address for a localised response to any incoming questions or comments to us, we recommend that you do not include any other personal information.". This needs to be incorporated. </p>

</div>
<div class="info" id="dis">
<div id="but" onclick="xxx()"><a href="#" >X</a></div>
<div style="font-size:18px;font-weight:bold;padding:10px;" >Disclaimer</div>
<div>&nbsp;</div><div>&nbsp;</div>
<p><strong>OEBW</strong> with the aim that people related and information useful to them is easily available from one place only. In website in all information for exactness and reality efforts are done. In spite of it there can be some gap in it. For this matter if you have any opinion then we request to contact us. To keep this website latest and mistakes that will come to our notice for their improvements efforts will be done. </p>
<div>&nbsp;</div>
<p>In sites documents other people and private institutions made information is there. For information available from outside, regarding exactness, co-ordination, latest or complete we are not in control or we are not giving any such promise, this matter is to be taken care of this websites information is for benefit of general public. And in it any legal right or responsibility presence is not there. </p>
<p>
For reality of information and work method complete care will be taken. Inspite of that due to oversight or typing any mistake this department is not responsible. If any information is not true or it needs improvement if this is known then to solve it for solution steps your opinion should be given. This websites documents samples (PDF file) soft copy and hard copy thus from both it is taken. At time of conversion some documents formatting is changed that can happen now also there can be any mistake for mistakes raised by conversion efforts to improve them are done. In spite of that now also, there can be any mistake in it. If regarding this matter you have any questions then original documents photo copy related or you are requested to contact us. Moreover regarding linked sites policy or method we are not responsible. 
</p>

</div>
</body>
</html>