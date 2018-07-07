<%@page import="model.Student"%>
<%@page import="dao.CourseDaoImpl"%>
<%@page import="dao.ICourseDao"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
String cno =request.getParameter("Cno");
CourseDaoImpl courseDao=new CourseDaoImpl();
courseDao.delete(cno);
response.sendRedirect("list_student.jsp");

%>

</body>
</html>