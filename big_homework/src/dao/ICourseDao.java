package dao;

import java.util.List;

import model.Course;
import model.SC;
import model.Student;

public interface ICourseDao {

	List<Course> load_course(String Sno);

	List<Course> load_courses();

	void delete(String cno);

	void add(Course course);

	Course load_course2(String cno);

	void update(Course course);

	void xuanke(SC sc);

	void update_SC(SC sc);

}
