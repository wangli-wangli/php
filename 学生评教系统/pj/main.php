<?php
 require_once("conn.php");
?>
<html>
<head>
<?php
  head();
  check();
?>
<title>学生管理系统</title>
</head>

<body>
<table border="0" cellpadding="1" cellspacing="2" width="100%" id="table1" bgcolor="#E1F0FF">
	<tr>
	    <td>
		  <table width="100%" id="table2" cellspacing="1">
			 <tr>
				<td width="100%" id="TableTitle1"><b>欢迎<?php echo $_SESSION["admin"]; ?>进入后台管理中心!</b></td>
			</tr>
		 </table>
		</td>
	</tr>
	<tr>
	 <td>
	    <table border="1" width="100%" id="table2" bordercolor="#A9C9E2" cellspacing="1">
			
			<tr>
				<td width="100%" id="TableTitle2"><b>系统说明</b></td>
			</tr>

            <tr>
				<td width="100%" bgcolor="#E6F2FF">注意事项：<br>初始设置时请按以下顺序添加信息<br>１、请先添加班级<br>２、再添加科目老师<br>３、最后再添加学生信息<br>请严格按照此顺序添加，否则会引起数据混乱！<br>
                初始设置完毕后，可只更新学生信息即可。<br>
                考虑到数据库负荷问题，评教选项只能在现有基础上修改，不能删除和增加！
                </td>
			</tr>


	    </table>
      </td>
	</tr>
</table>
</body>
</html>