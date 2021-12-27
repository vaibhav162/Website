<form method="POST" action="" enctype="multipart/form-data">
select image:<input type="file" name="m"><br><br>
<input type="submit" name="s" value="upload">
</form>
<?php
if(isset($_POST['s']))
{
	if($_FILES['m']['name']!='')
	{
		$in=$_FILES['m']['name'];
		$l=strlen($in);
		$d=strripos($in,'.');
		$sub=substr($in,$d+1,$l-$d+1);
		$all=Array('jpg','bmp','png');
		if(in_array($sub,$all))
		{
		$in=$_FILES['m']['name'];	
		$ta=$_FILES['m']['tmp_name'];
		$fd='abc/'.uniqid().''.$in;
		move_uploaded_file($ta,$fd);
		}
		else
			echo'file format not supported';
	}
	else
		echo'no image uploaded';
	echo'<img src="'.$fd.'" width="100" height="100" >';
}
?>