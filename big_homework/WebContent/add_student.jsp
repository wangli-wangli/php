
<%@page import="Util.UserException"%>
<%@page import="Util.ValidateUtil"%>
<%@page import="dao.StudentDaoImpl"%>
<%@page import="model.Student"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<%
	//接收客户端传递过来的参数
	String Sno = request.getParameter("name");
String Sname = request.getParameter("name");
String Ssex = request.getParameter("sex");
int Sage = Integer.parseInt(request.getParameter("age"));
String Sdept = request.getParameter("Sdept");

	Student student=new Student(Sno,Sname,Ssex,Sage,Sdept);
	StudentDaoImpl studentDao = new StudentDaoImpl();
	
	studentDao.add(student);
	//重定向
	 response.sendRedirect("list_student.jsp"); 
%>
</html>