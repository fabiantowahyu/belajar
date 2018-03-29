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
                    <!--
<form action=<?php echo $url ?> method="post" id="validation-form" class="form-horizontal"
data-bv-message="This value is not valid"
data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
-->
                    <fieldset>
                        <legend>Customer</legend>
                        <article class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="ClientID" class="col-md-4 control-label"><?php echo $title; ?> ID</label>
                                <div class="col-md-6">
                                    <label class="control-label">: &nbsp;<?php echo $id; ?></label>
                                    <?php
                                    $input = array('name'=>'id','value'=>$id,'maxlength'=>15,'id'=>'ClientID','class'=>'form-control','disabled'=>'disabled');
                                    echo form_hidden($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Type" class="col-md-4 control-label">Company Type</label>
                                <div class="col-md-6">
                                    <?php
                                    echo form_dropdown('type', $option_type, $type,'id="Type" class="form-control"');
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ClientName" class="col-md-4 control-label"><?php echo $title; ?> Name <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name'=>'client','maxlength'=>32,'id'=>'ClientName','class'=>'form-control','data-bv-notempty'=>'true');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ClientPIC" class="col-md-4 control-label">PIC Name</label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name'=>'pic','maxlength'=>32,'id'=>'ClientPIC','class'=>'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="postal_code" class="col-md-4 control-label">Region</label>
                                <div class="col-md-6">
                                    <?php
                                    echo form_dropdown('province', $option_province, $province,'id="ProvinceName" class="chzn-select form-control"');
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ClientAddress" class="col-md-4 control-label">Address <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php
                                    $txtarea = array('name'=>'address','rows'=>4,'class'=>'form-control','data-bv-notempty'=>'true');
                                    echo form_textarea($txtarea); 
                                    ?>
                                </div>
                            </div>
                        </article>

                        <article class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="ClientNPWP" class="col-md-4 control-label">NPWP</label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name'=>'npwp','maxlength'=>32,'id'=>'ClientNPWP','class'=>'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="NPWPAddress" class="col-md-4 control-label">NPWP Address</label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name'=>'npwp_address','maxlength'=>32,'id'=>'NPWPAddress','class'=>'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ClientEmail" class="col-md-4 control-label">Email <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name'=>'email','maxlength'=>64,'id'=>'ClientEmail','class'=>'form-control','data-bv-notempty'=>'true','type'=>'email');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ClientPhone" class="col-md-4 control-label">Phone <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name'=>'phone','maxlength'=>16,'id'=>'ClientPhone','class'=>'form-control','data-bv-notempty'=>'true');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ClientFax" class="col-md-4 control-label">Fax</label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name'=>'fax','maxlength'=>16,'id'=>'ClientFax','class'=>'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="postal_code" class="col-md-4 control-label">Postal Code / ZIP</label>
                                <div class="col-md-6">
                                    <?php
                                    $input = array('name'=>'postal_code','maxlength'=>16,'id'=>'postal_code','class'=>'form-control input-mask-kdpos');
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
                                echo anchor('client', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
                                echo form_hidden('id',$id);
                                ?>
                                <button type="submit" name="btn_submit" value="Save" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button> &nbsp;
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
