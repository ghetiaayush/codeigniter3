<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
	  public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_Jobs');

	}
//function to load add_job view
public function index()
	{
		$this->load->view('dash/add_job');
	}
//function to load job_list view
public function view_job()
	{
		$this->load->view('dash/job_list');
	}

//function to insert jobs
public function insert_job()
	{
		if ($this->input->post('insert_job')) {
			$j_name=$this->input->post('j_name');

			$job_data = array(
				'j_name'=>$j_name,
			);
			$this->Employee_Jobs->insert_job($job_data);
			redirect('jobs/view_job','refresh');
		}
	}
//function to load update_job view 	
public function update_job( $j_id )
	{
		$this->load->view('dash/update_job',$j_id);
	}
//function to update job
public function update_process_job( $j_id )
	{
	    if ($this->input->post('update_job'))
	    {
	    	$j_name=$this->input->post('j_name');
	    	$job_details = array(
				'j_name'=>$j_name,
			);
			$this->db->where('j_id',$j_id);
			$this->db->update('jobs',$job_details);
			redirect('jobs/view_job','refresh');
		}
	}
//function to delete job
public function delete_job( $j_id )
	{
        $this->db->where('j_id',$j_id);
		$this->db->delete('jobs');
		redirect('jobs/view_job','refresh');
	}
}