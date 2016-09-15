<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct() {
          parent::__construct();
		  $this->load->model('patient/patient');
        
         }
	public function index()
	{
		$data=array();
		$data["patient"]=$this->patient->get_patient_details($_GET["login_id"]);//all details from patient
		if ($data["patient"]["status"]== "in"){
			$data["status"]=$this->patient->get_patient_status_from_inpatient($_GET["login_id"]);//all details from inpatient
			}
		elseif ($data["patient"]["status"]== "out"){
			$data["status"]=$this->patient->get_patient_status_from_outpatient($_GET["login_id"]);//all details from outpatient
			}
			else
			{
				$data["status"]=$this->patient->get_patient_status_from_casualty($_GET["login_id"]); //all details of a patient from casualty
				
			}
		$data["treat"]=$this->patient->get_doctors_id($_GET["login_id"]);//get all doctors id from treat table treating a patient
		if(isset($_GET["doctor"])
		{
			$data["flag"]=$_GET["doctor"];
			$data["doctor_detail"]=$this->patient->get_doctor_details($_GET["doctor"]);//join employee and doctor
		}
		$data["medical_history"]=$this->patient->get_medical_history($_GET["login_id"]);//join medical history and medicine
			
		$this->load->view('patient/header.php');
		$this->load->view('patient/Patient.php',$data);
		$this->load->view('patient/footer.php');
	}
}
