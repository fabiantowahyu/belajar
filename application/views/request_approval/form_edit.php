<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
	<div class="span12 offset panel-box">
		<div><h3><?php echo $title; ?></h3></div>
		<?php echo form_open($url,array('name'=>'myForm','class'=>'form-horizontal','id'=>'validation-form')); ?>
		<fieldset>
			<div class="control-group">
				<label for="RequestName" class="control-label">Request Name</label>
				<div class="controls">
					<?php
						$input = array('name'=>'RequestName','value'=>$request_name,'maxlength'=>64,'id'=>'GroupName','class'=>'input-medium','disabled'=>'disabled');
						echo form_input($input);
					?>
				</div>
			</div>
			<div class="control-group">
				<label for="Description" class="control-label">Description</label>
				<div class="controls">
					<?php
						$txtarea = array('name'=>'description','value'=>$remark,'rows'=>3,'class'=>'span5','disabled'=>'disabled');
						echo form_textarea($txtarea); 
					?>
				</div>
			</div>
           
            <div class="hr"></div>

            <div class="control-group">
				<label for="Type" class="control-label">Approval Type</label>
				<div class="controls">
					<?php
						echo form_radio('type',1,1,'id="type_single"');
					?>
					<span class="lbl"> Single</span>
					<?php
						echo form_radio('type',0,0,'id="type_multiple"');
					?>
					<span class="lbl"> Multiple</span>
				</div>
			</div>

			
			<div class="control-group" id="View-Single">
                <label for="emp_app" class="control-label">Employee</label>
                <div class="controls">
                    <?php
                     echo form_dropdown('emp_app',$option_emp_app,$emp_app,'class="chzn-select span5" onchange="this.form.submit()";'); 
                    ?>
                </div>
            </div>
            
			
			<div class="row-fluid" id="View-Multiple">
				<div class="row-fluid">
					<div class="span6"><b>Not Member of : </b></div>
					<div class="span6"><b>Member of : </b></div>
				</div>
				<div class="span6">
					<div class="span9">
						<div class="input-append">
							<input name="search_not_member" value="<?php echo $search_not_member; ?>" class="input-xlarge" placeholder="Search" id="SearchNotMember" type="text"  onkeydown="cekKey(event,document.myForm.selNonMember,document.myForm.selMember)">	
							<button type="button" name="searchNotMember" value="Search" class="btn btn-success"><i class="icon-search"></i></button> 
                         </div>
						 <br /><br />
						<?php
							echo form_dropdown("selNonMember",$option_not_member,'','size="16" multiple="multiple" class="span8"');
						?>
					</div>

					<div class="span3" style="margin-top:100px;">
						<a href="javascript:void(0);" class="btn btn-small btn-primary" onclick="ChangeValue(2);"> >> </a> <br><br>
						<a href="javascript:void(0);" class="btn btn-small btn-danger" onclick="ChangeValue(3);"> << </a>
					</div>
				</div>
                
				<div class="span5">
						<div class="input-append">
							<!--<input name="search_member" value="<?php echo $search_member; ?>" class="input-medium" placeholder="Search" id="SearchMember" type="text">-->	  		
							<!--<button type="submit" name="searchMember" value="Search" class="btn btn-success"><i class="icon-search"></i></button>-->
						</div>
						 <br /><br />
						<?php
							echo form_dropdown("selMember",$option_member,'','size="16" multiple="multiple" class="span7"');
						?>
				</div>
			</div>
            
		   <div class="hr"></div> 
           <div class="row-fluid">
             <div>
               <div class="control-group">
                    <label for="approvalby" class="control-label">Step of Approval - 1</label>
                    <div class="controls">
                        <?php
                            echo form_dropdown('approvalby[]',$option_approvalby,$approvalby,'id ="approvalby" class="chzn-select span3"'); 
                            echo form_hidden('step_approval','1');
                            echo nbs(3);
                        ?>
                        OR &nbsp;
                        <?php
                            echo form_dropdown('approvalby_subs[]',$option_approvalby_subs_1,$approvalby_subs_1,'id ="approvalby" class="chzn-select span3"'); 
                            echo nbs(3);
                            echo form_checkbox('is_required1',1,$is_required1,'class="ace-checkbox-2"');
                        ?>
                        <span class="lbl">&nbsp;Required</span>
                    </div>
               </div>
              
               <div class="control-group">
                    <label for="approvalby2" class="control-label">Step of Approval - 2</label>
                    <div class="controls">
                        <?php
                            echo form_dropdown('approvalby[]',$option_approvalby2,$approvalby2,'id ="approvalby2" class="chzn-select span3"');
                            echo form_hidden('step_approval','2');
                            echo nbs(3); 
                        ?>
                        OR &nbsp;
                        <?php
                            echo form_dropdown('approvalby_subs[]',$option_approvalby_subs_2,$approvalby_subs_2,'id ="approvalby2" class="chzn-select span3"');
                            echo nbs(3);
                            echo form_checkbox('is_required2',1,$is_required2,'class="ace-checkbox-2"'); 
                        ?>
                        <span class="lbl">&nbsp;Required</span>
                    </div>
               </div>
               
               <div class="control-group">
                    <label for="approvalby3" class="control-label">Step of Approval - 3</label>
                    <div class="controls">
                        <?php
                            echo form_dropdown('approvalby[]',$option_approvalby3,$approvalby3,'id ="approvalby3" class="chzn-select span3"');
                            echo form_hidden('step_approval','3');
                            echo nbs(3); 
                        ?>
                        OR &nbsp;
                        <?php
                            echo form_dropdown('approvalby_subs[]',$option_approvalby_subs_3,$approvalby_subs_3,'id ="approvalby3" class="chzn-select span3"');
                            echo nbs(3);
                            echo form_checkbox('is_required3',1,$is_required3,'class="ace-checkbox-2"'); 
                        ?>
                        <span class="lbl">&nbsp;Required</span>
                    </div>
               </div>
             </div>
           </div>
           
           <div class="hr"></div>  
		   <div class="form-actions">
				<button type="submit" name="btnsubmit" value="Done" class="btn btn-small btn-info" onclick="SelectAll_Member();"><i class="icon-save"></i> Save</button> &nbsp;
				<?php 
					echo anchor('request_approval', '<i class="icon-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-primary'));
					echo nbs(1);
					echo form_hidden('id',$id);
					echo form_hidden('selMember_value','');
				?>
			</div>
		</fieldset>
		<?php echo form_close(); ?>
	</div>
</div>
