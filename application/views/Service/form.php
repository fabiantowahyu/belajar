<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="row-fluid">

    <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2><?php echo $title_head; ?></h2>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">

		    <?php echo form_open_multipart($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>

                    <div class="hr"></div>

                    <!-- <div class="form-group">
                        <label for="ServiceName" class="col-md-2 control-label">Internal ID <span class="text-danger">*</span></label>
                        <div class="col-md-4">
		    <?php
		    $input = array('name' => 'internal_id', 'maxlength' => 255, 'id' => 'ServiceName', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)', 'data-bv-notempty' => 'true');
		    echo form_input($input);
		    ?>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="ServiceID" class="col-md-2 control-label"><?php echo $title; ?> Code <span class="text-danger">*</span></label>
                        <div class="col-md-4">
			    <?php
			    $input = array('name' => 'id', 'maxlength' => 255, 'id' => 'ServiceID', 'class' => 'form-control', 'data-bv-notempty' => 'true');
			    echo form_input($input);
			    ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ServiceName" class="col-md-2 control-label"><?php echo $title; ?> Name <span class="text-danger">*</span></label>
                        <div class="col-md-4">
			    <?php
			    $input = array('name' => 'service', 'maxlength' => 255, 'id' => 'ServiceName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
			    echo form_input($input);
			    ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Description" class="col-md-2 control-label">Description</label>
                        <div class="col-md-4">
			    <?php
			    $txtarea = array('name' => 'description', 'rows' => 3, 'class' => 'form-control', 'id' => 'Description');
			    echo form_textarea($txtarea);
			    ?>
                        </div>
                    </div>

		    <div class="form-group">
			<label for="DefaultPrice" class="col-md-2 control-label">Default Price <span class="text-danger">*</span></label>
			<div class="col-md-4">
			    <input type="text" name="default_price" placeholder="Default Price" class="form-control" data-bv-notempty ="true"> 
			</div>
		    </div>


                    <!-- <div class="form-group">
                        <label for="Status" class="col-md-2 control-label">Custom</label>
                        <div class="col-md-2">
                            <span>
                                <span class="onoffswitch">
		    <?php
		    echo form_checkbox('custom', 1, 0, 'class="onoffswitch-checkbox" id="st4"');
		    ?>
                                    <label class="onoffswitch-label" for="st4"> 
                                        <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                        <span class="onoffswitch-switch"></span> 
                                    </label> 
                                </span>
                            </span>

                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="Status" class="col-md-2 control-label">Active</label>
                        <div class="col-md-2">
                            <span>
                                <span class="onoffswitch">
				    <?php
				    echo form_checkbox('status', 1, 0, 'class="onoffswitch-checkbox" id="st3"');
				    ?>
                                    <label class="onoffswitch-label" for="st3"> 
                                        <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                        <span class="onoffswitch-switch"></span> 
                                    </label> 
                                </span>
                            </span>

                        </div>
                    </div>

                    <div class="hr"></div>
                    <div class="form-actions">
            			<?php
            			echo anchor('service', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
            			?>
                        <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Save</button> &nbsp;
                    </div>
		    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

    </article>
</div>