package model;

public class Student {
	private String Sno;//ѧ��
	private String Sname;//����
	private String SSex;//�Ա�
	private int Sage;//����
	private String Sdept;//רҵ
	private int grade;//�ɼ�
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
