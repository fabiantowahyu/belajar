<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
    <!-- NEW WIDGET START -->
    <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Update Form </h2>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                   

                    <fieldset>
                        <legend>Address</legend>
                        <span class="text-danger">Fields with * are required.</span>
                        
                        <div class="form-group">
                            <label for="Default Shipping" class="col-md-2 control-label">Default Shipping</label>
                            <div class="col-md-4">
                                <span>
                                    <span class="onoffswitch">
                                        <?php
                                        echo form_checkbox('def_shipping',1,$def_shipping,'class="onoffswitch-checkbox" id="st6"'); 
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
                                        echo form_checkbox('def_billing',1,$def_billing,'class="onoffswitch-checkbox" id="st5"'); 
                                        ?>
                                        <label class="onoffswitch-label" for="st5"> 
                                            <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                            <span class="onoffswitch-switch"></span> 
                                        </label> 
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="col-md-2 control-label">Country</label>
                            <div class="col-md-4">
                                <?php
                                echo form_dropdown('country',$option_country,$country,'class="chzn-select form-control" onchange="this.form.submit()" required'); 
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="province" class="col-md-2 control-label">State/Province <span class="text-danger">*</span></label>
                            <div class="col-md-4"> 
                                <?php
                                echo form_dropdown('province[]', $option_province, $province,'class="chzn-select form-control" id="validate"
                                required');
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="City" class="col-md-2 control-label">City <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'city','value'=>$city,'maxlength'=>64,'id'=>'City','class'=>'form-control','data-bv-notempty'=>'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Address" class="col-md-2 control-label">Address <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
                                $txtarea = array('id'=>'Address','name'=>'address','value'=>$address,'rows'=>2,'class'=>'form-control','data-bv-notempty'=>'true');
                                echo form_textarea($txtarea);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Postal Code" class="col-md-2 control-label">Postal Code</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'post_code','value'=>$post_code,'maxlength'=>16,'id'=>'Postal Code','class'=>'form-control');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Phone" class="col-md-2 control-label">Phone</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'phone','value'=>$phone,'maxlength'=>16,'id'=>'Phone','class'=>'form-control');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Label" class="col-md-2 control-label">Label</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'label','value'=>$label,'maxlength'=>64,'id'=>'Label','class'=>'form-control');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Attention" class="col-md-2 control-label">Attention</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'attention','value'=>$attention,'maxlength'=>32,'id'=>'Attention','class'=>'form-control');
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
        <div class="clearfix"></div>
        </div>
    <!-- end widget -->
</div>
<?php echo form_open($url_del,array('name'=>'del_address','id'=>'del_address')); ?>
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