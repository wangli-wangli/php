
<%@page import="Util.UserException"%>
<%@page import="Util.ValidateUtil"%>
<%@page import="dao.CourseDaoImpl"%>
<%@page import="model.Course"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<%
	//接收客户端传递过来的参数
	String Cno = request.getParameter("Cno");
    String Cname = request.getParameter("Cname");
    int  Ccredit= Integer.parseInt(request.getParameter("Ccredit"));
    int Semester = Integer.parseInt(request.getParameter("Semester"));

    Course student=new Course(Cno,Cname,Ccredit,Semester);
    CourseDaoImpl CourseDao = new CourseDaoImpl();
	
    CourseDao.add(student);
	//重定向
	 response.sendRedirect("list_Course.jsp"); 
%>
</html>