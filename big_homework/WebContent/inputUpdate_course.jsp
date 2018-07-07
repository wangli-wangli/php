<%@page import="Util.ValidateUtil"%>
<%@page import="model.Course"%>
<%@page import="dao.CourseDaoImpl"%>
<%@page import="dao.ICourseDao"%>
<%@page import="Util.UserException"%>
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
		String Cno = request.getParameter("Cno");
    	CourseDaoImpl CourseDao = new CourseDaoImpl();
    	Course Course = CourseDao.load_course2(Cno);
	%>
	<p>修改课程</p>
	<form action="update_course.jsp" method="post">
		<table align="center" border="1" width="500">
			<tr>
				<td>课程号 : </td>
				<td>
					<%=Course.getCno() %>
					 <input type="hidden" name="Cno" value="<%=Course.getCno() %>"/>
				</td>
			</tr>
				<tr>
    			<td>课程名:</td>
    			<td>
    				<input type="text" name="Cname" value="<%=Course.getCname() %>"/></td>
    		</tr>
    		<tr>
    			<td>学分:</td>
    			<td>
 
    				<input type="text" name="Ccredit" value="<%=Course.getCcredit() %>"/></td>
    		</tr>
    		<tr>
    			<td>学期:</td>
    			<td>
    				<input type="text" name="Semester" value="<%=Course.getSemester() %>" />
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