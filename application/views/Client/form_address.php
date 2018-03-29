<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

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
                    <!--
<form action=<?php echo $url ?> method="post" id="validation-form" class="form-horizontal"
data-bv-message="This value is not valid"
data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
		    -->
                    <fieldset>
                        <legend>Address</legend>
                        
                        <!-- <div class="form-group"><br>
                            <label for="AddressID" class="col-md-2 control-label">ID <span class="text-danger">*</span></label>
                            <div class="col-md-4">
            				<?php
            				$input = array('name' => 'address_id', 'maxlength' => 16, 'id' => 'AddressID', 'class' => 'form-control', 'data-bv-notempty' => 'true');
            				echo form_input($input);
            				?>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="Default Shipping" class="col-md-2 control-label">Default Shipping</label>
                            <div class="col-md-4">
                                <span>
                                    <span class="onoffswitch">
                    					<?php
                    					   echo form_checkbox('def_shipping', 1, 0, 'class="onoffswitch-checkbox" id="st6"');
                    					?>
                                        <label class="onoffswitch-label" for="st6"> 
                                            <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                            <span class="onoffswitch-switch"></span> 
                                        </label> 
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Default Billing" class="col-md-2 control-label">Default Billing</label>
                            <div class="col-md-4">
                                <span>
                                    <span class="onoffswitch">
                					<?php
                					   echo form_checkbox('def_billing', 1, 0, 'class="onoffswitch-checkbox" id="st5"');
                					?>
                                        <label class="onoffswitch-label" for="st5"> 
                                            <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                            <span class="onoffswitch-switch"></span> 
                                        </label> 
                                    </span>
                                </span>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="Residential Address" class="col-md-2 control-label">Residential Address</label>
                            <div class="col-md-4">
                                <span>
                                    <span class="onoffswitch">
                    					<?php
                    					echo form_checkbox('residential', 1, 0, 'class="onoffswitch-checkbox" id="st4"');
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
                            <label for="country" class="col-md-2 control-label">Country</label>
                            <div class="col-md-4">
            				<?php
            				echo form_dropdown('country', $option_country, $country, 'class="chzn-select form-control" onchange="this.form.submit()" required');
            				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="province" class="col-md-2 control-label">State/Province <span class="text-danger">*</span></label>
                            <div class="col-md-4"> 
            				<?php
            				echo form_dropdown('province[]', $option_province, $province, 'class="chzn-select form-control" id="validate"');
            				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="City" class="col-md-2 control-label">City <span class="text-danger">*</span></label>
                            <div class="col-md-4">
            				<?php
            				$input = array('name' => 'city', 'maxlength' => 64, 'id' => 'City', 'class' => 'form-control', 'data-bv-notempty' => 'true');
            				echo form_input($input);
            				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Address" class="col-md-2 control-label">Address <span class="text-danger">*</span></label>
                            <div class="col-md-4">
            				<?php
            				$txtarea = array('id' => 'Address', 'name' => 'address', 'rows' => 2, 'class' => 'form-control', 'data-bv-notempty' => 'true');
            				echo form_textarea($txtarea);
            				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Postal Code" class="col-md-2 control-label">Postal Code</label>
                            <div class="col-md-4">
            				<?php
            				$input = array('name' => 'post_code', 'maxlength' => 16, 'id' => 'Postal Code', 'class' => 'form-control input-mask-kdpos');
            				echo form_input($input);
            				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Phone" class="col-md-2 control-label">Phone</label>
                            <div class="col-md-4">
            				<?php
            				$input = array('name' => 'phone', 'maxlength' => 16, 'id' => 'Phone', 'class' => 'form-control');
            				echo form_input($input);
            				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Label" class="col-md-2 control-label">Label</label>
                            <div class="col-md-4">
            				<?php
                				$input = array('name' => 'label', 'maxlength' => 64, 'id' => 'Label', 'class' => 'form-control');
                				echo form_input($input);
            				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Attention" class="col-md-2 control-label">Attention</label>
                            <div class="col-md-4">
            				<?php
            				$input = array('name' => 'attention', 'maxlength' => 32, 'id' => 'Attention', 'class' => 'form-control');
            				echo form_input($input);
            				?>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="Addressee" class="col-md-2 control-label">Addressee</label>
                            <div class="col-md-4">
            				<?php
            				$input = array('name' => 'addressee', 'maxlength' => 64, 'id' => 'Addressee', 'class' => 'form-control');
            				echo form_input($input);
            				?>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="Override" class="col-md-2 control-label">Override</label>
                            <div class="col-md-4">
                                <span>
                                    <span class="onoffswitch">
                    					<?php
                    					echo form_checkbox('override', 1, 0, 'class="onoffswitch-checkbox" id="st3"');
                    					?>
                                        <label class="onoffswitch-label" for="st3"> 
                                            <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                            <span class="onoffswitch-switch"></span> 
                                        </label> 
                                    </span>
                                </span>
                            </div>
                        </div> -->
                        <br/>
                        <span class="text-danger">Fields with * are required.</span>
                    </fieldset>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
				<?php
				echo anchor('client/CTRL_Edit/' . $id, '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
				echo form_hidden('client_id', $id);
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
    <div class="clearfix"></div>
</div>
