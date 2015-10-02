<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Install extends MY_Controller {
 
	function __construct() {
		parent::__construct();
		if ($this->config->item('panel_installed') == "yes") {
			redirect('user/login', 'refresh');
		}
	}
	
	public function index() {
		$this->load->view('install/index');
		$this->load->view('install/footer');
	}
	
	public function step2() {
		$key = $this->input->post('key');
		if ($key != $this->config->item('encryption_key') {
			$this->form_validation->set_message('Invalid encryption key. Set the encryption key to the same in /application/config/config.php');
			return false;
		}
		else {
			$this->load->view('install/step2');
			$this->load->view('install/footer');
		}
	}
	
	public function step3() {
		
	}
	