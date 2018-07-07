<?php
  require_once('conn.php');
  $action = isset($_GET["act"]) ? $_GET["act"] : "";
  $key = (isset($_GET["k"]) ? $_POST["k"] : (isset($_GET["k"]) ? $_GET["k"] : ""));
  $page = isset($_GET["page"]) ? $_GET["page"] : "1";
  //删除单条记录
if($action=="del"){	
    $id = $_GET["id"];
	if(!empty($id) && is_numeric($id)){		
		$qry = mysqli_query($conn,"select * from xh_question where id=".$id);
		
		$tid = -1;
		
		
		if($row=mysqli_fetch_array($qry))
		{
			
			$tid = $row["tid"];
			
		}
		mysqli_free_result($qry);
		mysqli_query($conn,"delete from xh_question where id=".$id);
	
		
		mysqli_query($conn,"update xh_title where id=".$tid);
		mysqli_close($conn);
		
		die("<script>alert('该记录已被删除!');location.href='admin_question.php?k=".$key."&page=".$page."';</script>");
	}else{
		mysqli_close($conn);
		errormsg("投票问题参数不能为空且只能是数字!");
		exit();
	}
}else if(isset($_GET["operate"]) && $_GET["operate"]=="delvote"){
	if(isset($_GET["XHID"]) && is_array($_POST["XHID"]) && count($_GET["XHID"])>0){
		$qids=implode(",",$_GET["XHID"]);
		for($i=0;$i<count($_GET["XHID"]);$i++){
			$query = mysqli_query($conn,"select tid from xh_question where id=".$_POST["XHID"][$i]);
			
		}
		mysqli_query($conn,"delete from xh_question where id in (".$qids.")");
		$s = mysqli_query($conn,"select * from xh_subject");
		
		mysqli_close($conn);
		die("<script>alert('记录已删除!');location.href='admin_question.php?k=".$key."&page=".$page."';</script>");
	}else{
		mysqli_close($conn);
		die("<script>alert('请选择要删除的条目!');history.back(1);</script>");		 
	 }
}else if(isset($_POST["operate"]) && $_POST["operate"]=="search"){
	mysqli_close($conn);
	die("<script>location.href='admin_question.php?page=".$page."&k=".$key."';</script>");	
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
<script language="javascript" type="text/javascript">
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
          <td id="TableTitle1"> 管理投票答案-&gt;
          
		  <?php		    
			if(!empty($key)){
				echo "所有投票答案&nbsp;搜索答案(".$key.")";
			}else{
				echo "所有投票答案";
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
        <form action="admin_question.php" method="get" name="XHH" id="XHH">
            <input type="hidden" name="act" value="save">
            <input type="hidden" name="page" value="<?php echo $page;?>">
            <input type="hidden" name="k" value="<?php echo $key;?>">
          <tr id="TableTitle2">
            <td width="5%" align="center">ID</td>
            <td width="5%" align="center"><a href="javascript:XH()">选择</a></td>
            <td align="center">投票答案名称</td>
            
            <td align="center" > 所属问题</td>
          
            <td width="10%" align="center">单项操作</td>
          </tr>
          
		  <?php
		  if(!empty($key) || $key=="0"){
				$selectcmd="select * from xh_question where question like '%".$key."%' or tid like '%".$key."%' order by id desc";				
			}
			else{
				$selectcmd="select * from xh_question order by id desc";
			}				
			
		    
			$query = mysqli_query($conn,$selectcmd);
			$recordcount = mysqli_num_rows($query);
			$pages=20;
			$pagesize = 20;
            $curpage=$page;
			pager($recordcount,$pagesize,$curpage,$pages,$key,"admin_question.php");
			$selectcmd.=" limit ".$firstcount.",".$pagesize;
			$query=mysqli_query($conn,$selectcmd);
			while(($row=mysqli_fetch_array($query)))
			{				
		  ?>
          
		  <tr id="TableTitle3" onmouseover='this.className="over_TableTitle3"' onmouseout='this.className="out_TableTitle3"' class="out_TableTitle3">
            <td width="5%" align="center"><?php echo $row["id"];?></td>
            <td width="5%" align="center"><input type="checkbox" name="XHID[]" id="XHID" value="<?php echo $row["id"];?>"></td>
            <td align="center"><a href="admin_question_modify.php?id=<?php echo $row["id"] ?>&page=<?php echo $curpage ?>&k=<?php echo $key ?>&tid=<?php echo $row["tid"] ?>"><?php echo $row["question"] ?></a></td>
        
            <td align="center" >
			<?php
			  $tqry = mysqli_query($conn,"select * from xh_title where id=".$row["tid"]);
			  if($trow=mysqli_fetch_array($tqry)){
				  echo "<a href='admin_question.php?k=".$row["tid"]."'>".$trow["title"]."</a>";
			  }else{
				  echo "标题不存在";
			  }
			?>
		  </td>
            
            <td width="10%" align="center"><a href="admin_question_modify.php?id=<?php echo $row["id"] ?>&page=<?php echo $curpage ?>&k=<?php echo $key ?>&tid=<?php echo $row["tid"] ?>">修改</a> </td>
          </tr>

		  <?php
			}
		  mysqli_free_result($query);
		  ?>
      
		 <tr id="TableTitle2">
            <td width="5%" align="center">ID</td>
            <td width="5%" align="center"><a href="javascript:XH()">选择</a></td>
            <td align="center">投票答案名称</td>
            
            <td align="center" > 所属问题</td>
          
            <td width="10%" align="center">单项操作</td>
          </tr>
          <tr>
            <td colspan="7"><input class="btn" type="button" name="delvote" id="delvote" value="删除所选投票答案" onClick="if(confirm('确定删除?')){frmsubmit('delvote');}">
              |
              <input type="text" name="k">
			  <input type="hidden" name="operate" id="operate" value=""/>
              <input class="btn" type="button" name="search" id="search" value="搜索投票答案" onClick="frmsubmit('search');"></td>
          </tr>
          <tr>
            <td colspan="7"><?php echo $outhtml;?>
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