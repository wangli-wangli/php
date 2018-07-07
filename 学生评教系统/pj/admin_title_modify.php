<?php
  require_once('conn.php');
  $id = isset($_GET["id"]) ? $_GET["id"] : "";
  if(empty($id) || !is_numeric($id)){
	  mysqli_close($conn);
	  die("<script>alert('标题参数不能为空且只能是数字!');</script>");
  }
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  //修改投票问题
 if($action=="save"){
	
	 $title = $_GET["title"];
	 
	 if(empty($title)){
		 errormsg('标题名称不能为空!');
		 exit();
	 }else{		 
		 $query= mysqli_query($conn,"select * from xh_title where id<>".$id." and title='".$title."' ");
		 if(mysqli_num_rows($query)>0){
			 mysqli_free_result($query);
		     mysqli_close($conn);
			 errormsg('在同一主题下该标题名称已经存在!');			 
			 exit();
		 }
		 mysqli_free_result($query);
	 }	 
	 $query = mysqli_query($conn,"update xh_title set title='".$title."' where id=".$id);
	 mysqli_close($conn);
	 successmsg('修改投票信息成功!');
	 exit();
 }
 $sid="";
 $title="";
 $ms="";
 $listtype="";
 $listrows="";
 $query= mysqli_query($conn,"select * from xh_title where id=".$id);
 while($row=mysqli_fetch_array($query))
 {
	 
	 $title=$row["title"];
	 
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
    <td>
	   <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 修改投票问题-&gt;</td>
		 </tr>
	   </table>
	</td>
  </tr>
  <tr>
    <td><table border="1" cellpadding="4" cellspacing="0" width="100%" id="table2" bordercolor="#BFDFFF">
        <form action=" admin_title_modify.php" method="get" name="form1" onSubmit="return check()">
            <input type="hidden" name="act" value="save">
            <input type="hidden" name="id" value="<?php echo $id;?>">
          <tr>
             <td width="20%" align="right">投票问题名称：</td>
            <td><input type="text" name="title" size="25" value="<?php echo $title;?>"></td>
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