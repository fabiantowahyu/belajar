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
                    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>

                    <fieldset>
                        <legend>Holiday</legend>
                        <div class="form-group">
                            <label for="BranchName" class="col-md-2 control-label">Holiday Name <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
									$input = array('name'=>'holiday_name','maxlength'=>100,'id'=>'holiday_name','class'=>'form-control','data-bv-notempty'=>'true');
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
		                                $input = array('name'=>'start_date','maxlength'=>128,'id'=>'start_date','class'=>'form-control datepicker','data-dateformat' => 'yy-mm-dd','data-bv-notempty'=>'true');
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
		                                $input = array('name'=>'end_date','maxlength'=>128,'id'=>'end_date','class'=>'form-control datepicker','data-dateformat' => 'yy-mm-dd','data-bv-notempty'=>'true');
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