<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		if (!$this->session->userdata('loggedin')) {
			redirect('user/login', 'refresh');
		}
		$data['username'] = $this->session_data['username'];
		
		$this->load->view('header', $data);
		$data['check_perm'] = $this->check_perm;
		$this->load->view('sidebar', $data);
	}
	
	public function itemdb_search() {
		$this->usermodel->update_user_active($this->session_data['id'],"database/itemdb/search");
		$this->load->view('database/item/search');
		$this->load->view('footer');
	}
	
	public function itemdb_list() {
		
	}
}