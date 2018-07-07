<%@page import="model.Student"%>
<%@page import="dao.StudentDaoImpl"%>
<%@page import="dao.IStudentDao"%>
<%@page import="Util.UserException"%>
<%@page import="model.Student" %>
<%@page import="java.util.List"%>
<%@page import="dao.CourseDaoImpl" %>
<%@page import="model.Course" %>
<%@ page language="java" contentType="text/html; charset=utf-8"
    pageEncoding="utf-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body>
    
	<%
	    String sno=request.getParameter("Sno");
		CourseDaoImpl courseDao = new CourseDaoImpl();
		List<Course> courses=courseDao.load_course(sno);
	%>
	<p><%=sno %>的学习情况</p>
	<table align="center" border="1" width="700">
		<tr>
			<td>课程号</td>
			<td>课程名</td>
			<td>成绩</td>
			<td>学分</td>
			<td>学期</td>
		</tr>

		<%
			for (Course course : courses) {
			
		%>
		<tr>
		<td><%=course.getCno()%></td>
		<td><%=course.getCname()%></td>
		<td><%=course.getGrade()%></td>
		<td><%=course.getCcredit()%></td>
		<td><%=course.getSemester()%></td>
		</tr>
		<%
			}
		%>
	
</body>
</html>