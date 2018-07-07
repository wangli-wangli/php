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
	   String cno=request.getParameter("Cno");
		StudentDaoImpl studentDao = new StudentDaoImpl();
		List<Student> students = studentDao.load_students(cno);
	%>
    <p><%=cno %>课程的选修学生</p>
	<table align="center" border="1" width="700">
		<tr>
			<td>学号</td>
			<td>姓名</td>
			<td>性别</td>
			<td>年龄</td>
			<td>专业</td>
			<td>成绩</td>
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
		<td><%=student.getGrade()%></td>
		</tr>
		<%
			}
		%>
	
</body>
</html>