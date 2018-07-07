package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import Util.DBUtil;
import model.Course;
import model.SC;
import model.Student;

public class CourseDaoImpl implements ICourseDao{

	@Override
	public List<Course> load_course(String Sno) {
		Connection connection = DBUtil.getConnection();
		String sql = "select * from Course join SC on SC.Cno=Course.Cno where SC.Sno='"+Sno+"'";

		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		List<Course> courses = new ArrayList<Course>();
		Course course = null;
		try {
			preparedStatement = connection.prepareStatement(sql);
			resultSet = preparedStatement.executeQuery();
		
			while(resultSet.next()) {
				course = new Course();
				course.setCno(resultSet.getString("Cno"));
				course.setCname(resultSet.getString("Cname"));
				course.setCcredit(resultSet.getInt("Ccredit"));
				course.setSemester(resultSet.getInt("Semester"));
				course.setGrade(resultSet.getInt("Grade"));
				courses.add(course);
			}
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			DBUtil.close(resultSet);
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
		return courses;

	}

	@Override
	public List<Course> load_courses() {
		Connection connection = DBUtil.getConnection();
		String sql = "select * from Course ";

		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		List<Course> courses = new ArrayList<Course>();
		Course course = null;
		try {
			preparedStatement = connection.prepareStatement(sql);
			resultSet = preparedStatement.executeQuery();
		
			while(resultSet.next()) {
				course = new Course();
				course.setCno(resultSet.getString("Cno"));
				course.setCname(resultSet.getString("Cname"));
				course.setCcredit(resultSet.getInt("Ccredit"));
				course.setSemester(resultSet.getInt("Semester"));
				courses.add(course);
			}
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			DBUtil.close(resultSet);
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
		return courses;

	}
	
	@Override
	public Course load_course2(String cno) {
		Connection connection = DBUtil.getConnection();
		String sql = "select * from Course where Cno='"+cno+"'";

		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		Course course = null;
		try {
			preparedStatement = connection.prepareStatement(sql);
			resultSet = preparedStatement.executeQuery();
		
			while(resultSet.next()) {
				course = new Course();
				course.setCno(resultSet.getString("Cno"));
				course.setCname(resultSet.getString("Cname"));
				course.setCcredit(resultSet.getInt("Ccredit"));
				course.setSemester(resultSet.getInt("Semester"));
				
			}
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			DBUtil.close(resultSet);
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
		return course;

	}
	
	
	
	@Override
	public void delete(String cno) {
		Connection connection = DBUtil.getConnection();
		
		String sql2 = "delete from Course where cno = ?";
		PreparedStatement preparedStatement = null;
		
		try {
			preparedStatement = connection.prepareStatement(sql2);
			preparedStatement.setString(1,cno);
			preparedStatement.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
		
		
	}
	
	@Override
	public void add(Course course) {
		//获得链接对象
				Connection connection = DBUtil.getConnection();
				
				//创建语句传输对象
				PreparedStatement preparedStatement = null;
				ResultSet resultSet = null;
				try {
				
					//遍历结果集
					String sql = "insert into Course(Cno,Cname,Ccredit,Semester) values(?,?,?,?)";
						
					preparedStatement = connection.prepareStatement(sql);
					preparedStatement.setString(1, course.getCno());
					preparedStatement.setString(2, course.getCname());
					preparedStatement.setInt(3, course.getCcredit());
					preparedStatement.setInt(4, course.getSemester());
					
					
					preparedStatement.executeUpdate();
				} catch (SQLException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}finally {
					//关闭资源
					DBUtil.close(resultSet);
					DBUtil.close(preparedStatement);
					DBUtil.close(connection);
				}
				
			}
	
	@Override
	public void update(Course course) {
		
		Connection connection = DBUtil.getConnection();
		//准备sql语句
		String sql = "update Course set Cname = ?,CCredit=?,Semester=? where Cno=?";
		//创建语句传输对象
		PreparedStatement preparedStatement = null;
		try {
			
			preparedStatement = connection.prepareStatement(sql);
			preparedStatement.setString(1,course.getCname() );
			preparedStatement.setInt(2, course.getCcredit());
			preparedStatement.setInt(3, course.getSemester());
			preparedStatement.setString(4, course.getCno());
		
			preparedStatement.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
	}
	
	@Override
	public void update_SC(SC sc) {
		System.out.println("grade:"+sc.getGrade());
		System.out.println("cno:"+sc.getCno());
		System.out.println("sno:"+sc.getSno());
		Connection connection = DBUtil.getConnection();
		//准备sql语句
		String sql = "update SC set Grade=? where Cno=? and Sno=?";
		//创建语句传输对象
		PreparedStatement preparedStatement = null;
		try {
			
			preparedStatement = connection.prepareStatement(sql);
			preparedStatement.setInt(1,sc.getGrade());
			preparedStatement.setString(2, sc.getCno());
			preparedStatement.setString(3, sc.getSno());
			
		
			preparedStatement.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
	}
	
	
	@Override
	public void xuanke(SC sc) {
		System.out.println("Sno2:"+sc.getSno());
		System.out.println("Cno2:"+sc.getCno());
		Connection connection = DBUtil.getConnection();
		
		//创建语句传输对象
		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		try {
		
			//遍历结果集
			String sql = "insert into SC(Sno,Cno) values(?,?)";
				
			preparedStatement = connection.prepareStatement(sql);
			preparedStatement.setString(1, sc.getSno());
			preparedStatement.setString(2, sc.getCno());
			
			
			
			preparedStatement.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			//关闭资源
			DBUtil.close(resultSet);
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
		
	}
	
		


}
