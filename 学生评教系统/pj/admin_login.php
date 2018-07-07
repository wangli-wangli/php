<?php 
 require_once('conn.php'); 
?>
<html>
<head>
<?php head()?>
<title>管理员登录</title>
</head>
<script language="javascript" type="text/javascript">
function check(){
	if(form1.username.value=="")
	{
		lbluser.innerHTML = "用户名不能为空！";
		form1.username.focus();
		return false;
	}
	else
	{
		lbluser.innerHTML = "";
	}
			
	if(form1.password.value=="")
	{
		lblpass.innerHTML = "密码不能为空！";
		form1.password.focus();
		return false;
	}
	else
	{
		lblpass.innerHTML = "";
	}
			
	if(form1.yz.value=="")
	{
		lblyz.innerHTML = "验证码不能为空！";
		form1.yz.focus();
		return false;
	}	
	else
	{
		lblyz.innerHTML = "";
	}		
	return true;
}
window.onload=function()
{
	form1.username.focus();
}
</script>
<body>
<?php
	$action = isset($_GET["act"]) ? $_GET["act"] : "";	
	if($action=="login"){	 
	 $sql = "select * from xh_config where username='".trim($_GET["username"])."' and password='".$_GET["password"]."'";
	 $query = mysqli_query($conn,$sql);
	if($_SESSION["code"]!=$_GET["yz"]){
		 mysqli_close($conn);
		 failmsgbox('验证码输入不正确');
	 }
	 if(mysqli_num_rows($query)<=0){
		 mysqli_close($conn);
		 failmsgbox('用户名或密码错误!');
	 }else{
		 $row=mysqli_fetch_array($query);
		 $_SESSION["admin"]=$row["username"];
		 mysqli_free_result($query);
		 mysqli_close($conn);
		 redirect("admin_index.php");
	 }	 
	}
	else if($action=="logout"){	
		logout();
	}
 
?>

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" id="table1" style="border-collapse: collapse">
		<tr>
			<td valign="top">
				<table width="40%" border="1" align="center" cellpadding="5" cellspacing="1" bgcolor="#BFDFFF" id="table2" style="border-collapse: collapse; margin-top:50px;">
					<form action='admin_login.php' method="get" name="form1" onSubmit="return check()">
                        <input type="hidden" value="login" name="act">
					<tr id="TableTitle2">
						<th colspan="2">学生管理登录</th>
					</tr>
					<tr>
						<td width="40%" align="right" bgcolor="#ECF5FF"><b>用户名：</b></td>
						<td bgcolor="#ECF5FF"><input type="text" name="username"><label id="lbluser"></label></td>
					</tr>
					<tr>
						<td width="40%" align="right" bgcolor="#ECF5FF"><b>密&nbsp; 码：</b></td>
						<td bgcolor="#ECF5FF"><input type="password" name="password"><label id="lblpass"></label></td>
					</tr>
					<tr>
						<td align="right" bgcolor="#ECF5FF"><b>验证码：</b></td>
						<td bgcolor="#ECF5FF"><input type="text" name="yz" size="8">&nbsp;<img src="getcode.php" onClick="this.src='getcode.php'">&nbsp;<label id="lblyz">只支持大写字母</label></td>
					</tr>
					<tr>
					  <td height="30" colspan="2" align="center" bgcolor="#ECF5FF"><input class="btn" type="submit" name="submit" value="登 陆"> <input class="btn" type="reset" name="reset" value="取 消"></td>
					</tr>

					</form>
			  </table>
		  </td>
		</tr>
</table>
<?php /*show_source("index.php"); */?>
</body>
</html>
<?php mysqli_close($conn);?>