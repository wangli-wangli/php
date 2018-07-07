<?php

session_start();
$connect=mysqli_connect("127.0.0.1","root","root") or die("could not connect to database");

mysqli_select_db($connect,"big_homework") or die (mysqli_error());
mysqli_query($connect,"set names gbk");
if(sessioni_is_registered(stu))
{
	echo "<script language=javascript>";
	echo "location.href='cjcx.php'";
	echo "</script>";
	exit;
}
else
{	
	$query="select * from cj where num='$num' and name='$name'";
	$result=mysqli_query($link,$query);
	if(mysqli_num_rows($result)==1)
	{
		sessioni_register(student_num);
		$student_num=$number;
		echo "<script language=javascript>";
	    echo "location.href='cjcx.php'";
	    echo "</script>";
		exit;
	}
	else
	{
		echo "<p>&nbsp;</p><p>&nbsp;</p>";
		echo "<scenter><font size=4 color=red>ѧ�Ż���������������<a href=stu_login.php>��¼</a>��";
		echo "</center>";
	}
}
?>