package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import Util.DBUtil;
import model.Student;

public class StudentDaoImpl implements IStudentDao{

	@Override
	public List<Student> load_students() {
		Connection connection = DBUtil.getConnection();
		String sql = "select * from Student";

		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		List<Student> students = new ArrayList<Student>();
		Student student = null;
		try {
			preparedStatement = connection.prepareStatement(sql);
			resultSet = preparedStatement.executeQuery();
		
			while(resultSet.next()) {
				student = new Student();
			
				student.setSno(resultSet.getString("Sno"));
				student.setSname(resultSet.getString("Sname"));
				student.setSSex(resultSet.getString("Ssex"));
				student.setSage(resultSet.getInt("Sage"));
				student.setSdept(resultSet.getString("Sdept"));
				students.add(student);
			}
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			DBUtil.close(resultSet);
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
	
		return students;

	}
	
	
	
	@Override
	public Student load_student(String sno) {
		Connection connection = DBUtil.getConnection();
		String sql = "select * from Student where Sno='"+sno+"'";

		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		Student student = null;
		try {
			preparedStatement = connection.prepareStatement(sql);
			resultSet = preparedStatement.executeQuery();
		
			while(resultSet.next()) {
				student = new Student();
			
				student.setSno(resultSet.getString("Sno"));
				student.setSname(resultSet.getString("Sname"));
				student.setSSex(resultSet.getString("Ssex"));
				student.setSage(resultSet.getInt("Sage"));
				student.setSdept(resultSet.getString("Sdept"));
				
			}
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			DBUtil.close(resultSet);
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
	
		return student;

	}
	
	
	
	
	@Override
	public List<Student> load_students(String cno) {
		Connection connection = DBUtil.getConnection();
		String sql = "select * from Student join SC on SC.Sno=Student.Sno where SC.cno='"+cno+"'";

		PreparedStatement preparedStatement = null;
		ResultSet resultSet = null;
		List<Student> students = new ArrayList<Student>();
		Student student = null;
		try {
			preparedStatement = connection.prepareStatement(sql);
			resultSet = preparedStatement.executeQuery();
		
			while(resultSet.next()) {
				student = new Student();
			
				student.setSno(resultSet.getString("Sno"));
				student.setSname(resultSet.getString("Sname"));
				student.setSSex(resultSet.getString("Ssex"));
				student.setSage(resultSet.getInt("Sage"));
				student.setSdept(resultSet.getString("Sdept"));
				student.setGrade(resultSet.getInt("Grade"));
				students.add(student);
			}
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			DBUtil.close(resultSet);
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
	
		return students;

	}
	@Override
	public void delete(String sno) {
		Connection connection = DBUtil.getConnection();
		
		String sql2 = "delete from Student where sno = ?";
		PreparedStatement preparedStatement = null;
		
		try {
			preparedStatement = connection.prepareStatement(sql2);
			preparedStatement.setString(1,sno);
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
	public void add(Student student) {
		//获得链接对象
				Connection connection = DBUtil.getConnection();
				
				//创建语句传输对象
				PreparedStatement preparedStatement = null;
				ResultSet resultSet = null;
				try {
				
					//遍历结果集
					String sql = "insert into Student(Sno,Sname,Ssex,Sage,Sdept) value (?,?,?,?,?)";
						
					preparedStatement = connection.prepareStatement(sql);
					preparedStatement.setString(1, student.getSno());
					preparedStatement.setString(2,student.getSname());
					preparedStatement.setString(3,student.getSSex());
					preparedStatement.setInt(4,student.getSage());
					preparedStatement.setString(5,student.getSdept());
					
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
	public void update(Student student) {
		
		Connection connection = DBUtil.getConnection();
		//准备sql语句
		String sql = "update Student set Sname = ?,Ssex=?,Sage=?,Sdept=? where Sno=?";
		//创建语句传输对象
		PreparedStatement preparedStatement = null;
		try {
			
			preparedStatement = connection.prepareStatement(sql);
			preparedStatement.setString(1,student.getSname() );
			preparedStatement.setString(2, student.getSSex());
			preparedStatement.setInt(3, student.getSage());
			preparedStatement.setString(4, student.getSdept());
			preparedStatement.setString(5, student.getSno());
		
			preparedStatement.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}finally {
			DBUtil.close(preparedStatement);
			DBUtil.close(connection);
		}
	}

}
