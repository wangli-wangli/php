package model;

public class Student {
	private String Sno;//学号
	private String Sname;//姓名
	private String SSex;//性别
	private int Sage;//年龄
	private String Sdept;//专业
	private int grade;//成绩
	public String getSno() {
		return Sno;
	}
	public void setSno(String sno) {
		Sno = sno;
	}
	public String getSname() {
		return Sname;
	}
	public void setSname(String sname) {
		Sname = sname;
	}
	public String getSSex() {
		return SSex;
	}
	public void setSSex(String sSex) {
		SSex = sSex;
	}
	public int getSage() {
		return Sage;
	}
	public void setSage(int sage) {
		Sage = sage;
	}
	public String getSdept() {
		return Sdept;
	}
	public void setSdept(String sdept) {
		Sdept = sdept;
	}
	public int getGrade() {
		return grade;
	}
	public void setGrade(int grade) {
		this.grade = grade;
	}
	public Student(String sno, String sname, String sSex, int sage, String sdept) {
		Sno = sno;
		Sname = sname;
		SSex = sSex;
		Sage = sage;
		Sdept = sdept;
	}
	public Student() {
		
	}
	
	

}
