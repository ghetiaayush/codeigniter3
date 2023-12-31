<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee_Jobs extends CI_Model
{
	public function insert_job($job_details){
		$this->db->insert('jobs',$job_details);
	}
}




?>