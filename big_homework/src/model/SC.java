package model;

public class SC {
  private String Sno;//ѧ��
  private String Cno;//�γ̺�
  private int Grade;//�ɼ���
public String getSno() {
	return Sno;
}
public void setSno(String sno) {
	Sno = sno;
}
public String getCno() {
	return Cno;
}
public void setCno(String cno) {
	Cno = cno;
}
public int getGrade() {
	return Grade;
}
public void setGrade(int grade) {
	Grade = grade;
}
public SC(String sno, String cno, int grade) {
	super();
	Sno = sno;
	Cno = cno;
	Grade = grade;
}
public SC() {
}
}
  

