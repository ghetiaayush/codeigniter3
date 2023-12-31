<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {
	  public function __construct()
	{
		parent::__construct();
		$this->load->model('Employees_list');
	}
//this function is used to load the add employee details form
	public function index()
	{
		$this->load->view('dash/add_employee');
	}
//this function is used to load the employee list 
	public function view_employee()
	{
		$this->load->view('dash/employee_list');
	}
//this function is used to insert the employee details
	public function add_employee()
	{
		if ($this->input->post('add_employee')) 
		{
			$e_name = $this->input->post('e_name');
			$e_email = $this->input->post('e_email');
			$e_phone = $this->input->post('e_phone');
			$e_job = $this->input->post('e_job');

			$employee_details= array(
                'e_name'=>$e_name,
				'e_email'=>$e_email,
				'e_phone'=>$e_phone,
			    'e_job' =>$e_job
			);
			$this->Employees_list->insert_employee($employee_details);
			redirect('employees/view_employee','refresh');
		}
	}
//this function is used to load update_job view 	
public function update_employee_view( $e_id )
	{
		$this->load->view('dash/update_employee',$e_id);
	}
//this function is used to update the employee details
public function update_employee( $e_id )
{
	if ($this->input->post('update_employee'))
	    {
	    	$e_name = $this->input->post('e_name');
			$e_email = $this->input->post('e_email');
			$e_phone = $this->input->post('e_phone');
			$e_job = $this->input->post('e_job');
	    	$employee_details= array(
                'e_name'=>$e_name,
				'e_email'=>$e_email,
				'e_phone'=>$e_phone,
			    'e_job' =>$e_job
			);
			$this->db->where('e_id',$e_id);
			$this->db->update('employees',$employee_details);
			redirect('employees/view_employee','refresh');
		}
}	
//this function is used to delete the employee details
public function delete_employee( $e_id )
	{
        $this->db->where('e_id',$e_id);
		$this->db->delete('employees');
		redirect('employees/view_employee','refresh');
	}
//this function is used to load the single employee details page
	public function single_employee( $e_id )
	{
       $this->load->view('dash/single_employee', $e_id);

	}
//this function is used to go back to the the employee list
 	public function back( )
 	{
 	  $this->load->view('dash/employee_list');	
 	}
}

