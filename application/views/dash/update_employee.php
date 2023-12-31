<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!$_SESSION['u_name']) {
redirect('home','refresh');
}
$id=$this->uri->segment(3);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  </head>
  <body>
  	<!-- dash nav start-->
<?php $this->load->view('dash/inc/nav');?>
  	<!-- dash nav end -->

<!-- dash data -->
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-md-3">
			<!-- sidebar start -->
			<?php $this->load->view('dash/inc/sidebar');?>
			<!-- sidebar end -->
		</div>

		<div class="col-lg-9 col-md-9">
            <div class="panel panel-default">
          <div class="panel-heading">Update Employee</div>
          <div class="panel-body">
<?php echo form_open('employees/update_employee/'.$id,'class="form-horizontal"');?> 
<?php
$employee_list=$this->db->get_where('employees',array('e_id'=>$id));
foreach ($employee_list->result() as $employee) 
{
  ?>

<div class="form-group">
    <label class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="e_name" value="<?php echo $employee->e_name;?>" class="form-control input-sm" placeholder="Enter Employee Name">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Email ID</label>
    <div class="col-sm-10">
      <input type="text" name="e_email" value="<?php echo $employee->e_email;?>" class="form-control input-sm" placeholder="Enter Employee E-mail">
    </div>
  </div>

<div class="form-group">
    <label class="col-sm-2 control-label">Phonenumber</label>
    <div class="col-sm-10">
      <input type="text" name="e_phone" value="<?php echo $employee->e_phone;?>" 
      class="form-control input-sm" placeholder="Enter Employee phonenumber">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Select Job</label>
    <div class="col-sm-10">
      <select name="e_job" class="form-control input-sm">
        <option value="-"><?php echo $employee->e_job;?></option>
        <?php
        $job_list=$this->db->get('jobs');
        foreach ($job_list->result() as $job) 
        {
          ?>
             <option value="<?php echo $job->j_name; ?>"><?php echo $job->j_name; ?></option>
              <?php
                  }
                   ?>
                    </select>
                   </div>
                  </div>
<?php
}
?>
<div class="form-group">
                   <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" name="update_employee" value="update employee" 
                  class="btn btn-primary btn-sm">
                </div>
              </div>
            </form>
          </div>
        </div>  
    </div>
	</div>
</div>
<!-- dash data -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  </body>
</html>