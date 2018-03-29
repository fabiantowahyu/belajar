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
                        <legend>Loading Port</legend>
                        <div class="form-group">
                            <label for="LoadingPortCode" class="col-md-2 control-label">Loading Port Code <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'loading_port_code', 'maxlength' => 16, 'id' => 'LoadingPortCode', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="LoadingPortName" class="col-md-2 control-label">Loading Port Name <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'loading_port_name', 'maxlength' => 128, 'id' => 'LoadingPortName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <i><span class="text-danger">*</span>) Required</i>
                    </fieldset>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                echo anchor('loading_port', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
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
            </div>
        </div>
    </article>
    <div class="clearfix"></div>
</div>
