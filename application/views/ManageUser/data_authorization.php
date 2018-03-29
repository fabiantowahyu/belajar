<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br><br>
<div class="row">
	<div class="span10 offset panel-box">
		<div><h3><?php echo $title; ?></h3></div>
		<?php echo form_open($url,array('name'=>'myForm','class'=>'form-horizontal')); ?>
		<fieldset>
			<div class="control-group">
				<label class="control-label">User Name</label>
				<label class="control-label"><?php echo $username; ?></label>
			</div>
			<div class="hr"></div>
			<div class="row-fluid">
				<div class="span6"><b>All Data : </b></div>
				<div class="span6"><b>Verified Access : </b></div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="span9">
						<div class="input-append">  		
							
						</div>
						<?php
							echo form_dropdown("all_data[]",$option_not_member,'','size="16" multiple="multiple" class="span8"');
						?>
					</div>
					<div class="span3" style="margin-top:100px;">
						<input type="submit" name="add" class="btn btn-small btn-primary" value=">>"> <br><br>
						<input type="submit" name="remove" class="btn btn-small btn-danger" value="<<">
					</div>
				</div>	
				<div class="span6">
						
						
						<?php
							echo form_dropdown("verified_access[]",$option_member,'','size="16" multiple="multiple" class="span7"');
						?>
				</div>
			</div>
			<div class="hr"></div>
			<div>
				<?php 
					echo anchor('manage_user', '<i class="icon-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-primary'));
					echo form_hidden('user_id',$userid);
					echo form_hidden('selMember_value','');
				?>
			</div>
		</fieldset>
		<?php echo form_close(); ?>
	</div>
</div>
