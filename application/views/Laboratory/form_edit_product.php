<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br><br>
<div class="row-fluid">
	<div class="span8 offset2 panel-box">
		<div><h3><?php echo $title_head; ?></h3></div>
		<?php echo form_open($url,array('class'=>'form-horizontal','id'=>'validation-form-leader')); ?>
		
		<div class="hr"></div>
		<div class="control-group">
			<label for="Name" class="control-label">Name</label>
			<div class="controls">
				<?php
					$input = array('name'=>'name','value'=>$name,'maxlength'=>64,'id'=>'Name','class'=>'input-xlarge');
					echo form_input($input);
				?>
			</div>
		</div>
		<div class="control-group">
			<label for="Position" class="control-label">Position</label>
			<div class="controls">
				<?php
					echo form_dropdown('position',$option_position,$position,'id="Position" disabled="disabled"');
				?>
			</div>
		</div>
		<div class="control-group">
			<label for="StartDate" class="control-label">Start Date</label>
			<div class="controls">
				<div class="row-fluid input-append">
					<span class="add-on">
						<i class="icon-calendar"></i>
					</span>
					<?php
						$input = array('name'=>'startdate','value'=>$startdate,'id'=>'StartDate','class'=>'input-medium date-picker','data-date-format'=>'yyyy-mm-dd');
						echo form_input($input);
					?>
				</div>
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
			<a href="#" id="cdelete_leader" class="btn btn-small btn-danger"><i class="icon-trash"></i>&nbsp;Delete</a>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
<?php echo form_open($url_del,array('name'=>'del_leader','id'=>'del_leader')); ?>
<input type="hidden" name="id" id="delid" value="<?php echo $id; ?>">
<?php echo form_close(); ?>