<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class Magazine extends CI_Controller{

 	public function index()
 	{
 		$data = array();
 		$this->load->view('magazine_form');
 	}

 	public function add(){
 		$this->load->model('Publication');
 		$publications = $this->Publication->get();
 		$publication_from_option= array();
 		foreach ($publications as $id => $publication){
 			$publication_form_option[$id]=$publication->publication_name;
 		}

 		$this->load->library('form_validation');
 		$this->form_validation->set_rules(array(
              array( 'field'=>'publication_id',
               'label'=>'publication',
               'rules'=>'required',
 			),
 		array(
                'field'=>'issue_number',
                'label'=>'issue number',
                'rules'=>'required|is_numeric',
 			),
 		array(
                'field'=>'issue_date_pubication',
                'label'=>'publication_date',
                'rules'=>'required|callback_date_validation'
 			),
 		));
 		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');

 		if(!$this->from_validation->run())
 		{

 		$this->load->view('magazine_form',array(
            publication_form_options => $publication_from_options,
 			));	
 		}
 		else
 		{
 			$this->load->model('Issue');
 			$issue=new Issue();
 			$issue->publication_id=$this->input->post('publication_id');
 			$issue->issue_number=$this->input->post('issue_number');
 			$issue->issue_date_publication=$this->input->post('issue_date_publication');
 			$issue->save();
 			$this->load->view('magazine_from_success',array(
                'issue'=>$issue,
 				)); 
 		}
 	
 	}
 	public function date_validation($input)
 	{
 		# code...
 		$test_date=explode('-',$input);
 		if(!@checkdate($test_date[1], $test_date[2], $test_date[0])){
 			$this->form_validation->set_message('date_validation','the $s field must be in YYYY-MM-DD fromat.');
 			return FALSE;
 		}
 		return TRUE;

 	}
 }
?>