<?php
	  class Config
	  {
		  private $webname="",$weburl="",$systemurl="";
			  
		  public function Config(){		  
			  global $conn;
			  $query = mysqli_query($conn,"select * from xh_config");
			  while($row=mysqli_fetch_array($query))
			  {
				  $this->webname=trim($row["webname"]);
				  $this->weburl=trim($row["weburl"]);
				  $this->systemurl=trim($row["systemurl"]);
						  
			  }
			  mysqli_free_result($query);
		  }
		  public function getwebname(){
			  return $this->webname;
		  }
		  public function getweburl(){
			  return $this->weburl;
		  }
		  public function getsystemurl(){
			  return $this->systemurl;
		  }
		 
	  }  
	  $cfg=new Config();  
?>