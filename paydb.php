<?php
session_start();
$t=$_SESSION['total'];
$cn=$_SESSION['cn'];
$a=$_SESSION['a'];
$b=$_SESSION['bill'];
$m=$_SESSION['month'];
$y=$_SESSION['yr'];
if(session_id()!=$_SESSION['gate'])
	header('location:payment.php');
?>
<?php
include'connect.php';
mysqli_query($conn,"insert into paydb values('$cn','$a','$b','$t','$m','$y')");

$tc="select * from user where aadhar_no='$a'";
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
			echo'
			<h3>BILL DETAILS<br></h3>
			<pre><br>aadhar no. ---->   '.$r[0].'
			<br>user name. ---->   '.$r[1].'
			<br>phone    . ---->   '.$r[3].'
			<br>email    . ---->   '.$r[4].'
			<br>address  . ---->   '.$r[5].'
			<br>bill no  . ---->   '.$b.'
			<br>total    . ---->   '.$t.'
			<br>month    . ---->   '.$m.'
			<br>year     . ---->   '.$y.'</pre>
			';
			mail($r[4],"PAYMENT DONE","payment done successfully");
		}
	}
	}
echo'<a href="profile.php">profile</a>';
?>