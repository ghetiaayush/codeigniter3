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
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <div class="panel-heading">Update Job</div>
          <div class="panel-body">
<?php echo form_open('Jobs/update_process_job/'.$id,'class="form-horizontal"');?> 
<?php


$jobs_list=$this->db->get_where('jobs',array('j_id'=>$id));
foreach ($jobs_list->result() as $job) 
  {?>
  

<div class="form-group">
    <label class="col-sm-2 control-label">Update Job</label>
    <div class="col-sm-10">
      <input type="text" name="j_name" value="<?php echo $job->j_name;?>"class="form-control input-sm" placeholder="Job Name">
    </div>
  </div>
  

<?php
}
?>          
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="update_job" value="Update Job" class="btn btn-primary btn-sm">
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