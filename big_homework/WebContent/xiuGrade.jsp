<%@page import="model.Student"%>
<%@page import="dao.StudentDaoImpl"%>
<%@page import="dao.IStudentDao"%>
<%@page import="Util.UserException"%>
<%@page import="model.Student" %>
<%@page import="java.util.List"%>
<%@page import="model.SC" %>
<%@page import="dao.CourseDaoImpl"%>
<%@page import="dao.ICourseDao"%>
<%@page import="model.Course" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"">
<title>Insert title here</title>
</head>
<body>
<%
String cno=request.getParameter("cno");
StudentDaoImpl studentDao = new StudentDaoImpl();
List<Student> students = studentDao.load_students();
int i=0;
for (Student student : students) {
	String sno=request.getParameter(""+student.getSno());
	int grade=Integer.parseInt(request.getParameter("sno_"+i));
	SC sc=new SC(sno,cno,grade);
	CourseDaoImpl courseDao=new CourseDaoImpl();
	courseDao.update_SC(sc);
	i++;
	
}
response.sendRedirect("list_Course.jsp"); 


%>

</body>
</html>