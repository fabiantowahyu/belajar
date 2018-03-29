<?php  if( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
    
    <article class="col-sm-12 col-md-12 col-lg-12">
    <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
           
    <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Add Form </h2>
            </header>
    <div>
                <!-- widget content -->
                <div class="widget-body">
	<div class="span12 offset panel-box">
		
		
		<?php echo form_open($url,array('name'=>'myForm','class'=>'form-horizontal','id'=>'validation-form')); ?>
		<fieldset>
                    <legend>Request Approval</legend>
			<div class="form-group">
                            <label for="RequestName" class="col-md-2 control-label">Request Name</label>
                            <label class="control-label">: &nbsp;<?php echo $request_name; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="Description" class="col-md-2 control-label">Description</label>
                            <label class="control-label">: &nbsp;<?php echo $remark; ?></label>
                        </div>
           <legend></legend>
			

			<div class="form-group">
                            <label for="Type" class="col-md-2 control-label">Approval Type</label>
                            <div class="col-md-4">
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="radiobox style-0" checked="checked" value="1" name="type" id="type_single">
                                        <span> Single</span> 
                                    </label>
                                    <label>
                                        <input type="radio" class="radiobox style-0" value="0" name="type" id="type_multiple">
                                        <span> Multiple</span> 
                                    </label>
                                </div>
                            </div>    
                        </div>
                    <div class="form-group" id="View-Single">
                            <label for="emp_app" class="col-md-2 control-label">Employee</label>
                            <div class="col-md-6">
                                <?php
					echo form_dropdown('emp_id',$option_emp_app,'','class="chzn-select span5"'); 
					?>
                            </div>
                        </div>
			
			
            
			                      <div class="row-fluid" id="View-Multiple">
                            <div class="row-fluid">
                                <div class="col-sm-6"><b>&nbsp;&nbsp;&nbsp;Not Member of : </b></div>
                                <div class="col-sm-6"><b>Member of : </b></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-9">
                                    <!--<div class="input-append">
<input name="search_not_member" value="<?php echo $search_not_member; ?>" class="input-xlarge" placeholder="Search" id="SearchNotMember" type="text"> 	  		
<button type="submit" name="searchNotMember" value="Search" class="btn btn-xs btn-success"><i class="fa fa-search"></i></button>
</div>
<br />-->
                                    <?php
                                    echo form_dropdown("selNonMember",$option_not_member,'','size="16" multiple="multiple" class="col-sm-9"');
                                    ?>
                                </div>

                                <div class="col-sm-3" style="margin-top:100px;">
                                    <a href="javascript:void(0);" class="btn btn-small btn-primary" onclick="ChangeValue(2);"> >> </a> <br><br>
                                    <a href="javascript:void(0);" class="btn btn-small btn-danger" onclick="ChangeValue(3);"> << </a>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <!--<div class="input-append">
<input name="search_member" value="<?php echo $search_member; ?>" class="input-xlarge" placeholder="Search" id="SearchMember" type="text">	  		
<button type="submit" name="searchMember" value="Search" class="btn btn-xs btn-success"><i class="fa fa-search"></i></button>
</div>
<br/>-->
                                <?php
                                echo form_dropdown("selMember",$option_member,'','size="16" multiple="multiple" class="col-sm-7"');
                                ?>
                            </div>
                        </div>

            
			 <legend></legend>
                         <div class="row-fluid">
                            <div class="form-group">
                                <label for="approvalby" class="col-md-2 control-label">Step of Approval - 1</label>
                                <div class="col-md-10">
                                    <?php
                                    echo form_dropdown('approvalby[]',$option_approvalby,'','id ="approvalby" class="chzn-select col-sm-4"'); 
                                    echo form_hidden('step_approval','1');
                                    echo nbs(3);
                                    ?>
                                    OR &nbsp;
                                    <?php
                                    echo form_dropdown('approvalby_subs[]',$option_approvalby_subs_1,'','id ="approvalby2" class="chzn-select col-sm-4"'); 
                                    echo nbs(3);
                                    ?>
                                    <label class="checkbox-inline" style="margin-bottom:10px">
                                        <?php
                                        echo form_checkbox('is_required1',1,'','class="checkbox style-0"');
                                        ?> 
                                        <span>&nbsp;Required</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="approvalby2" class="col-md-2 control-label">Step of Approval - 2</label>
                                <div class="col-md-10">
                                    <?php
                                    echo form_dropdown('approvalby[]',$option_approvalby2,'','id ="approvalby3" class="chzn-select col-sm-4"');
                                    echo form_hidden('step_approval','2');
                                    echo nbs(3); 
                                    ?>
                                    OR &nbsp;
                                    <?php
                                    echo form_dropdown('approvalby_subs[]',$option_approvalby_subs_2,'','id ="approvalby4" class="chzn-select col-sm-4"');
                                    echo nbs(3);
                                    ?>
                                    <label class="checkbox-inline" style="margin-bottom:10px">
                                        <?php
                                        echo form_checkbox('is_required2',1,'','class="checkbox style-0"');
                                        ?> 
                                        <span>&nbsp;Required</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="approvalby3" class="col-md-2 control-label">Step of Approval - 3</label>
                                <div class="col-md-10">
                                    <?php
                                    echo form_dropdown('approvalby[]',$option_approvalby3,'','id ="approvalby5" class="chzn-select col-sm-4"');
                                    echo form_hidden('step_approval','3');
                                    echo nbs(3); 
                                    ?>
                                    OR &nbsp;
                                    <?php
                                    echo form_dropdown('approvalby_subs[]',$option_approvalby_subs_3,'','id ="approvalby6" class="chzn-select col-sm-4"');
                                    echo nbs(3);
                                    ?>
                                    <label class="checkbox-inline" style="margin-bottom:10px">
                                        <?php
                                        echo form_checkbox('is_required3',1,'','class="checkbox style-0"');
                                        ?> 
                                        <span>&nbsp;Required</span>
                                    </label>
                                </div>
                            </div>
                        </div>
		
			<div class="hr"></div>  
		    <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                        <?php 
			echo anchor('request_approval/CTRL_View_Detail/'.$id, '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-danger'));
			echo nbs(1);
			echo form_hidden('id',$id);
			echo form_hidden('selMember_value','');
			?> 
                                       <button type="submit" name="btnsubmit" value="Save" class="btn btn-small btn-primary" onclick="SelectAll_Member();"><i class="fa fa-save"></i> Save</button> &nbsp;
			  
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
