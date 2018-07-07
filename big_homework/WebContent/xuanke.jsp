<%@ page import="model.SC" %>
<%@page import="dao.CourseDaoImpl"%>
<%@page import="dao.ICourseDao"%>
<%@page import="Util.UserException"%>
<%@page import="model.Course" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<%
String sno = request.getParameter("sno");
String[] xuanke=request.getParameterValues("xuan");
for(String xuanke2:xuanke)
{
	SC sc=new SC();
	sc.setSno(sno);
	sc.setCno(xuanke2);
	sc.setGrade(0);
	CourseDaoImpl courseDao=new CourseDaoImpl();
	courseDao.xuanke(sc);	
}
response.sendRedirect("list_student.jsp");
%>

</body>
</html>