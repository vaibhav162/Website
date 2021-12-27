<?php
session_start();
$b  =$_SESSION['b']  ;
$l  =$_SESSION['l']  ;
$r  =$_SESSION['r']  ;
$pr =$_SESSION['pr'] ;
$nr =$_SESSION['nr'] ;
$amt=$_SESSION['amt'];
$t  =$_SESSION['t']  ;
$mth=$_SESSION['mth'];
$y  =$_SESSION['y']  ;
if(session_id()!=$_SESSION['bil'])
{
header("location:profile.php");
}
 ?>
 <?php
//echo'<pre><br>Bill no. ----->'.$b  ;
//echo'<br>load.    ----->'.$l  ;
//echo'<br>rate     ----->'.$r  ;
//echo'<br>prev read----->'.$pr ;
//echo'<br>new read ----->'.$nr ;
//echo'<br>amount   ----->'.$amt;
//echo'<br>total    ----->'.$t  ;
//echo'<br>month    ----->'.$mth;
//echo'<br>year     ----->'.$y  ;
//echo'<pre><br><br><br><a href="profile.php">PROFILE</a>';
 echo'<div class="container">
	   <div class="row">
	   <div class="col-lg-4"></div>
	   <div class="col-lg-4"><h1 style="text-align: center;">Invoice</h1></div>
	   </div>
	   <div class="row"><table border="1" class="center" style="margin-left: auto;margin-right: auto;">
         <tr>
		 <th>Bill no.</th>
		 <th>load</th>
		 <th>rate</th>
		 <th>Previous reading</th>
		 <th>New reading</th>
		 <th>Amount</th>
		 <th>Toatal</th>
		 <th>Month</th>
	     <th>Year</th>
		 </tr>';
		 
	echo'<tr>';	 
    echo'<th><br>'.$b.'</th>';
    echo'<th><br> '.$l.'</th>';
	echo'<th>'.$r.'</th>';
	echo'<th><br>'.$pr.'</th>';
    echo'<th><br>'.$nr.'</th>';		
    echo'<th><br>'.$amt.'</th>';
    echo'<th><br>'.$t.'</th>';
    echo'<th><br>'.$mth.'</th>';			
	echo'<th><br>'.$y.'</th>';
	echo'</tr></table><br></div>';
	echo'<div class="row">
	<a href="profile.php" style="font-size:20px;text-align: center;">Back</a></div></div>';
	
	?>