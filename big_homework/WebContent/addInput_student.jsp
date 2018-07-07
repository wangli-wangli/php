<%@page import="Util.ValidateUtil"%>

<%@page import="java.util.Map"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>用户添加页面</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<p>添加学生</p>
	<form action="add_student.jsp" method="post">
		<table align="center" border="1" width="500">
			<tr>
				<td>学号 : </td>
				<td>
					<input type="text" name="number" />
					
				</td>
			</tr>
				<tr>
    			<td>姓名:</td>
    			<td>
    				<input type="text" name="name" /></td>
    		</tr>
    		<tr>
    			<td>性别:</td>
    			<td>
    				<input type="radio" name="sex" value="男">男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    				<input type="radio" name="sex" value="女">女</td>
    		</tr>
    		<tr>
    			<td>年龄:</td>
    			<td>
    				<input type="text" name="age" size="10" />岁
    		</tr>
    		<tr>
    			<td>专业:</td>
    			<td>
    				<input type="text" name="Sdept" /></td>
    		</tr>
    		<tr align="center">
    			<td colspan="2">
    				<input type="submit" value="提交" />
    				<input type="reset" value="重置" />
    			</td>
    		</tr>
		</table>
	</form>
</body>
</html>