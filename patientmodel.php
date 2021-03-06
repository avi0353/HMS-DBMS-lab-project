function get_patient_details($p)
{
	$temp=$this->db->query(
	"select p_id, Name, Sex, DOB, Age, Address, PhNo
	from patient
     where p_id={$p}");
	 
	 return $temp;
}

function get_patient_status_from_inpatient($p)

{
	
	$temp=$this->db->query(
	"select * from inpatient 
	where p_id={$p}");
	return $temp;
}

function get_patient_status_from_outpatient($p)
{
	$temp=this->db->query
	("select * from outpatient 
	where p_id={$p}");
	return $temp;
	
}

function get_patient_status_from_casualty($p)
{
	$temp=this->db->query
	("select * from casualty 
	where p_id={$p}");
	return $temp;
	
}
function get_doctors_id($p)
{
	$temp=this->db->query
	("select d_id from treats 
	where p_id={$p} ");
	return $temp;
	
}


function get_doctor_details($e)
{
	$temp=this->db->query
	("select e.e_id, d.Dept, d.Designation, e.contact_no, e.qualification
	from doctor d, employee e
	where d.e_id= e.e_id and d.e_id={$e}");
	return $temp;
	
}


function get_medical_history($p)
{
	$temp=this->db->query
	("select  p_id, mh.Dept, mh.units, mh.m_id, mh.units
	from medicine m, medical_history mh
	where mh.p_id={$p} and mh.m_id=m.m_id 
	return $temp;
	
}
