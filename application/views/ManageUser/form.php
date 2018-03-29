<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
<!-- NEW WIDGET START -->
	<article class="col-sm-12 col-md-12 col-lg-12">

		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
			<header>
				<span class="widget-icon"> <i class="fa fa-eye"></i> </span>
				<h2>Form Add </h2>
			</header>
				
			<!-- widget div-->
			<div>
			<!-- widget content -->
			<div class="widget-body">
				<?php echo form_open($url,array('class'=>'form-horizontal','id'=>'validation-form',
					'data-bv-message'=>'This field is required',
					'data-bv-feedbackicons-valid'=>'glyphicon glyphicon-ok',
					'data-bv-feedbackicons-invalid'=>'glyphicon glyphicon-remove',
					'data-bv-feedbackicons-validating'=>'glyphicon glyphicon-refresh'
				)); ?>

				<fieldset>
					<legend><?php echo $title; ?></legend>
					
					<div class="form-group">
						<label for="UserID" class="col-md-2 control-label">Userid <span class="text-danger"><b>*</b></span></label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'userid','maxlength'=>32,'id'=>'UserID','class'=>'form-control','data-bv-notempty'=>'true');
								echo form_input($input);
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="FirstName" class="col-md-2 control-label">First Name <span class="text-danger"><b>*</b></span></label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'first_name','maxlength'=>64,'id'=>'FirstName','class'=>'form-control','data-bv-notempty'=>'true');
								echo form_input($input);
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="MiddleName" class="col-md-2 control-label">Middle Name</label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'middle_name','maxlength'=>64,'id'=>'MiddleName','class'=>'form-control');
								echo form_input($input);
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="LastName" class="col-md-2 control-label">Last Name <span class="text-danger"><b>*</b></span></label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'last_name','maxlength'=>64,'id'=>'LastName','class'=>'form-control','data-bv-notempty'=>'true');
								echo form_input($input);
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="Email" class="col-md-2 control-label">Email</label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'email','maxlength'=>128,'id'=>'Email','class'=>'form-control');
								echo form_input($input);
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="Password" class="col-md-2 control-label">Password <span class="text-danger"><b>*</b></span></label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'password','id'=>'Password','maxlength'=>32,'class'=>'form-control','data-bv-notempty'=>'true');
								echo form_password($input);
							?>
							<span class="lbl"></span>
						</div>
					</div>
					<div class="form-group">
						<label for="RePassword" class="col-md-2 control-label">Re-Type Password <span class="text-danger"><b>*</b></span></label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'password_re','id'=>'RePassword','maxlength'=>32,'class'=>'form-control','data-bv-notempty'=>'true');
								echo form_password($input);
							?>
							<span class="lbl"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="Status" class="col-md-2 control-label">Active</label>
						<div class="col-md-2">
							<span>
								<span class="onoffswitch">
									 <?php
										echo form_checkbox('active',1,0,'class="onoffswitch-checkbox" id="st3"'); 
									?>
									<label class="onoffswitch-label" for="st3"> 
										<span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
										<span class="onoffswitch-switch"></span> 
									</label> 
								</span>
							</span>

						</div>
					</div>
				</fieldset>

				<div class="form-actions">
					<div class="row">
						<div class="col-md-12">
							<?php 
								echo anchor('manage_user', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
							?>
							<button class="btn btn-primary" type="submit" name="btn_submit" value="save">
								<i class="fa fa-save"></i>
								Submit
							</button>
						</div>
					</div>
				</div>
				<br/>
				<?php echo form_close(); ?>
			</div>
			<!-- end widget content -->
		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->
</div>

<!-- <div class="row-fluid">
	<div class="span8 offset2 panel-box">
		<div><h3><?php echo $title; ?></h3></div>
		<?php echo form_open($url,array('name'=>'myForm','class'=>'form-horizontal','id'=>'validation-form')); ?>
		<div class="hr"></div>
        <span class="red bolder smaller">Fields with * are required.</span>
		<div class="hr"></div>
		<fieldset>

		
			<div class="form-actions">
				<button type="submit" name="submit" value="Save" class="btn btn-small btn-info"><i class="icon-save"></i> Save</button> &nbsp;
				<?php 
					echo anchor('manage_user', '<i class="icon-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-primary'));
				?>
			</div>
		</fieldset>
		<?php echo form_close(); ?>
	</div>
</div> -->