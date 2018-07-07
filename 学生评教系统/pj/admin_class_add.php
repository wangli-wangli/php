<?php  
	  require_once('conn.php');
	  $action = isset($_GET["act"]) ? $_GET["act"] : "";
	  if($action=="save"){
		 
		 $query = mysqli_query($conn,"select * from class where class_name='".$_GET["class_name"]."'");
		 if(mysqli_num_rows($query)>0){
			 mysqli_free_result($query);
			 mysqli_close($conn);
			 errormsg("该班级已经存在!");			 
			 exit();
		 }		
		 $query = mysqli_query($conn,"insert into class(class_name,class_num) values('".$_GET["class_name"]."','".$_GET["class_num"]."')");
		 successmsg("添加班级成功!");
		 mysqli_close($conn);
		 exit();
	 }
?>
<html>
<head>
<?php 
  head();
  check();
?>
<title>【枝江英杰学校学生评系统】后台管理中心</title>
</head>
<script language="javascript" type="text/javascript">
function checkfrm(){
	if(form1.class_name.value==""){
		lblname.innerHTML = "班级名称不能为空！";
		form1.class_name.focus();
		return false;}

	return true;
}
</script>
<?php

?>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	   <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 添加班级信息-&gt;</td>
		 </tr>
	   </table>
	 </td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="admin_class_add.php" method="get" name="form1" onSubmit="return checkfrm()">
            <input type="hidden" name="act" value="save">
          <tr>
            <td width="20%" align="right">班级名称：</td>
            <td><input type="text" name="class_name" size="25"><label id="lblname"></label></td>
          </tr>          
		  <tr>
		  <td width="20%" align="right">班级编号：</td>
		  <td >
		  <input type="text" name="class_num" size="25"><label id="lblnum"></label>
		  </td>
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