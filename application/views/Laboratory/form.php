<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="MasterLab" class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
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

                    <legend>General</legend>
                    <div class="form-group">
                        <label for="CompanyID" class="col-md-2 control-label"><?php echo $title; ?> ID</label>
                        <div class="col-md-4">
                            <?php
                            $input = array('name' => 'id', 'value' => $id, 'maxlength' => 15, 'id' => 'CompanyID', 'class' => 'form-control', 'disabled' => 'disabled');
                            echo form_input($input);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CompanyName" class="col-md-2 control-label"><?php echo $title; ?> Name <span class="text-danger">*</span></label>
                        <div class="col-md-4">
                            <?php
                            $input = array('name' => 'name', 'maxlength' => 64, 'id' => 'CompanyName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                            echo form_input($input);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="BranchID" class="col-md-2 control-label">Branch <span class="text-danger">*</span></label>
                        <div class="col-md-4">
                            <?php
                            echo form_dropdown('branch_id', $option_branch, $branch_id, 'id = "BranchID" class="form-control"  data-bv-notempty = "true"');
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Address" class="col-md-2 control-label">Address</label>
                        <div class="col-md-4">
                            <?php
                            $txtarea = array('name' => 'address', 'rows' => 3, 'class' => 'form-control', 'id' => 'Address');
                            echo form_textarea($txtarea);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Phone" class="col-md-2 control-label">Phone</label>
                        <div class="col-md-4">
                            <?php
                            $input = array('name' => 'phone', 'maxlength' => 64, 'id' => 'Phone', 'class' => 'form-control input-mask-phone');
                            echo form_input($input);
                            ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Status" class="col-md-2 control-label"><?php echo $title; ?> Status</label>
                        <div class="col-md-3">
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

                    <div class="space-10"></div><br/>
                    <legend>Attach Files</legend>
                    <div class="form-group">
                        <label for="Certificate" class="col-md-2 control-label">Certificate</label>
                        <div class="col-md-4">
                            <input type="file"  class="btn btn-default" name="file_certificate" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Accreditation" class="col-md-2 control-label">Accreditation</label>
                        <div class="col-md-4">
                            <input type="file"  class="btn btn-default" name="file_accreditation" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Brochure" class="col-md-2 control-label">Brochure</label>
                        <div class="col-md-4">
                            <input type="file"  class="btn btn-default" name="file_brochure" />
                        </div>
                    </div>

                    <div class="hr"></div>
                    <div class="form-actions">
                        <?php
                        echo anchor('laboratory', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                        echo form_hidden('id', $id);
                        ?>
                        <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Save</button> &nbsp;

                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
</div>
<div class="clearfix"></div>