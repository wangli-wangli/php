<?php
 require_once('conn.php');
	$page = isset($_GET["page"]) ? $_GET["page"] : "1";
	$action = isset($_GET["act"]) ? $_GET["act"] : "";
	$key = (isset($_GET["k"]) ? $_GET["k"] : (isset($_GET["k"]) ? $_GET["k"] : ""));
	

	if($action=="del"){
	$id = $_GET["id"];	
		if(empty($id) || !is_numeric($id)){

		  mysqli_close($conn);
		  die("<script>alert('参数id不能为空且只能为数字!');location.href='admin_students.php?k=".$key."&page=".$page."';</script>");
	  }else{		  
	      $query = mysqli_query($conn,"select id from students where id=".$id);
		  
		  
		  mysqli_free_result($query);
		  
		  mysqli_query($conn,"delete from students where id=".$id);
		 
		  mysqli_close($conn);
		  die("<script>alert('学生已删除!');location.href='admin_students.php?k=".$key."&page=".$page."';</script>");
	  }
	  
	 	
	 }else if(isset($_GET["operate"]) && trim($_GET["operate"])=="delvote"){//删除单条或多条记录
	  if(isset($_GET["XHID"]) && is_array($_GET["XHID"]) && count($_GET["XHID"])>0){
		  $tids = implode(",",$_GET["XHID"]);
		  for($i=0;$i<count($_GET["XHID"]);$i++){//删除对应目录下的所有文件
			  $id = $_GET["XHID"][$i];
			  $query = mysqli_query($conn,"select id from students where id=".$id);
			  
			  mysqli_free_result($query);
			  
		  }
		  $query= mysqli_query($conn,"delete from students where id in(".$tids.")");
		  
		  mysqli_close($conn);
		  die("<script>alert('所选择学生已删除!');location.href='admin_students.php?k=".$key."&page=".$page."';</script>");
	  }else{		 
	     mysqli_close($conn);
		 die("<script>alert('请选择要删除的条目!');location.href='admin_students.php?k=".$key."&page=".$page."';</script>");		 
	 }
 
	}else if(isset($_GET["operate"]) && $_GET["operate"]=="search"){
		mysqli_close($conn);
	 	die("<script>location.href='admin_students.php?k=".$key."&page=".$page."';</script>");
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
function XH() {
	for (var i=0;i<document.XHH.XHID.length;i++) {
		var e=document.XHH.XHID[i];
		e.checked=!e.checked;
	}
}
function frmsubmit(value){
	document.getElementById("operate").value=value;
	document.getElementById("XHH").submit();
}
function del(value){
	if(confirm('确定删除?')){
		location.href=value;
	}
}
</script>
<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
  <tr>
    <td>
	   <table width="100%" id="table2" cellspacing="1">
	     <tr>
          <td id="TableTitle1"> 管理学生信息-&gt;
		  <?php		
			if(!empty($key)){
				echo "所有学生信息->搜索结果(".$key.")";
			}else{
				echo "所有学生信息";
			}		
		  ?>
      	  </td>
		 </tr>
	   </table>
	   </td>
  </tr>
  <tr>
    <td>
      <table border="1" width="100%" id="table2" bordercolor="#BFDFFF" cellspacing="1">
        <form action="admin_students.php" method="get" name="XHH" id="XHH">
            <input type="hidden" name="act" value="save">
            <input type="hidden" name="page" value="<?php echo $page;?>">
           <input type="hidden" name="k" value="<?php echo $key;?>">
          <tr id="TableTitle2">
            
            <td width="5%" align="center"><a href="javascript:XH()">选择</a></td>
            <td align="center" width="20%">学号</td>
            <td align="center" > 姓名</td>
            <td align="center" width="20%">班级</td>
            <td width="10%" align="center">单项操作</td>
          </tr>
		  <?php		    		
			if(!empty($key) || $key=="0"){
				$selectcmd="select * from students where number like '%".$key."%' or name like '%".$key."%' or class_num like '%".$key."%' order by number desc";				
			}
			else{
				$selectcmd="select * from students order by number desc";
			}					
			$query=mysqli_query($conn,$selectcmd);
			$pagesize=20;//测试时设置为1 用户可以根据需要进行修改
			$recordcount=max(mysqli_num_rows($query),0);
			$pages=20;
			$curpage=$page;
			pager($recordcount,$pagesize,$curpage,$pages,$key,"admin_students.php");
			$selectcmd.=" limit ".$firstcount.",".$pagesize;
			$query=mysqli_query($conn,$selectcmd);
			while($row=mysqli_fetch_array($query))
			{				
		  ?>
          <tr id="TableTitle3" onmouseover='this.className="over_TableTitle3"' onmouseout='this.className="out_TableTitle3"' class="out_TableTitle3">
            
            <td width="5%" align="center"><input type="checkbox" name="XHID[]" id="XHID" value="<?php echo $row["id"];?>"></td>
            <td align="center"><?php echo trim($row["number"]);?></td>
            <td align="center"><a href="admin_students_modify.php?id=<?php echo $row["id"];?>"><?php echo trim($row["name"]);?></a></td>
            <td align="center" width="20%">
			<?php

			  	$sqry=mysqli_query($conn,"select * from class where class_num='".$row["class_num"]."'");
		      	if($srow=mysqli_fetch_array($sqry)){
				  echo "<a href='admin_students.php?k=".$srow['class_num']."'>".$srow['class_name']."</a>";
				}else{
				  echo "<font color='red'>该主题不存在</font>";
				}
			    mysqli_free_result($sqry);
			  ?>			
            </td>
        
            <td width="10%" align="center"><a href="javascript:void(0)" onClick="del('admin_students.php?act=del&id=<?php echo $row["id"];?>&k=<?php echo trim($key);?>&page=<?php echo $curpage;?>');">删除</a></td>
          </tr>
		  <?php
			}
		  	mysqli_free_result($query);
		 ?>
       <tr id="TableTitle2">
            
            <td width="5%" align="center"><a href="javascript:XH()">选择</a></td>
            <td align="center">学号</td>
            <td align="center" width="20%"> 姓名</td>
            <td align="center" width="20%">班级</td>
            <td width="10%" align="center">单项操作</td>
          </tr>
          <tr>
            <td colspan="6"><input class="btn" type="button" name="delvote" id="delvote" value="删除所选学生" onClick="if (confirm('确定删除?')){frmsubmit('delvote');}">
              |
              <input type="text" name="k">
			  <input type="hidden" name="operate" id="operate" value=""/>
              <input class="btn" type="button" name="search" id="search" value="搜索学生" onClick="frmsubmit('search');"></td>
          </tr>
          <tr>
            <td colspan="6">
			<?php echo $outhtml;?>
            </td>
          </tr>
        </form>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
<?php mysqli_close($conn); ?>
