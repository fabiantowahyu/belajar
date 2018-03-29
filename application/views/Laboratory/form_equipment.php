<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br><br>
<div class="row-fluid">
	<div class="span12 offset panel-box2">
		<div><h3><?php echo $title_head; ?></h3></div>
		<?php echo form_open($url,array('class'=>'form-horizontal','id'=>'validation-form-equipment')); ?>

		<div class="hr"></div>
		<div class="control-group">
			<label for="Name" class="control-label">Equipment Name <span class="red bolder smaller">*</span></label>
			<div class="controls">
               <?php
					echo form_dropdown('equipment_id',$option_equipment_id,$equipment_id,'id="equipment_id" class="chzn-select span3" data-placeholder="Choose a Equipment Name..."');
				?>
			</div>
		</div>
		<div class="control-group">
			<label for="Description" class="control-label">Description</label>
			<div class="controls">
				<?php
					$txtarea = array('name'=>'description','rows'=>3,'class'=>'span6','id'=>'Description');
					echo form_textarea($txtarea);
				?>
			</div>
		</div>
		<div class="control-group">
			<label for="Brand" class="control-label">Merk/Type <span class="red bolder smaller">*</span></label>
			<div class="controls">
				<?php
					$input = array('name'=>'brand','maxlength'=>64,'id'=>'Brand','class'=>'input-large');
					echo form_input($input);
				?>
			</div>
		</div>

		<div class="control-group">
			<label for="MeasureCapacity" class="control-label"> Measure Capacity <span class="red bolder smaller">*</span></label>
			<div class="controls">
				<?php
				$input = array('name'=>'measure_capacity','maxlength'=>255,'id'=>'MeasureCapacity','class'=>'input-large');
				echo form_input($input);
				?>
			</div>
		</div>

		<div class="control-group">
			<label for="PriceNetto" class="control-label">Price Nett</label>
			<div class="controls">
				<?php
					$input = array('name'=>'price_nett','id'=>'PriceNetto','class'=>'input-medium input-number','onkeypress'=>'return numbersonly(event)');
					echo form_input($input);
				?>
			</div>
		</div>
		<div class="control-group">
			<label for="InventoryNum" class="control-label">Inventory Number <span class="red bolder smaller">*</span></label>
			<div class="controls">
				<?php
					$input = array('name'=>'inventory_num','maxlength'=>16,'id'=>'InventoryNum','class'=>'input-medium');
					echo form_input($input);
				?>
			</div>
		</div>
		<div class="control-group">
			<label for="Model" class="control-label">Model <span class="red bolder smaller">*</span></label>
			<div class="controls">
				<?php
					$input = array('name'=>'model','maxlength'=>16,'id'=>'Model','class'=>'input-medium');
					echo form_input($input);
				?>
			</div>
		</div>
		<div class="control-group">
			<label for="PurchaseYear" class="control-label">Purchase Year <span class="red bolder smaller">*</span></label>
			<div class="controls">
				<?php
					$input = array('name'=>'purchase_year','id'=>'PurchaseYear','class'=>'input-mini input-mask-year');
					echo form_input($input);
				?>
			</div>
		</div>

		<div class="control-group">
			<label for="Status" class="control-label">Status <span class="red bolder smaller">*</span></label>
			<div class="controls">
				<?php
					echo form_dropdown('status',$option_status,$status,'id="Status"');
				?>
			</div>
		</div>
		<div class="control-group">
			<label for="lastcalibrate" class="control-label">Last Calibration <span class="red bolder smaller">*</span></label>
			<div class="controls">
				<?php
                      $input = array('name'=>'lastcalibrate','id'=>'lastcalibrate','class'=>'input-small');
                      echo form_input($input);
                 ?>
			</div>
		</div>
        <div class="control-group">
			<label for="nextcalibrate" class="control-label">Next Calibration <span class="red bolder smaller">*</span></label>
			<div class="controls">
				<?php
                      $input = array('name'=>'nextcalibrate','id'=>'nextcalibrate','class'=>'input-small');
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