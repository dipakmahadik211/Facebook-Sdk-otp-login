<?php
require('model.php');
class controller
{
	var $daoObj;
	var $userdetails;
	function set_userdata($userArr)
	{
		$this->userdetails = $userArr;
	}

	function get_userdata()
	{
		return $this->userdetails;
	}
	public function connect()
	{
		$this->daoObj=new model();
	}
	public function stud_profile($dataArr)
	{
		$this->connect();
		$this->daoObj->userInfo($dataArr['txtMobile1'],$dataArr['txt_Fname'],$dataArr['txtMname'],$dataArr['txtLname'],
									$dataArr['txtDOB'],$dataArr['ddlGender'],$dataArr['ddlBoodGroup'],$dataArr['ddlMaritalStatus'],
									$dataArr['txtFatherName'],$dataArr['txtMotherName'],$dataArr['ddlReligion'],$dataArr['ddlCastCategory'],
									$dataArr['ddlCast'],$dataArr['txtAddress1'],$dataArr['txtAddress2'],$dataArr['txtLandmark'],
									$dataArr['txtLocality'],$dataArr['txtPincode'],$dataArr['ddlCountry'],$dataArr['ddlState'],
									$dataArr['ddlCity'],$dataArr['txtMobile1'],$dataArr['txtMobile2']);
	}
	public function displayprofileInfo()
	{
	  $dataArr = $this->daoObj->getData();
        if(count($dataArr) == 1)
        {
            $this->set_userdata($dataArr[0]);
            return true;
        }
        else
        {
            return false;
        }
	}
}
?>