<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Blog extends CI_Controller{

	function index(){
		$this->load->view('welcome_message');
	}

}
?>