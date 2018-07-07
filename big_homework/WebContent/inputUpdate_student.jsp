<%@page import="Util.ValidateUtil"%>
<%@page import="model.Student"%>
<%@page import="dao.StudentDaoImpl"%>
<%@page import="dao.IStudentDao"%>
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
		String Sno = request.getParameter("sno");
    	StudentDaoImpl userDao = new StudentDaoImpl();
    	Student Student = userDao.load_student(Sno);
	%>
	<p>修改学生信息</p>
	<form action="update_student.jsp" method="post">
		<table align="center" border="1" width="500">
			
			<tr>
				<td>学号 : </td>
				<td>
				   <input type="hidden" name="number" value="<%=Student.getSno() %>"/>
					<%=Student.getSno() %>
					
				</td>
			</tr>
				<tr>
    			<td>姓名:</td>
    			<td>
    				<input type="text" name="name" value="<%=Student.getSname() %>"/></td>
    		</tr>
    		<tr>
    			<td>性别:</td>
    			<td>
    			<input type="text" name="sex" value="<%=Student.getSSex() %>"/></td>	
    		</tr>
    		<tr>
    			<td>年龄:</td>
    			<td>
    				<input type="text" name="age" value="<%=Student.getSage()%>"/>岁</td>	
    		</tr>
    		<tr>
    			<td>专业:</td>
    			<td>
    				<input type="text" name="Sdept" value="<%=Student.getSdept()%>"/></td>
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