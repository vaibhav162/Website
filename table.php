<?php
include"connect.php";
$tc="create table user(aadhar_no varchar(20) primary key,
     uname varchar(30),password varchar(50) not null,
	 phone varchar(10),email varchar(30),
	 address varchar(40),picid varchar(200) 
	 ,status int(2))";
$stc=mysqli_query($conn,$tc);
if(!$stc)
echo'error'.mysqli_error($conn);
else
echo'successful';
?>