<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="row-fluid">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">

            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2><?php echo $title_head; ?></h2>
            </header>

            <div>


                <div class="widget-body">
                    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                    <fieldset>
                        <legend>General</legend>
                        <div class="form-group">
                            <label for="TemplateName" class="col-md-2 control-label">Template Title</label>
                            <div class="col-md-6">
                                <?php
                                $input = array('name' => 'name', 'maxlength' => 255, 'id' => 'TemplateName', 'class' => 'form-control ', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Type" class="col-md-2 control-label">Template Type</label>
                            <div class="col-md-6">
                                <?php
                                echo form_dropdown('type', $option_type, $type, 'id="Type" class="form-control"  data-bv-notempty = "true"');
                                ?>
                            </div>
                        </div>         

                        <div class="form-group" id="rowuser5">
                            <label for="Status" class="col-md-2 control-label">Active</label>


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


                        <div class="form-group">
                            <label for="Status" class="col-md-2 control-label">Content</label>
                            <div class="col-md-10">

                                <textarea name="content" id="contents">
                                   Your content goes here ... 
                                </textarea>	 

                            </div>
                        </div>

                        <div class="space-10"></div><br/>
                        <legend>Parameter / Variabel</legend>
                        <div class="row-fluid">
                            <div class="col-md-6">
                                <table class="table " width="100%" cellpadding="3" cellspacing="3">
                                    <tr>
                                        <td width="40%">${REQUESTAPPROVALNAME}</td>
                                        <td width="10">:</td>
                                        <td>Jenis Approver Request</td>
                                    </tr>
                                    <tr>
                                        <td>${REQUEST_NUMBER}</td>
                                        <td>:</td>
                                        <td>Nomor Transaksi Request</td>
                                    </tr>
                                    <tr>
                                        <td>${REQUESTER_EMPNO}</td>
                                        <td>:</td>
                                        <td>Employee Code Requester</td>
                                    </tr>
                                    <tr>
                                        <td>${REQUESTER_NAME}</td>
                                        <td>:</td>
                                        <td>Employee Name Requester</td>
                                    </tr>
                                </table> 
                            </div>
                            <div class="col-md-6">
                                <table class="table" width="100%" cellpadding="3" cellspacing="3">
                                    <tr>
                                        <td width="40%">${APPROVER_EMPNO}</td>
                                        <td width="10">:</td>
                                        <td>Employee Code Approver</td>
                                    </tr>
                                    <tr>
                                        <td>${APPROVER_NAME}</td>
                                        <td>:</td>
                                        <td>Employee Name Approver</td>
                                    </tr>
                                    <tr>
                                        <td>${REQUEST_STATUS}</td>
                                        <td>:</td>
                                        <td>Status Transaksi Request</td>
                                    </tr>
                                </table> 
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="hr"></div>
                        <div class="form-actions">
                            <?php
                            echo anchor('template_email', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                            ?>
                             <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Save</button> &nbsp;
                           
                        </div>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>