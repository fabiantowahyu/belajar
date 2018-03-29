<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row-fluid">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
               <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Change Password</h2>
            </header>

              <div>


                <div class="widget-body">
	<div class="span6 offset3 panel-box">
		<legend>Update Password</legend>
		<?php echo form_open($url,array('name'=>'myForm','class'=>'form-horizontal','id'=>'validation-form')); ?>
		<fieldset>
			<div class="form-group">
				<label for="UserID" class="col-md-2 control-label">Username</label>
				<div class="col-md-4">
					<?php
						$input = array('name'=>'userid','value'=>$userid,'id'=>'UserID','class'=>'form-control','disabled'=>'disabled');
						echo form_input($input);
					?>
				</div>
			</div>
			
			<div class="form-group">
				<label for="OldPassword" class="col-md-2 control-label">Old Password</label>
				<div class="col-md-4">
					<?php
						$input = array('name'=>'password','id'=>'OldPassword','maxlength'=>32,'class'=>'form-control');
						echo form_password($input);
					?>
					<span class="lbl"></span>
				</div>
			</div>
			<div class="form-group">
				<label for="NewPassword" class="col-md-2 control-label">New Password</label>
				<div class="col-md-4">
					<?php
						$input = array('name'=>'password_new','id'=>'NewPassword','maxlength'=>32,'class'=>'form-control');
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
			<div class="form-actions">
				<?php 
					echo anchor('admin', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
					echo nbs(1);
					echo form_hidden('userid',$userid);
				?>
                            <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Save</button> &nbsp;
				
			</div>
		</fieldset>
		<?php echo form_close(); ?>
	</div> </div> </div></div> </div>
</div>