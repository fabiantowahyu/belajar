<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Global Configuration</h2>
            </header>
            <div>
                <div class="widget-body">
		    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>

                    <fieldset>
                        <div class="form-group">
                            <label for="working_hour" class="col-md-2 control-label">Working Hour <span class="text-danger">*</span></label>
                            <div class="col-md-2">
				<?php
				$input = array('name' => 'starttime_wh', 'value' => $starttime_wh, 'maxlength' => 5, 'id' => 'StartWH', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'data-mask' => "99:99", 'data-mask-placeholder' => "-");
				echo form_input($input);
				?>
                            </div>
                            <div class="col-md-2">
				<?php
				$input = array('name' => 'endtime_wh', 'value' => $endtime_wh, 'maxlength' => 5, 'id' => 'EndWH', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'data-mask' => "99:99", 'data-mask-placeholder' => "-");
				echo form_input($input);
				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="working_hour" class="col-md-2 control-label">Merchant id <span class="text-danger">*</span></label>
                            <div class="col-md-4">
				<?php
				$input = array('name' => 'merchant_id', 'value' => $merchant_id, 'id' => 'MerchantId', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'placeholder' => "Merchant id");
				echo form_input($input);
				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="working_hour" class="col-md-2 control-label">Client key<span class="text-danger">*</span></label>
                            <div class="col-md-4">
				<?php
				$input = array('name' => 'client_key', 'value' => $client_key, 'id' => 'client_key', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'placeholder' => "Client Key");
				echo form_input($input);
				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="working_hour" class="col-md-2 control-label">Server key<span class="text-danger">*</span></label>
                            <div class="col-md-4">
				<?php
				$input = array('name' => 'server_key', 'value' => $server_key, 'id' => 'server_key', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'placeholder' => "Server Key");
				echo form_input($input);
				?>
                            </div>
                        </div>
			<div class="form-group">
                            <label for="working_hour" class="col-md-2 control-label">Licenses Notification<span class="text-danger">*</span></label>
                            <div class="row-fluid">
				<div class="col-md-3">
				    <?php
				    $input = array('name' => 'licenses_reminder', 'value' => $licenses_reminder, 'id' => 'licenses_reminder', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'placeholder' => "Licenses Notification" ,'type'=>'number');
				    echo form_input($input);
				    ?>
				</div>
				<label for="working_hour" class="control-label">Month</label>
                            </div>
                        </div>
                        <i><span class="text-danger">*</span>) Required</i>
                    </fieldset>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
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
