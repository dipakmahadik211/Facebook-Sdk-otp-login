<?php
class model
{
	var $dbhost;
	var $dbname;
	var $dbpass;
	var $dbuser;
	var $con;
	public function __construct()
	{
		$this->dbhost="localhost";
		$this->dbname="alycollege";
		$this->dbpass="mysql";
		$this->dbuser="root";
	}
	public function connect()
	{
		$this->con=mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass);
		mysqli_select_db($this->con,$this->dbname);
	}
	public function userInfo($id,$firstname,$secondname,$lastname,$dob,$gender,$bloodgrp,$maritalstatus,$fathername,$mothername,
$religion,$castcategory,$castename,$address1,$address2,$landmark,$locality,$pincode,$country,
$state,$dist,$mobile1,$mobile2)
	{
		$this->connect();
		$sql="insert into stud_profile(firstname,midlename,lastname,dob,gender,bloodgroup,
			marital_status,fathername,mothername,religion,caste_category,namecast,address1,
			address2,landmark,locality,pincode,country,state,dist,mobile,mobile2)values
        	('".$firstname."','".$secondname."','".$lastname."','".$dob."' ,'".$gender."',
        	'".$bloodgrp."','".$maritalstatus."','".$fathername."','".$mothername."','".$religion."',
        	'".$castcategory."','".$castename."','".$address1."','".$address2."','".$landmark."',
        	'".$locality."','".$pincode."','".$country."','".$state."','".$dist."','".$mobile1."',
        	'".$mobile2."')";

		mysqli_query($this->con,$sql);
	}
	public function getData()
    {      
        $this->connect();
        
        $sql = "select * from stud_profile where mobile=7798868349";
        $result=mysqli_query($this->con,$sql);
               $counter = 0;
        while ($row=mysqli_fetch_row($result))
        {
            $dataArr[$counter++] = $row;
              
        }

        
        return $dataArr;
    }
}
?>