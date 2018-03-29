<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br><br>
<div class="row-fluid">
	<div class="span8 offset2 panel-box">
		<div><h3><?php echo $title_head; ?></h3></div>
		<?php echo form_open($url,array('class'=>'form-horizontal','id'=>'validation-form-crm')); ?>
		
		<div class="hr"></div>
		
        <div class="control-group">
			<label for="CRMName" class="control-label">Reference Material Name</label>
			<div class="controls">
				<?php
					echo form_dropdown('crm_value',$option_crm_value,$crm_value,'id="CRMName" class="chzn-select span4" disabled=>"disabled"');
					?>
			</div>
		</div>
		
		<div class="control-group">
			<label for="RMValue" class="control-label">Reference Material Value</label>
			<div class="controls">
				<?php
                      $input = array('name'=>'rmvalue','value'=>$rm_value,'id'=>'RMValue','class'=>'input-small');
                      echo form_input($input);
                 ?>
			</div>
		</div>

		<div class="hr"></div>
		<div class="form-actions">
			<button type="submit" name="submit" value="Save" class="btn btn-small btn-info"><i class="icon-save"></i> Save</button>&nbsp;
			<?php 
				echo anchor('laboratory/CTRL_Edit/'.$lab_id, '<i class="icon-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-primary'));
				echo form_hidden('lab_id',$lab_id);
				echo nbs(1);
				echo form_hidden('id',$id);
			?>
			<a href="#" id="cdelete_crm" class="btn btn-small btn-danger"><i class="icon-trash"></i>&nbsp;Delete</a>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
<?php echo form_open($url_del,array('name'=>'del_crm','id'=>'del_crm')); ?>
<input type="hidden" name="id" id="delid" value="<?php echo $id; ?>">
<?php echo form_close(); ?>