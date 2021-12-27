<?php
include"connect.php";
$tc="create table bill(aadhar_no varchar(20),
     billno varchar(20),lod int(8),rate int(8),
	 pr int(8),nr int(8),amount int(8),total int(8),
	 month varchar(15),
	 year int(5),
	 primary key (billno,month),
	 foreign key (aadhar_no) references user (aadhar_no) )";
$stc=mysqli_query($conn,$tc);
if(!$stc)
echo'error'.mysqli_error($conn);
else
echo'successful';
?>