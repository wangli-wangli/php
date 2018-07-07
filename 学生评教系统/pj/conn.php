<?php
    header("Content-type:text/html;charset=utf-8");
	$conn=mysqli_connect("127.0.0.1","root","root");
	if(!$conn){
		die("Can not connect:".mysqli_error());
	}
	$dbconn=mysqli_select_db($conn,"big_homework");
	if(!$dbconn){
		die("Can not select this database:".mysqli_error($conn));
	}
	@session_start();//启动session会话
	mysqli_query($conn,"SET NAMES 'utf8'");//设置字符集和页面代码统一
	require_once("function.php");//加载函数库
	require_once("config.php");//加载配置信息
?>