<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br><br>
<div class="row-fluid">
	<div class="span8 offset2 panel-box">
		<div><h3>Expert</h3></div>
		<?php echo form_open($url,array('class'=>'form-horizontal','id'=>'validation-form-leader')); ?>
		
		<div class="hr"></div>

		<div class="control-group">
			<label for="Name" class="control-label">Name</label>
			<div class="controls">
				<?php
				echo form_dropdown('emp_id',$option_emp_id,'id="EmpName" class="chzn-select span4" data-placeholder="Choose a Employee..."');
				?>
			</div>
		</div>

		<div class="control-group">
			<label for="StartDate" class="control-label">Start Date</label>
			<div class="controls">
				<?php
				$input = array('name'=>'startdate','id'=>'startdate','class'=>'input-small');
				echo form_input($input);
				?>
			</div>
		</div>


		<div class="hr"></div>
		<div class="form-actions">
			<button type="submit" name="submit" value="Save" class="btn btn-small btn-info"><i class="icon-save"></i> Save</button> &nbsp;
			<?php 
				echo anchor('laboratory/CTRL_Edit/'.$id, '<i class="icon-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-primary'));
				echo form_hidden('lab_id',$id);
			?>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>