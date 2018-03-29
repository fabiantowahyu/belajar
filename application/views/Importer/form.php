<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Form Add </h2>
            </header>
            <div>
                <div class="widget-body">
                    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                    <fieldset>
                        <legend>Importer</legend>
                        <article class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="ImporterID" class="col-md-4 control-label"><?php echo $title; ?> ID</label>
                                <div class="col-md-6">
                                    <label class="control-label">: &nbsp;<?php echo $id; ?></label>
                                    <?php
                                    $input = array('name' => 'id', 'value' => $id, 'maxlength' => 15, 'id' => 'ImporterID', 'class' => 'form-control', 'disabled' => 'disabled');
                                    echo form_hidden($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Type" class="col-md-4 control-label">Company Type</label>
                                <div class="col-md-6">
                                    <?php
                                    echo form_dropdown('type', $option_type, $type, 'id="Type" class="form-control"');
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ImporterName" class="col-md-4 control-label"><?php echo $title; ?> Name <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name' => 'importer', 'maxlength' => 32, 'id' => 'ImporterName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ImporterPIC" class="col-md-4 control-label">PIC Name</label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name' => 'pic', 'maxlength' => 32, 'id' => 'ImporterPIC', 'class' => 'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="postal_code" class="col-md-4 control-label">Region</label>
                                <div class="col-md-6">
                                    <?php
                                    echo form_dropdown('province', $option_province, $province, 'id="ProvinceName" class="chzn-select form-control"');
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ImporterAddress" class="col-md-4 control-label">Address <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php
                                    $txtarea = array('name' => 'address', 'rows' => 4, 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_textarea($txtarea);
                                    ?>
                                </div>
                            </div>
                        </article>

                        <article class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="ImporterNPWP" class="col-md-4 control-label">NPWP</label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name' => 'npwp', 'maxlength' => 32, 'id' => 'ImporterNPWP', 'class' => 'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="NPWPAddress" class="col-md-4 control-label">NPWP Address</label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name' => 'npwp_address', 'maxlength' => 32, 'id' => 'NPWPAddress', 'class' => 'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="EmporterEmail" class="col-md-4 control-label">Email <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name' => 'email', 'maxlength' => 64, 'id' => 'ImporterEmail', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'type' => 'email');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ImporterPhone" class="col-md-4 control-label">Phone <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name' => 'phone', 'maxlength' => 16, 'id' => 'ImporterPhone', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ImporterFax" class="col-md-4 control-label">Fax</label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name' => 'fax', 'maxlength' => 16, 'id' => 'ImporterFax', 'class' => 'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="postal_code" class="col-md-4 control-label">Postal Code / ZIP</label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name' => 'postal_code', 'maxlength' => 16, 'id' => 'postal_code', 'class' => 'form-control input-mask-kdpos');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </article>
                    </fieldset>
                    <i><span class="text-danger">*</span>) Required</i>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                echo anchor('importer', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                                echo form_hidden('id', $id);
                                ?>
                                <button type="submit" name="btn_submit" value="Save" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button> &nbsp;
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </article>
    <div class="clearfix"></div>
</div>
