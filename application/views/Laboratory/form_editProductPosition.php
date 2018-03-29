<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br><br>
<div class="row-fluid">
    <div class="span8 offset2 panel-box">
        <div><h3>Edit Product Position</h3></div>
        <?php echo form_open($url,array('class'=>'form-horizontal','id'=>'validation-form-leader')); ?>

        <div class="hr"></div>

        <div class="control-group">
            <label for="position" class="control-label">Position <span class="red bolder smaller">*</span></label>
            <div class="controls">
                <?php
                $input = array('name'=>'position', 'value'=>$position);
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
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
