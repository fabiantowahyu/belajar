<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<br><br>
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

		    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                    <div class="hr"></div>

		    <!--  <div class="form-group">
			 <label for="ServiceName" class="col-md-2 control-label">Internal ID <span class="text-danger">*</span></label>
			 <div class="col-md-4">
		    <?php
		    $input = array('value' => $internal_id, 'name' => 'internal_id', 'maxlength' => 255, 'id' => 'ServiceName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
		    echo form_input($input);
		    ?>
			 </div>
		     </div> -->

                    <div class="form-group">
                        <label for="ServiceID" class="col-md-2 control-label"><?php echo $title; ?> ID <span class="text-danger">*</span></label>
                        <div class="col-md-4">
			    <?php
			    $input = array('name' => 'id', 'value' => $service_code, 'maxlength' => 64, 'id' => 'ServiceID', 'class' => 'form-control', 'disabled' => 'disabled');
			    echo form_input($input);
			    ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ServiceName" class="col-md-2 control-label"><?php echo $title; ?> Name <span class="text-danger">*</span></label>
                        <div class="col-md-4">
			    <?php
			    $input = array('name' => 'service', 'value' => $service, 'maxlength' => 255, 'id' => 'ServiceName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
			    echo form_input($input);
			    ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Description" class="col-md-2 control-label">Description</label>
                        <div class="col-md-4">
			    <?php
			    $txtarea = array('name' => 'description', 'value' => $description, 'rows' => 3, 'class' => 'form-control', 'id' => 'Description');
			    echo form_textarea($txtarea);
			    ?>
                        </div>
                    </div>

		    <div class="form-group">
			<label for="DefaultPrice" class="col-md-2 control-label">Default Price <span class="text-danger">*</span></label>
			<div class="col-md-4">
			    <input type="text" value="<?=$default_price;?>" name="default_price" placeholder="Default Price" class="form-control" data-bv-notempty ="true"> 
			</div>
		    </div>
                    <!-- <div class="form-group">
                        <label for="Status" class="col-md-2 control-label">Custom</label>
                        <div class="col-md-2">
                            <span>
                                <span class="onoffswitch">
		    <?php
		    echo form_checkbox('custom', 1, $custom, 'class="onoffswitch-checkbox" id="st4"');
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
				    echo form_checkbox('status', 1, $status, 'class="onoffswitch-checkbox" id="st3"');
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
			echo nbs(1);
			echo form_hidden('id', $id);
			?>
                        <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Save</button>&nbsp;

			<?php if ($delete) { ?>
    			<a href="#" id="cdelete" data-toggle="modal" data-target="#myModal"  accesskey="" class="btn btn-small btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
			<?php } ?>
                    </div>
		    <?php echo form_close(); ?>
                </div>


            </div>
        </div>


</div>
<div class="clearfix"></div>
<?php echo form_open($url_del, array('name' => 'del', 'id' => 'del')); ?>
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
                    Are you sure to delete this data..!
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" name="btn_submit_delete" class="btn btn-danger">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="id" id="delid" value="<?php echo $id; ?>">
<?php echo form_close(); ?>