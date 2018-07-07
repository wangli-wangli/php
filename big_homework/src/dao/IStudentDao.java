package dao;

import java.util.List;

import model.Student;

public interface IStudentDao {
	public List<Student> load_students();

	List<Student> load_students(String cno);

	void delete(String sno);

	void add(Student student);

	Student load_student(String sno);

	void update(Student student);


		
	

}
