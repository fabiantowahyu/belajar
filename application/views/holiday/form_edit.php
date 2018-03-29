<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
    <!-- NEW WIDGET START -->
    <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Edit Form</h2>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>

                    <fieldset>
                        <legend>Holiday</legend>
                        <div class="form-group">
                            <label for="BranchName" class="col-md-2 control-label">Holiday Name <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
									$input = array('name'=>'holiday_name','value'=>$holiday_name,'maxlength'=>16,'id'=>'holiday_name','class'=>'form-control','data-bv-notempty'=>'true');
									echo form_input($input);
								?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="BranchAddress" class="col-md-2 control-label">Holiday Type <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
                                    echo form_dropdown('holiday_type',$option_holiday_type,$holiday_type,'id="holiday_type" class="form-control" data-bv-notempty="true" ');
                                ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="StartDate" class="col-md-2 control-label">Start Date <span class="text-danger">*</span></label>
                            <div class="col-md-2">
                            	<div class=" input-group">
	                                <?php
		                                $input = array('name'=>'start_date','value'=>$start_date,'maxlength'=>128,'id'=>'start_date','class'=>'form-control datepicker','data-dateformat' => 'yy-mm-dd','data-bv-notempty'=>'true');
										echo form_input($input);
	                                ?>
	                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="EndDate" class="col-md-2 control-label">End Date <span class="text-danger">*</span></label>
                            <div class="col-md-2">
                            	<div class=" input-group">
	                                <?php
		                                $input = array('name'=>'end_date','value'=>$start_date,'maxlength'=>128,'id'=>'end_date','class'=>'form-control datepicker','data-dateformat' => 'yy-mm-dd','data-bv-notempty'=>'true');
										echo form_input($input);
	                                ?>
	                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <i><span class="text-danger">*</span>) Required</i>
                    </fieldset>

                     <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                echo anchor('holiday', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
                                echo nbs(1);
                                echo form_hidden('id',$id);
                                ?>
                                <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button>&nbsp;
                                <button class="btn btn-small btn-danger" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-trash"></i>&nbsp;Delete</a>
                                </button>
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

<?php echo form_open($url_del,array('name'=>'del','id'=>'del')); ?>
<!-- Modal -->
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
            <button type="submit" name="btn_submit_delete" class="btn btn-danger" value="delete">
                Delete
            </button>
        </div>
    </div>
</div>
</div>
<input type="hidden" name="id" id="delid" value="<?php echo $id; ?>">
<?php echo form_close(); ?>