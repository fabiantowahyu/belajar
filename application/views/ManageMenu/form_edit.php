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
                    <?php echo form_open($url,array('class'=>'form-horizontal','id'=>'validation-form',
                                                    'data-bv-message'=>'This field is required',
                                                    'data-bv-feedbackicons-valid'=>'glyphicon glyphicon-ok',
                                                    'data-bv-feedbackicons-invalid'=>'glyphicon glyphicon-remove',
                                                    'data-bv-feedbackicons-validating'=>'glyphicon glyphicon-refresh'
                                                   )); ?>

                    <fieldset>
                        <legend>Manage Menu</legend>
                        <div class="form-group">
                            <label for="CustomTitle" class="col-md-2 control-label">Custom Title</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'custom_title','maxlength'=>64,'value'=>$custom_title,'id'=>'CustomTitle','class'=>'form-control','data-bv-notempty'=>'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="URL" class="col-md-2 control-label">URL</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'url_menu','id'=>'URL','value'=>$url_menu,'class'=>'form-control','data-bv-notempty'=>'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="PathIcon" class="col-md-2 control-label">Path Icon</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'path_icon','id'=>'PathIcon','value'=>$path_icon,'class'=>'form-control');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Parent" class="col-md-2 control-label">Parent</label>
                            <div class="col-md-4">
                                <?php
                                echo form_dropdown('parent_id',$option_parent_id,$parent_id,'id="Parent" class="form-control"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="OrderNumber" class="col-md-2 control-label">Order Number</label>
                            <div class="col-md-2">
                                <?php
                                $input = array('name'=>'tid','value'=>$tid,'id'=>'OrderNumber','class'=>'form-control','data-bv-notempty'=>'true','onkeypress'=>'return numbersonly(event)');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="URL" class="col-md-2 control-label">Active</label>
                            <div class="col-md-2">
                                <span>
                                    <span class="onoffswitch">
                                        <?php
                                        echo form_checkbox('active',1,$active,'class="onoffswitch-checkbox" id="st3"'); 
                                        ?>
                                        <label class="onoffswitch-label" for="st3"> 
                                            <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                            <span class="onoffswitch-switch"></span> 
                                        </label> 
                                    </span>
                                </span>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                echo anchor('manage_menu', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
                                echo nbs(1);
                                echo form_hidden('id',$id);
                                ?>
                                <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button> &nbsp;
                                <button class="btn btn-small btn-danger" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-trash"></i>&nbsp;Delete</a>
                                </button>
                            <!-- <a href="#" id="cdelete" class="btn btn-small btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a> -->
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

<?php echo form_open($url_del,array('name'=>'del','id'=>'del')); ?>
<!-- Modal DIalog DELETE-->
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
            <button type="submit" name="btn_submit_delete" class="btn btn-danger">
                Delete
            </button>
        </div>
    </div>
</div>
</div>
<input type="hidden" name="id" id="delid" value="<?php echo $id; ?>">
<?php echo form_close(); ?>