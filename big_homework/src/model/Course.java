package model;

public class Course {
	private String Cno;//�γ̺�
    private String Cname;//�γ���
    private int Ccredit;//ѧ��
    private int Semester;//ѧ��
    private int grade;//�ɼ�
	public String getCno() {
		return Cno;
	}
	public void setCno(String cno) {
		Cno = cno;
	}
	public String getCname() {
		return Cname;
	}
	public void setCname(String cname) {
		Cname = cname;
	}
	public int getCcredit() {
		return Ccredit;
	}
	public void setCcredit(int ccredit) {
		Ccredit = ccredit;
	}
	public int getSemester() {
		return Semester;
	}
	public void setSemester(int semester) {
		Semester = semester;
	}
	
	public int getGrade() {
		return grade;
	}
	public void setGrade(int grade) {
		this.grade = grade;
	}
	public Course(String cno, String cname, int ccredit, int semester) {
		super();
		Cno = cno;
		Cname = cname;
		Ccredit = ccredit;
		Semester = semester;
	}
	public Course() {
		
	}
	
	
    
}
