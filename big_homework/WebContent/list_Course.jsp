<%@page import="model.Student"%>
<%@page import="dao.CourseDaoImpl"%>
<%@page import="dao.ICourseDao"%>
<%@page import="Util.UserException"%>
<%@page import="model.Course" %>
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
		CourseDaoImpl courseDao = new CourseDaoImpl();
		List<Course> courses = courseDao.load_courses();
	%>
	<p>课程信息</p>
     <a href="addInput_course.jsp">添加课程</a>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <a href="list_student.jsp">学生信息</a>
	<table align="center" border="1" width="700">
		<tr>
			<td>课程号</td>
			<td>课程名</td>
			<td>学分</td>
			<td>学期</td>
			<td>选修学生</td>
			<td colspan="2">用户操作</td>
			<td>判断成绩</td>
		</tr>

		<%
			for (Course course:courses) {
		%>
		<tr>
		<td><%=course.getCno()%></td>
		<td><%=course.getCname()%></td>
		<td><%=course.getCcredit()%></td>
		<td><%=course.getSemester()%></td>
		<td><a href="list_student2.jsp?Cno=<%=course.getCno()%>">查看</a></td>
		<td><a href="delete_course.jsp?Cno=<%=course.getCno()%>">删除</a></td>
		<td><a href="inputUpdate_course.jsp?Cno=<%=course.getCno()%>">修改</a></td>
		<td><a href="xiuGrade_input.jsp?Cno=<%=course.getCno()%>">修改</a></td>
		</tr>
		<%
			}
		%>
	
</body>
</html>