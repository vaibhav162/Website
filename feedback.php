<html>
<?php
if(isset($_POST['h']))
{
	header("location:index.php");
}
if(isset($_POST['sub']))
{
 echo'<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>SUCCESS</strong>Message Sent!!!!
  </div>';	
  /*$from=$_POST['e'];
  $to="impoornimabal@gmail.com";
  $msg=$_POST['msg'];
  $n=$_POST['n'];
  $sub="feedback";
  $headers="From:".$from;
  mail($to,$sub,msg,$headers);*/
  
}

?>
<head><title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
body
{
 background-image:url(images/4.jpg);
 background-size:cover;
}

span{color:red;}
hr{background:white;}
.contact-form
{
  background:rgba(0,0,0,0.6);
  color:white;
  margin-top:20px;
  padding:20px;
  box-shadow:0px 0px 10px 3px grey;
}
</style>
<script>
function namecheck()
{
 var n,nc,ns;
 n=document.getElementById("n").value;
 nc=/^[a-zA-Z]+$/;
 if(!n.match(nc)|| n.charCodeAt(0)==32)
 {
  document.getElementById("ns").innerHTML="***Enter valid name";
  return 0;
  
 }
 else
 {
  document.getElementById("ns").innerHTML="";
  return 1;
 }
}
function echeck()
{
 var e,m;
 e=document.getElementById("e").value;
 m=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 if(!e.match(m))
 {
  document.getElementById("es").innerHTML="***Enter valid email";
 }
 else
 {
  document.getElementById("es").innerHTML="";
   return 1;
 }
 
}
</script>
<div class="row"><h1 align="center" style="font-family:;background-color:;color:yellow;">YOUR OPINION MATTERS</h1></div>
<div class="container contact-form">
  <h1>Feedback form</h1>
  <div class="row">
	   <div class="col-md-6">
	   <address>3421/22 Ashoka road,High Street,New Delhi</address> 
	   <p>Email:-bigevent@gmail.com</p>
	   <p>Mobile:9975436125</p>
	   </div>
	   <div class="col-md-6">
	     <form action="" method="POST">
		 <div class="form-group" >
		    <label>Name</label>
			<input type="text" id="n" name="n" onblur="namecheck()" maxlength="20" class="form-control"><span id="ns"></span> 
		</div>
		 <div class="form-group">
		    <label>Email</label>
			<input type="text" id="e" name="e" onblur="echeck()"  class="form-control"><span id="es"></span>
		 </div>
		 <div class="form-group">
		    <label>Message</label>
		    <textarea class="form-control" cols="30" maxlength="100" rows="7" name="msg"></textarea>
		 </div>
		 <div class="form-group">
			<input type="submit" name="sub" value="send" class="btn btn-primary btn-lg">
			<input type='submit' name='h' id='h' class="btn btn-primary" value='Home' style='font-size:20px;color:white;'>
		 </div>
	    </form>
	   </div>
	 </div>
</div>
	 