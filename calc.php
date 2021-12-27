<html>
<head>
<style>
body {background-image:url("images/3.jpg");
background-size:cover;}
td{font-size:30px;color:white;}
select,submit{font-size:20px;}

</style>
<?php

if(isset($_POST['sb']))
{
	$pr=$_POST['pr'];
	$cr=$_POST['cr'];
	$r=5;
	$d=$cr-$pr;
	$con=$r*$d;
}
?>
</head>
<body align="center">
<div style="font-size:40px;font-weight:bold;color:yellow;">	Consumption Calculator </div>
<div>&nbsp;</div>
<div class="container" style="box-shadow:5px 5px 5px 10px black;width:40%;position:absolute;left:30%;">
<form action="" method="post" name="DS-I" target="_self">
<br>
  <table width="400" border="1" align="center">
   
    <tr>
      <td>Previous Reading </td>
      <td>  <input type="text" name="pr"  size="5"/> </td>
    </tr>
    <tr>
      <td>Current Reading </td>
       <td>  <input type="text" name="cr"  size="5"/> </td>
    </tr>
    <tr>
      <td>Meter Type</td>
      <td>  
        <select name="mt">
          <option value="1">Single Phase</option>
          <option value="2">Three Phase</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Meter Owner</td>
      <td>  
        <select name="mo">
          <option value="1">Consumer</option>
          <option value="2">Board</option>
        </select>
      </td>
    </tr>
	 <tr> 
      <th scope="col"><label>
        <!--input type="submit" name="sb" value="Submit" class="btn btn-primary"/>-->
		<input type='submit' name='sb' class="btn btn-primary" value='Submit' 
  	style='font-size:20px;color:black;background-color:cyan;'>
      </label></th>
      <th scope="col">&nbsp;</th>
    </tr>
	<tr>
      <td>Consumption </td>
      <td> <?php echo"".$con; ?> </td>
    </tr>
  </table>
</form>
<a href="index.php" style='font-size:30px;color:cyan;'>Back to home</a>
</div>

	
</body>
</html>