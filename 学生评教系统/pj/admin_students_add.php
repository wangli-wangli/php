<?php 
  require_once('conn.php');
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  if($action=="save"){
	$class_num = $_GET["class_num"];
	$number = $_GET["number"];
	if(empty($number)){
		mysqli_close($conn);
		errormsg("学号不能为空!");
		exit();
	}else{		
		$query = mysqli_query($conn,"select * from students where number='".$number."'");
		if(mysqli_num_rows($query)>0){
			mysqli_free_result($query);
			mysqli_close($conn);
			errormsg('该学生信息已经存在!');			
			exit();
		}
		mysqli_free_result($query);
	}	
	$cmd = "insert into students(number,name,class_num) values('".$_GET['number']."','".$_GET["name"]."','".$_GET["class_num"]."')";
	$ins = mysqli_query($conn,$cmd);
	mysqli_close($conn);
	successmsg('添加学生信息成功!');
	exit();
}
?>
<html>
<head>
<?php
 head();
 check();
?>
<title>【枝江英杰学校学生评教系统】后台管理中心</title>
</head>
<script language="javascript" type='text/javascript'>
function check(){
	if(form1.class_num.selectedIndex==-1){
		lblclass_num.innerHTML = "请选择班级！";
		form1.class_num.focus();
		return false;}
	else
	if(form1.number.value==""){
		lblnumber.innerHTML = "学号不能为空！";
		form1.number.focus();
		return false;}	
		else
	if(form1.name.value==""){
		lblname.innerHTML = "姓名不能为空！";
		form1.name.focus();
		return false;}	
	
	return true;
	}
</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
      <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 添加学生信息-&gt;</td>
		 </tr>
	   </table>
  </tr>
  <tr>
    <td>
	   <table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action="admin_students_add.php" method="get" name="form1" onSubmit="return check()">
            <input type="hidden" name="act" value="save">
          <tr>
            <td width="20%" align="right">所属班级：</td>
            <td><select name="class_num">
                <?php				 
				 $query = mysqli_query($conn,"select * from class");
				 while($row=mysqli_fetch_array($query)){
					 ?>
					 <option value='<?php echo $row["class_num"];?>'><?php echo $row["class_name"]; ?></option>
                     <?php
				 }
				 mysqli_free_result($query);
				?>
              </select><label id="lblsubject"></label></td>
          </tr>
          <tr>
            <td width="20%" align="right">添加学号：</td>
            <td><input type="text" name="number" size="25"><label id="lblnumber"></label></td>
          </tr>
        <tr>
            <td width="20%" align="right">学生姓名：</td>
            <td><input type="text" name="name" size="25"><label id="lbln

            ame"></label></td>
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