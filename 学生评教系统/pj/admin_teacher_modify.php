<?php
  require_once('conn.php');
  $id = isset($_GET["id"]) ? $_GET["id"] : "";
  if(empty($id) || !is_numeric($id)){
	  mysqli_close($conn);
	  die("<script>alert('id不能为空，且只能为数字!');</script>");
  }
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  //修改投票问题
 if($action=="save"){
	
	 $teacher = $_GET["teacher"];
	 
	 if(empty($teacher)){
		 errormsg('科目老师不能为空!');
		 exit();
	 }else{		 
		 $query= mysqli_query($conn,"select * from teacher where teacher='".$teacher."' ");
		 if(mysqli_num_rows($query)>0){
			 mysqli_free_result($query);
		     mysqli_close($conn);
			 errormsg('已经存在此老师!');			 
			 exit();
		 }
		 mysqli_free_result($query);
	 }	 
	 $query = mysqli_query($conn,"update teacher set teacher='".$teacher."' where id=".$id);
	 mysqli_close($conn);
	 successmsg('修改科目老师信息成功!');
	 exit();
 }
 $sid="";
 $title="";
 $ms="";
 $listtype="";
 $listrows="";
 $query= mysqli_query($conn,"select * from teacher where id=".$id);
 while($row=mysqli_fetch_array($query))
 {
	 
	 $teacher=$row["teacher"];
	 
 }
 mysqli_free_result($query);
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

	if(form1.teacher.value==""){
		lblteacher.innerHTML = "科目老师不能为空！";
		form1.teacher.focus();
		return false;}	
	else{
		lblteacher.innerHTML = "";}	
	return true;
	}
</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	   <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 修改科目名称-&gt;</td>
		 </tr>
	   </table>
	</td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="admin_teacher_modify.php" method="get" name="form1" onSubmit="return check()">
            <input type="hidden" name="act" value="save">
            <input type="hidden" name="id" value="<?php echo $id;?>">
          <tr>
            <td width="20%" align="right">科目名称：</td>
            <td><input type="text" name="teacher" size="25" value="<?php echo $teacher;?>"></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#BFDFFF"><input class="btn" type="submit" name="submit" value=" 修 改 "></td>
          </tr>
        </form>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php mysqli_close($conn); ?>