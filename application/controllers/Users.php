<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
//this function is used to load the employee list 
	public function view_user()
	{
		$this->load->view('dash/user_list');
	}
}