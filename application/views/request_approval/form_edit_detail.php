<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">

            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Edit Form </h2>
            </header>
            <div>
                <div class="widget-body">
                    <div >
                        <legend><?php echo $title; ?></legend>


                        <?php
                        if ($this->session->flashdata('msg')) {
                            $msg = $this->session->flashdata('msg');
                            ?>
                            <div class="<?php echo $msg['class']; ?>">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $msg['title']; ?></strong> <?php echo $msg['message']; ?>
                            </div>
                            <?php
                        }
                        ?>

                        <?php echo form_open($url, array('name' => 'myForm', 'class' => 'form-horizontal', 'id' => 'validation-form')); ?>

                        <input type="hidden" value="1" name="type" id="type" />

                        <fieldset>
                            <div class="form-group">
                                <label for="RequestName" class="col-md-2 control-label">Request Name</label>
                                <label class="control-label">: &nbsp;<?php echo $request_name; ?></label>
                            </div>
                            <div class="form-group">
                                <label for="Description" class="col-md-2 control-label">Description</label>
                                <label class="control-label">: &nbsp;<?php echo $remark; ?></label>
                            </div>


                            


                            <div class="form-group" id="View-Single">
                                <legend></legend> 
                                <label for="emp_app" class="col-md-2 control-label">Employee</label>
                                <div class="col-md-3">
                                    <?php
                                    $input = array('name' => 'reg_emp_name', 'value' => $reg_emp_name, 'class' => 'form-control ', 'disabled' => 'disabled');
                                    echo form_input($input);
                                    ?>
                                </div>
                                <div class="clearfix"></div>
                                 <legend></legend> 
                            </div>
                           


                            <div class="row-fluid">
                                <div>
                                    <div class="form-group">
                                        <label for="approvalby" class="col-md-2 control-label">Step of Approval - 1</label>
                                        <div class="col-md-10">

                                            <?php
                                            echo form_dropdown('approvalby[]', $option_approvalby, $approvalby, 'class="chzn-select span3"');
                                            echo form_hidden('step_approval', '1');
                                            echo nbs(3);
                                            ?>
                                            OR &nbsp;
                                            <?php
                                            echo form_dropdown('approvalby_subs[]', $option_approvalby_subs_1, $approvalby_subs_1, 'id ="approvalby" class="chzn-select span3"');
                                            echo nbs(3);
                                            echo form_checkbox('is_required1', 1, $is_required1, 'class="ace-checkbox-2"');
                                            ?>
                                            <span class="lbl">&nbsp;Required</span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="approvalby2" class="col-md-2 control-label">Step of Approval - 2</label>
                                        <div class="col-md-10">
                                            <?php
                                            echo form_dropdown('approvalby[]', $option_approvalby2, $approvalby2, 'id ="approvalby2" class="chzn-select span3"');
                                            echo form_hidden('step_approval', '2');
                                            echo nbs(3);
                                            ?>
                                            OR &nbsp;
                                            <?php
                                            echo form_dropdown('approvalby_subs[]', $option_approvalby_subs_2, $approvalby_subs_2, 'id ="approvalby2" class="chzn-select span3"');
                                            echo nbs(3);
                                            echo form_checkbox('is_required2', 1, $is_required2, 'class="ace-checkbox-2"');
                                            ?>
                                            <span class="lbl">&nbsp;Required</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="approvalby3" class="col-md-2 control-label">Step of Approval - 3</label>
                                        <div class="col-md-10">
                                            <?php
                                            echo form_dropdown('approvalby[]', $option_approvalby3, $approvalby3, 'id ="approvalby3" class="chzn-select span3"');
                                            echo form_hidden('step_approval', '3');
                                            echo nbs(3);
                                            ?>
                                            OR &nbsp;
                                            <?php
                                            echo form_dropdown('approvalby_subs[]', $option_approvalby_subs_3, $approvalby_subs_3, 'id ="approvalby3" class="chzn-select span3"');
                                            echo nbs(3);
                                            echo form_checkbox('is_required3', 1, $is_required3, 'class="ace-checkbox-2"');
                                            ?>
                                            <span class="lbl">&nbsp;Required</span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        echo anchor('request_approval/CTRL_View_Detail/' . $id, '<i class="fa fa-reply"></i>&nbsp;Back', array('class' => 'btn btn-small btn-danger'));
                                        echo nbs(1);
                                        echo form_hidden('id', $id);
                                        echo form_hidden('emp_id', $emp_id);
                                        ?>
                                        <button type="submit" name="btnsubmit" value="Done" class="btn btn-small btn-primary" onclick="SelectAll_Member();"><i class="fa fa-save"></i> Save</button> &nbsp;

                                    </div>
                                </div>
                            </div>


                        </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
<div class="clearfix"></div>