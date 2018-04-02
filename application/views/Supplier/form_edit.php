<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
    <!-- NEW WIDGET START -->
    <article class="col-sm-12 col-md-12 col-lg-12">
        <section id="widget-grid" class="">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false"
                 data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-togglebutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                    <h6>&nbsp;Edit Form </h6>
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

                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-16">
                                <li class="active" id="tab-basic">
                                    <a data-toggle="tab" href="#edit-basic">
                                        <i class="green icon-edit bigger-125"></i>
                                        Basic Info
                                    </a>
                                </li>

                                <li id="tab-pic">
                                    <a data-toggle="tab" href="#edit-pic">
                                        <i class="purple icon-group  bigger-125"></i>
                                        PIC
                                    </a>
                                </li>

                                <li id="tab-address">
                                    <a data-toggle="tab" href="#edit-address">
                                        <i class="blue icon-home bigger-125"></i>
                                        Address
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content profile-edit-tab-content">
                            <div id="edit-basic" class="tab-pane in active">
                                <div class="space-10"></div>
                                <fieldset>
                                    <legend>Customer</legend>
                                    <div class="span6 offset panel-box1">
                                        <div class="form-group">
                                            <label for="ClientID" class="col-md-2 control-label"><?php echo $title; ?> ID</label>
                                            <label class="control-label">: &nbsp;<?php echo $id; ?></label>
                                        </div>
                                        <div class="form-group">
                                            <label for="Type" class="col-md-2 control-label">Company Type</label>
                                            <div class="col-md-4">
                                                <?php
                                                echo form_dropdown('type',$option_type,$type,'id="Type" class="form-control"');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ClientName" class="col-md-2 control-label"><?php echo $title; ?> Name <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <?php
                                                $input = array('name'=>'supplier','value'=>$supplier_name,'maxlength'=>32,'id'=>'ClientName','class'=>'form-control','data-bv-notempty'=>'true');
                                                echo form_input($input);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ClientPIC" class="col-md-2 control-label">PIC Name</label>
                                            <div class="col-md-4">
                                                <?php
                                                $input = array('name'=>'pic','value'=>$pic,'maxlength'=>32,'id'=>'ClientPIC','class'=>'form-control');
                                                echo form_input($input);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="region" class="col-md-2 control-label">Region</label>
                                            <div class="col-md-4">
                                                <?php
                                                echo form_dropdown('province',$option_province,$province,'id="ProvinceName" class="chzn-select form-control"');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ClientAddress" class="col-md-2 control-label">Address <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <?php
                                                $txtarea = array('name'=>'address','value'=>$address,'rows'=>4,'class'=>'form-control','data-bv-notempty'=>'true');
                                                echo form_textarea($txtarea); 
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="span5 offset panel-box1">
                                        <div class="form-group">
                                            <label for="ClientNPWP" class="col-md-2 control-label">NPWP</label>
                                            <div class="col-md-4">
                                                <?php
                                                $input = array('name'=>'npwp','value'=>$npwp,'maxlength'=>32,'id'=>'ClientNPWP','class'=>'form-control');
                                                echo form_input($input);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NPWPAddress" class="col-md-2 control-label">NPWP Address</label>
                                            <div class="col-md-4">
                                                <?php
                                                $input = array('name'=>'npwp_address','value'=>$npwp_address,'maxlength'=>32,'id'=>'NPWPAddress','class'=>'form-control');
                                                echo form_input($input);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ClientEmail" class="col-md-2 control-label">Email <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <?php
                                                $input = array('name'=>'email','value'=>$email,'maxlength'=>64,'id'=>'ClientEmail','class'=>'form-control','data-bv-notempty'=>'true','type'=>'email');
                                                echo form_input($input);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ClientPhone" class="col-md-2 control-label">Phone <span class="text-danger">*</span></label>
                                            <div class="col-md-4">
                                                <?php
                                                $input = array('name'=>'phone','value'=>$phone,'maxlength'=>16,'id'=>'ClientPhone','class'=>'form-control','data-bv-notempty'=>'true');
                                                echo form_input($input);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ClientFax" class="col-md-2 control-label">Fax</label>
                                            <div class="col-md-4">
                                                <?php
                                                $input = array('name'=>'fax','value'=>$fax,'maxlength'=>16,'id'=>'ClientFax','class'=>'form-control');
                                                echo form_input($input);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="postal_code" class="col-md-2 control-label">Postal Code / ZIP</label>
                                            <div class="col-md-4">
                                                <?php
                                                $input = array('name'=>'postal_code','value'=>$postal_code,'maxlength'=>16,'id'=>'postal_code','class'=>'form-control input-mask-kdpos');
                                                echo form_input($input);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <i><span class="text-danger">*</span>) Required</i>
                                </fieldset>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php 
                                            echo anchor('supplier', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
                                            echo nbs(1);
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

                        <div id="edit-pic" class="tab-pane">
                            <div class="space-10"></div>

                            <?php $this->load->view('Client/view_pic',$id); ?>
                        </div>

                        <div id="edit-address" class="tab-pane">
                            <div class="space-10"></div>
                            <?php $this->load->view('Client/view_address',$id); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
    <!-- end widget div -->
    <div class="clearfix"></div>
</div>
<!-- end widget -->
</div>
<!-- end widget -->

<?php echo form_open($url_del,array('name'=>'del','id'=>'del')); ?>
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