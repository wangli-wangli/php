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
<p>添加课</p>
	<form action="add_course.jsp" method="post">
		<table align="center" border="1" width="500">
			<tr>
				<td>课程号 : </td>
				<td>
					<input type="text" name="Cno" />
					
				</td>
			</tr>
				<tr>
    			<td>课程名:</td>
    			<td>
    				<input type="text" name="Cname" /></td>
    		</tr>
    		<tr>
    			<td>学分:</td>
    			<td>
 
    				<input type="text" name="Ccredit"  /></td>
    		</tr>
    		<tr>
    			<td>学期:</td>
    			<td>
    				<input type="text" name="Semester"  />
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