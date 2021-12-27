<?php
include"connect.php";
$tc="create table paydb(cno varchar(30),
      aadhar_no varchar(20),
	  billno varchar(20) primary key,
	  total int(8),
	  month varchar(15),
	  year int(5))";
$stc=mysqli_query($conn,$tc);
if(!$stc)
echo'error'.mysqli_error($conn);
else
echo'successful';
?>