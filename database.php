<?php
$s="localhost:3306";
$u="root";
$p="";
$cn=mysqli_connect($s,$u,$p);
if(!$cn)
{
echo'error'.mysqli_connect_errno();
echo'<br>error'.mysqli_connect_error();
}
else
{
$dc="create database electricity";
$sdc=mysqli_query($cn,$dc);
if(!$sdc)
{
echo'error'.mysqli_error($cn);
}
else
echo'successful';
}
?>