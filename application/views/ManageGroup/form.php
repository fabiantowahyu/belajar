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
					<label for="CustomTitle" class="col-md-2 control-label">Group Name</label>
					<div class="col-md-4">
						<?php
							$input = array('name'=>'nama','maxlength'=>64,'id'=>'GroupName','class'=>'form-control','data-bv-notempty'=>'true');
							echo form_input($input);
						?>
					</div>
				</div>

				<div class="form-group">
					<label for="CustomTitle" class="col-md-2 control-label">Description</label>
					<div class="col-md-4">
						<?php
							$input = array('name'=>'description','maxlength'=>128,'id'=>'GroupName','class'=>'form-control');
							echo form_input($input);
						?>
					</div>
				</div>

				<div class="form-group">
					<label for="URL" class="col-md-2 control-label">Active</label>
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
							echo anchor('manage_group', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
						?>
						<button class="btn btn-primary" type="submit" name="btn_submit" value="save">
							<i class="fa fa-save"></i>
							Submit
						</button>
					</div>
				</div>
			</div>
	
			<?php echo form_close(); ?>

			</div>
			<!-- end widget content -->

		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->
	</article>
</div>