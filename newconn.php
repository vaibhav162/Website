<?php
include"connect.php";
$tc="create table newconn(aadhar_no varchar(20) primary key,uname varchar(30),phone varchar(10),email varchar(30),address varchar(40),lod varchar(6))";
$stc=mysqli_query($conn,$tc);
if(!$stc)
echo'error'.mysqli_error($conn);
else
echo'successful';
?>