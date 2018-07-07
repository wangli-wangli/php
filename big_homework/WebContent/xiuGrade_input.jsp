<%@page import="model.Student"%>
<%@page import="dao.StudentDaoImpl"%>
<%@page import="dao.IStudentDao"%>
<%@page import="Util.UserException"%>
<%@page import="model.Student" %>
<%@page import="java.util.List"%>
<%@page import="dao.CourseDaoImpl"%>
<%@page import="dao.ICourseDao"%>
<%@page import="model.Course" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<%
String cno=request.getParameter("Cno");
StudentDaoImpl studentDao = new StudentDaoImpl();
List<Student> students = studentDao.load_students();
int i=0;
%>
<form action="xiuGrade.jsp" method="post">
<p>提交成绩</p>
<input type="hidden" name="cno" value="<%=cno %>">
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
		<td><%=student.getSno()%><input type="hidden" name="<%=student.getSno() %>" value="<%=student.getSno() %>" ></td>
		<td><%=student.getSname()%></td>
		<td><%=student.getSSex()%></td>
		<td><%=student.getSage()%></td>
		<td><%=student.getSdept()%></td>
		<td><input type="text" name="sno_<%=i %>" ></td>
		
		</tr>
		<%
		i++;
			}
		%>
		<tr>
		<td colspan="6">
		<input type="submit" value="提交" />
    				<input type="reset" value="重置" /></td>
    	</tr>
		</table>
		</form>

</body>
</html>