<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">

<!-- NEW WIDGET START -->
	<article class="col-sm-12 col-md-12 col-lg-12">

		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
			<header>
				<span class="widget-icon"> <i class="fa fa-eye"></i> </span>
				<h2>Form Edit </h2>
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
						<label for="UserID" class="col-md-2 control-label">Userid</label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'userid2','value'=>$userid2,'maxlength'=>32,'id'=>'UserID','class'=>'form-control','disabled'=>'disabled');
								echo form_input($input);
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="FirstName" class="col-md-2 control-label">First Name <span class="text-danger"><b>*</b></span></label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'first_name','value'=>$first_name,'maxlength'=>64,'id'=>'FirstName','class'=>'form-control','data-bv-notempty'=>'true');
								echo form_input($input);
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="MiddleName" class="col-md-2 control-label">Middle Name</label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'middle_name','value'=>$middle_name,'maxlength'=>64,'id'=>'MiddleName','class'=>'form-control');
								echo form_input($input);
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="LastName" class="col-md-2 control-label">Last Name <span class="text-danger"><b>*</b></span></label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'last_name','value'=>$last_name,'maxlength'=>64,'id'=>'LastName','class'=>'form-control','data-bv-notempty'=>'true');
								echo form_input($input);
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="Email" class="col-md-2 control-label">Email</label>
						<div class="col-md-4">
							<?php
								$input = array('name'=>'email','value'=>$email,'maxlength'=>128,'id'=>'Email','class'=>'form-control');
								echo form_input($input);
							?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="Status" class="col-md-2 control-label">Active</label>
						<div class="col-md-2">
							<span>
								<span class="onoffswitch">
									 <?php
										echo form_checkbox('active',1,$active,'class="onoffswitch-checkbox" id="st3"'); 
									?>
									<label class="onoffswitch-label" for="st3"> 
										<span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
										<span class="onoffswitch-switch"></span> 
									</label> 
								</span>
							</span>

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label"><b>Reset Password</b></label>
						<div class="col-md-4">
							<span>
								<span class="onoffswitch">
									<input id="skip-password" type="checkbox" name="choice_pwd" value="1" class="onoffswitch-checkbox" />
									<label class="onoffswitch-label" for="skip-password"> 
										<span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
										<span class="onoffswitch-switch"></span> 
									</label> 
								</span>
							</span>
						</div>
					</div>
					<div id="reset-password">
						<div class="form-group">
							<label for="Password" class="col-md-2 control-label">New Password</label>
							<div class="col-md-4">
								<?php
									$input = array('name'=>'password','id'=>'Password','maxlength'=>32,'class'=>'form-control');
									echo form_password($input);
								?>
								<span class="lbl"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="RePassword" class="col-md-2 control-label">Re-Type Password</label>
							<div class="col-md-4">
								<?php
									$input = array('name'=>'password_re','id'=>'RePassword','maxlength'=>32,'class'=>'form-control');
									echo form_password($input);
								?>
								<span class="lbl"></span>
							</div>
						</div>
					</div>

					<div class="form-actions">
						<div class="row">
						<div class="col-md-12">

						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-danger btn-small dropdown-toggle">
								<i class="fa fa-plus-circle">  More..</i> 
								<span class="caret"></span>
							</button>	
							&nbsp;&nbsp;
							<ul class="dropdown-menu dropdown-danger">
								<li>
									<?php 
										echo anchor('manage_user/CTRL_Privileges_User/'.$userid, '<i class="fa fa-group"></i> Admin Group');
									?>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i>&nbsp;Delete</a>
								</li>
							</ul>
						</div><!--/btn-group-->

						<button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-info"><i class="fa fa-save"></i> Save</button> &nbsp;
						<?php 
							echo anchor('manage_user', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-primary'));
							echo form_hidden('userid',$userid);
							echo form_hidden('tabel',$tabel);
						?>
					</div>
				</fieldset>
					<br/>
				<?php echo form_close(); ?>
			</div>
			<!-- end widget content -->
		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->
</div>


<?php echo form_open($url_del,array('name'=>'del','id'=>'del')); ?>
<!-- Modal DIalog DELETE-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-times"></i>&nbsp;Delete</a></h4>
			</div>
			<div class="modal-body">
				<p>
					Are you sure to delete this data..!!!
				</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cancel
				</button>
				<button type="submit" name="btn_submit_delete" class="btn btn-danger">
					Delete
				</button>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>