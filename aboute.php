<?php
if(isset($_POST['back']))
{
	header("location:index.php");
}
?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
h2,p{color:white;}
</head>
</style>
<body style="background:url('images/4.jpg') no-repeat;background-size:cover;">
<div class="container-fluid">
  <div class="row">
  <div class="row">
  <h1 align="center" style="color:yellow;font-family:;background-color:;">ABOUT US</h1>
  </div>
  <img src="images/1.jpg" height="70%" width="100%" >
  </div>
  <div class=row><h2 align="center"><b>WHO WE ARE</b></h2></div>
  <div class="row">
   <div class="col-lg-3"></div>
    <div class="col-lg-6">
	   <p style="font-family:Baskerville Old Face;font-size:1.3vw;">Welcome to our online electricity bill payment wesite.
	  E-bill is one of the best power utilities in India and the driving force behind development of state. 
	  Electricity Bill Payment on this site is quick and easy. any Electricty bill payment or bijli bill operator , and pay securely through credit card, debit.
	  </p>

       <p style="font-family:Baskerville Old Face;font-size:1.3vw;">The Department does not have its own generation and purchases power from the Central Sector Power Stations
	   of the National Thermal Power Corporation as per the allocation made by the Central Government.
	   The Total allocation of power from the NTPC is 332 MW
	   .</p>
	</div>
  
  </div>
  <div class=row><h2 align="center"><b>WHAT WE DO</b></h2></div>
  <div class="row">
   <div class="col-lg-5"><img src="images/3.jpg" height="50%" width="100%"></div>
    <div class="col-lg-6"><h2>Department of Power</h2>
	   <p style="color:white;">Monitoring and co-ordination of the activities of various power utilities in the state to ensure cohesive growth and resolving the conflicts/disputes among them,
	   if any. Overseeing and providing requisite inputs towards acceleration of the implementation of power projects.
	   Liaison with Ministry of Power, Gov.</p>
	</div>
  
  </div>
    <div class="row">
	<div class="col-lg-1"></div>
   <div class="col-lg-6"><h2>Terms & Conditions</h2>
	   <p>The Bill & Account Information Service by Electricity Department is a free service which provides Billing Information, Bill history, Consumption history and Payment history ("Service") through website to any User ("User") at the risk of the User.
	   User agrees to hold harmless and indemnify  Electricity Department, and its subsidiaries, affiliates, officers, agents, and employees from and against any claim arising from or in any way related to his/her use of the Service, 
	   including any liability or expense arising from all claims, losses, damages (actual and consequential), suits, judgments, litigation costs and attorneys' fees, of every kind and nature.

These Terms and Conditions shall be governed by the laws of India.In the event that there is a dispute of difference with regard to these Terms and Conditions,
 the same shall be referred to arbitration under the provisions of the Indian Arbitration and Conciliation Act, 1996.</p>
	</div>
    <div class="col-lg-5"><img src="images/10.jpg" height="50%" width="100%"></div>
 </div>
  <div class=row>
  <div class="col-lg-2"></div>
   <div class="col-lg-6">
   <form action="" method="POST">
  <input type='submit' name='back' class="btn btn-primary" value='Home' 
  	style='font-size:20px;color:black;'>
	</form>
  </div>
 </div>
 </div>
</html>