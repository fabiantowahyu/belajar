<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br><br>
<div class="row-fluid">
	<div class="span8 offset2 panel-box">
		<div><h3><?php echo $title_head; ?></h3></div>
		<?php echo form_open($url,array('class'=>'form-horizontal','id'=>'validation-form-leader')); ?>
		
		<div class="hr"></div>
		
        <div class="control-group">
			<label for="CRMName" class="control-label">Reference Material Name</label>
			<div class="controls">
				<?php
					echo form_dropdown('crm_value',$option_crm_value,$crm_value,'id="CRMName" class="chzn-select span4" data-placeholder="Choose a Reference Material..."');
					?>
			</div>
		</div>
		
		<div class="control-group">
			<label for="RMValue" class="control-label">Reference Material Value</label>
			<div class="controls">
				<?php
                      $input = array('name'=>'rmvalue','id'=>'RMValue','class'=>'input-small');
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