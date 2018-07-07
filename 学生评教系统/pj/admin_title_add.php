<?php 
  require_once('conn.php');
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  if($action=="save"){
	
	$title = $_GET["title"];
	if(empty($title)){
		mysqli_close($conn);
		errormsg("标题不能为空!");
		exit();
	}else{		
		$query = mysqli_query($conn,"select * from xh_title where title='".$title."' ");
		if(mysqli_num_rows($query)>0){
			mysqli_free_result($query);
			mysqli_close($conn);
			errormsg('该标题名称已经存在!');			
			exit();
		}
		mysqli_free_result($query);
	}	
	$cmd = "insert into xh_title(title) values('".$_POST["title"]."')";	
	$ins = mysqli_query($conn,$cmd);
	mysqli_close($conn);
	successmsg('添加投票问题成功!');
	exit();
}
?>
<html>
<head>
<?php
 head();
 check();
?>
<title>后台管理中心</title>
</head>
<script language="javascript" type='text/javascript'>
function check(){
	
	if(form1.title.value==""){
		lbltitle.innerHTML = "投票问题不能为空！";
		form1.title.focus();
		return false;}	
	else{
		lbltitle.innerHTML = "";}	
	return true;
	}
</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
      <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 添加投票问题-&gt;</td>
		 </tr>
	   </table>
  </tr>
  <tr>
    <td>
	   <table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="admin_title_add.php" method="get" name="form1" onSubmit="return check()">
            <input type="hidden" name="act" value="save">
         
          <tr>
            <td width="20%" align="right">投票问题名称：</td>
            <td><input type="text" name="title" size="25"><label id="lbltitle"></label></td>
          </tr>
       	  
          <tr>
            <td colspan="2" align="center" bgcolor="#BFDFFF"><input class="btn" type="submit" name="submit" value=" 添 加 "></td>
          </tr>
        </form>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php mysqli_close($conn);?>