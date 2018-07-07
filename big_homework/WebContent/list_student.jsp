<%@page import="model.Student"%>
<%@page import="dao.StudentDaoImpl"%>
<%@page import="dao.IStudentDao"%>
<%@page import="Util.UserException"%>
<%@page import="model.Student" %>
<%@page import="java.util.List"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<%
		StudentDaoImpl studentDao = new StudentDaoImpl();
		List<Student> students = studentDao.load_students();
	%>
	<p>学生信息</p>
     <a href="addInput_student.jsp">添加学生</a>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <a href="list_Course.jsp">课程信息</a>
	<table align="center" border="1" width="700">
		<tr>
			<td>学号</td>
			<td>姓名</td>
			<td>性别</td>
			<td>年龄</td>
			<td>专业</td>
			<td>学习情况</td>
			<td colspan="2">用户操作</td>
			<td>选课</td>
		</tr>

		<%
			for (Student student : students) {
		%>
		<tr>
		<td><%=student.getSno()%></td>
		<td><%=student.getSname()%></td>
		<td><%=student.getSSex()%></td>
		<td><%=student.getSage()%></td>
		<td><%=student.getSdept()%></td>
		<td><a href="list_xuexi.jsp?Sno=<%=student.getSno()%>">查看</a></td>
		<td><a href="delete_student.jsp?sno=<%=student.getSno()%>">删除</a></td>
		<td><a href="inputUpdate_student.jsp?sno=<%=student.getSno()%>">修改</a></td>
		<td><a href="xuanke_input.jsp?sno=<%=student.getSno() %>">选课</a></td>
		</tr>
		<%
			}
		%>
	
</body>
</html>