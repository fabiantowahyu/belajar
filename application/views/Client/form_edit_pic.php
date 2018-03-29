<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
    <!-- NEW WIDGET START -->
    <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Edit Form </h2>
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
                                $input = array('name'=>'contact_name','value'=>$contact_name,'maxlength'=>32,'id'=>'Contact Name','class'=>'form-control','data-bv-notempty'=>'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Email" class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'email','value'=>$email,'maxlength'=>64,'id'=>'Email','class'=>'form-control','type'=>'email');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Work Phone" class="col-md-2 control-label">Work Phone</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'work_phone','value'=>$work_phone,'maxlength'=>16,'id'=>'Work Phone','class'=>'form-control');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Handphone" class="col-md-2 control-label">Handphone</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'hp','value'=>$hp,'maxlength'=>16,'id'=>'Handphone','class'=>'form-control');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Fax" class="col-md-2 control-label">Fax</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'fax','value'=>$fax,'maxlength'=>16,'id'=>'Fax','class'=>'form-control');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                echo anchor('client/CTRL_Edit/'.$client_id, '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
                                echo form_hidden('id',$id);
                                echo form_hidden('client_id',$client_id);
                                ?>
                                <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button>&nbsp;
                                <button class="btn btn-small btn-danger" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-trash"></i>&nbsp;Delete</a>
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
</div>
<?php echo form_open($url_del,array('name'=>'del_pic','id'=>'del_pic')); ?>
<!-- Modal -->
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
                Are you sure to delete this data..!!!
            </p>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Cancel
            </button>
            <button type="submit" name="btn_submit_delete" class="btn btn-danger" value="delete">
                Delete
            </button>
        </div>
    </div>
</div>
</div>
<input type="hidden" name="id" id="delid" value="<?php echo $id; ?>">
<?php echo form_close(); ?>