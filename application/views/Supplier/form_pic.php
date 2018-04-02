<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br><br>
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
                        <legend>PIC</legend>
                        <span class="text-danger">Fields with * are required.</span>
                        <div class="form-group"><br>
                            <label for="Category" class="col-md-2 control-label">Category <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
    echo form_dropdown('category',$option_category,$category,'id="Category" class="form-control" data-bv-notempty="true"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Contact Name" class="col-md-2 control-label">Contact Name <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'contact_name','maxlength'=>32,'id'=>'Contact Name','class'=>'form-control','data-bv-notempty'=>'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Email" class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'email','maxlength'=>64,'id'=>'Email','class'=>'form-control','type'=>'email');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Work Phone" class="col-md-2 control-label">Work Phone</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'work_phone','maxlength'=>16,'id'=>'Work Phone','class'=>'form-control');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Handphone" class="col-md-2 control-label">Handphone</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'hp','maxlength'=>16,'id'=>'Handphone','class'=>'form-control');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Fax" class="col-md-2 control-label">Fax</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'fax','maxlength'=>16,'id'=>'Fax','class'=>'form-control');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                echo anchor('supplier/CTRL_Edit/'.$id, '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
                                echo form_hidden('supplier_id',$id);
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