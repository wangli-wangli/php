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
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<%
String sno = request.getParameter("sno");
CourseDaoImpl courseDao = new CourseDaoImpl();
List<Course> courses = courseDao.load_courses();
%>
<form action="xuanke.jsp" method="post">
<input type="hidden" name="sno" value="<%=sno%>"/>
<p>选课</p>
<table align="center" border="1" width="700">
		<tr>
		    <td>选择</td> 
			<td>课程号</td>
			<td>课程名</td>
			<td>学分</td>
			<td>学期</td>
		</tr>

		<%
			for (Course course:courses) {
		%>
		<tr>
		<td><input type="checkbox" name="xuan" value="<%=course.getCno() %>">
		<td><%=course.getCno()%></td>
		<td><%=course.getCname()%></td>
		<td><%=course.getCcredit()%></td>
		<td><%=course.getSemester()%></td>
		<%} %>
		</tr>
		</table>
		<input type="submit" value="提交" />
    				<input type="reset" value="重置" />
		</form>
</body>
</html>