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
                    <?php echo form_open($url,array('class'=>'form-horizontal','name'=>'myForm',
                                                    'data-bv-message'=>'This value is not valid',
                                                    'data-bv-feedbackicons-valid'=>'glyphicon glyphicon-ok',
                                                    'data-bv-feedbackicons-invalid'=>'glyphicon glyphicon-remove',
                                                    'data-bv-feedbackicons-validating'=>'glyphicon glyphicon-refresh'
                                                   )); ?>
                    <fieldset>
                        <legend><?php echo $title; ?></legend>
                        <div class="form-group">
                            <label class="col-md-2 control-label">User Name</label>
                            <label class="control-label">: <?php echo $username; ?></label>
                        </div>

                        <legend></legend>

                        <div class="row-fluid">
                            <div class="col-sm-6">
                                <div class="col-sm-9">
                                    <div class="input-append">
                                        <input name="search_not_member" value="<?php echo $search_not_member; ?>" class="form_control" placeholder="Search" id="SearchNotMember" type="text"> 	  		
                                        <button type="submit" name="searchNotMember" value="Search" class="btn btn-xs btn-success"><i class="fa fa-search"></i></button>
                                    </div>
                                    <br/>
                                    <?php
                                    echo form_dropdown("selNonMember",$option_not_member,'','size="16" multiple="multiple" class="col-sm-9"');
                                    ?>
                                </div>
                                <div class="col-sm-3" style="margin-top:100px;">
                                    <a href="#" class="btn btn-small btn-primary" onclick="ChangeValue(2);"> >> </a> <br><br>
                                    <a href="#" class="btn btn-small btn-danger" onclick="ChangeValue(3);"> << </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-append">
                                    <input name="search_member" value="<?php echo $search_member; ?>" class="form_control" placeholder="Search" id="SearchMember" type="text">	  		
                                    <button type="submit" name="searchMember" value="Search" class="btn btn-xs btn-success"><i class="fa fa-search"></i></button>
                                </div>
                                <br/>
                                <?php
                                echo form_dropdown("selMember",$option_member,'','size="16" multiple="multiple" class="col-sm-7"');
                                ?>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" name="btn_submit" value="Done" class="btn btn-small btn-info" onclick="SelectAll_Member();"><i class="fa fa-save"></i> Done</button> &nbsp;
								<?php 
									echo anchor('manage_user', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-primary'));
									echo form_hidden('user_id',$userid);
									echo form_hidden('selMember_value','');
								?>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <?php echo form_close(); ?>
                </div>
                <!-- end widget content -->
            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->
    </article>
</div>
