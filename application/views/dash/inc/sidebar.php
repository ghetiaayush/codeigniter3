  <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>            
            
			<div class="panel panel-default">
				<div class="panel-heading">Employees Action</div>
				<div class="list-group">
					<a href="<?php echo site_url();?>employees" class="list-group-item">Add Employee Detail </a>
					<a href="<?php echo site_url();?>employees/view_employee" class="list-group-item">
					Employee Detail List</a>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">Jobs Action</div>
				<div class="list-group">
					<a href="<?php echo site_url();?>jobs" class="list-group-item">Add job Details </a>
					<a href="<?php echo site_url();?>jobs/view_job" class="list-group-item">job Detail list</a>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">Users Action</div>
				<div class="list-group">
				<a href="<?php echo site_url();?>users/view_user" class="list-group-item">Users Detail list</a>
				</div>
			</div>
			
