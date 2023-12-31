<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Users');

	}
//function to load the login form
	public function index()
	{
		$this->load->view('inc/header');
		$this->load->view('home');
		$this->load->view('inc/footer');
	}
//function to load the registeration form
    public function register()
	{
		$this->load->view('inc/header');
		$this->load->view('register');
		$this->load->view('inc/footer');
	}
//function for login process
	public function login_process()
	{
		if($this->input->post('u_login')){
			$u_name=$this->input->post('u_name');
			$u_pass=$this->input->post('u_pass');

			$user_data = array(
				'u_name'=>$u_name,
				'u_pass'=>$u_pass
			);
        $users_list=$this->db->get_where('users',array('u_name'=>$user_data['u_name']));
        foreach ($users_list->result() as $user) {
        if ($user_data['u_name']==$user->u_name && $user_data['u_pass']==$user->u_pass) 
        {
        	$_SESSION['u_name']=$user_data['u_name'];
        	redirect('dash','refresh');
        }else{
        	echo "<script>alert('username or password incorrect')</script>";
        	redirect('home','refresh');
        }
        }
            }else{redirect('home','refresh');}
	}
//function for registration process
	public function register_process()
	{
		if($this->input->post('u_reg')){
			$u_email=$this->input->post('u_email');
			$u_name=$this->input->post('u_name');
			$u_pass=$this->input->post('u_pass');

			$user_data = array(
				'u_email'=>$u_email,
				'u_name'=>$u_name,
				'u_pass'=>$u_pass
			);
            $this->Users->insert_user($user_data);
            redirect('home','refresh');
            }
            else{
			redirect('home/register','refresh');
		}
	}
//function for logout process
	public function logout()
	{
		session_unset();
		session_destroy();
		redirect('home','refresh');
	}
}
