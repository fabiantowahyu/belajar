<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br><br>
<div class="row-fluid">
	<div class="span12 offset panel-box">
		<div><h3><?php echo $title; ?></h3></div>
		<?php echo form_open($url,array('name'=>'myForm','class'=>'form-horizontal','id'=>'validation-form')); ?>
		<fieldset>
			<div class="control-group">
				<label for="RequestName" class="control-label">Request Name</label>
				<div class="controls">
					<?php
						$input = array('name'=>'RequestName','value'=>$request_name,'maxlength'=>64,'id'=>'GroupName','class'=>'input-xlarge','disabled'=>'disabled');
						echo form_input($input);
					?>
				</div>
			</div>
			<div class="control-group">
				<label for="Description" class="control-label">Description</label>
				<div class="controls">
					<?php
						$input = array('name'=>'description','value'=>$remark,'maxlength'=>128,'id'=>'Description','class'=>'input-xlarge','disabled'=>'disabled');
						echo form_input($input);
					?>
				</div>
			</div>
           
           <div class="hr"></div>
			<div class="row-fluid">
				<div class="span6"><b>Not Member of : </b></div>
				<div class="span6"><b>Member of : </b></div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="span9">
						<div class="input-append">
							<input name="search_not_member" value="<?php echo $search_not_member; ?>" class="input-medium" placeholder="Search" id="SearchNotMember" type="text">	 		
							<button type="submit" name="searchNotMember" value="Search" class="btn btn-success"><i class="icon-search"></i></button> 
                            <!--#DO_VAR["Find"]# &nbsp;<input type="Text" id="idSearch" name="txtSearch" size="#ATTRIBUTES.SIZE_TEXTBOX#" onkeydown="cekKey(event,document.#ATTRIBUTES.FORM_NAME#.#ATTRIBUTES.SELECT1_NAME#,document.#ATTRIBUTES.FORM_NAME#.#ATTRIBUTES.SELECT2_NAME#)" onclick="notSelected(document.#ATTRIBUTES.FORM_NAME#.#ATTRIBUTES.SELECT1_NAME#)">-->
						</div>
						 <br /><br />
						<?php
							echo form_dropdown("selNonMember",$option_not_member,'','size="16" multiple="multiple" class="span8"');
						?>
					</div>

					<div class="span3" style="margin-top:100px;">
						<a href="#" class="btn btn-small btn-primary" onclick="ChangeValue(2);"> >> </a> <br><br>
						<a href="#" class="btn btn-small btn-danger" onclick="ChangeValue(3);"> << </a>
					</div>
				</div>
                
				<div class="span5">
						<div class="input-append">
							<input name="search_member" value="<?php echo $search_member; ?>" class="input-medium" placeholder="Search" id="SearchMember" type="text">	  		
							<button type="submit" name="searchMember" value="Search" class="btn btn-success"><i class="icon-search"></i></button>
						</div>
						 <br /><br />
						<?php
							echo form_dropdown("selMember",$option_member,'','size="16" multiple="multiple" class="span7"');
						?>
				</div>
			</div>
            
		   <div class="hr"></div> 
           <div class="row-fluid">
             <div class="span5">
               <div class="control-group">
                    <label for="approvalby" class="control-label">Step of Approval - 1</label>
                    <div class="controls">
                        <?php
                            echo form_dropdown('approvalby',$option_approvalby,$approvalby,'id ="approvalby"'); 
                        ?>
                    </div>
               </div>
              
               <div class="control-group">
                    <label for="approvalby2" class="control-label">Step of Approval - 2</label>
                    <div class="controls">
                        <?php
                            echo form_dropdown('approvalby2',$option_approvalby2,$approvalby2,'id ="approvalby2"'); 
                        ?>
                    </div>
               </div>
               
               <div class="control-group">
                    <label for="approvalby2" class="control-label">Step of Approval - 3</label>
                    <div class="controls">
                        <?php
                            echo form_dropdown('approvalby2',$option_approvalby2,$approvalby2,'id ="approvalby2"'); 
                        ?>
                    </div>
               </div>
             </div>
             
             <div class="span6">
                  <div class="control-group">
                    <label for="approvalby" class="control-label">OR </label>
                    <div class="controls">
                        <?php
                            echo form_dropdown('approvalby',$option_approvalby,$approvalby,'id ="approvalby"'); 
                        ?>
                    </div>
               </div>
              
               <div class="control-group">
                    <label for="approvalby2" class="control-label">OR </label>
                    <div class="controls">
                        <?php
                            echo form_dropdown('approvalby2',$option_approvalby2,$approvalby2,'id ="approvalby2"'); 
                        ?>
                    </div>
               </div>
               
               <div class="control-group">
                    <label for="approvalby2" class="control-label">OR </label>
                    <div class="controls">
                        <?php
                            echo form_dropdown('approvalby2',$option_approvalby2,$approvalby2,'id ="approvalby2"'); 
                        ?>
                    </div>
               </div>
             </div>
           </div>
           
           <div class="hr"></div>  
		   <div class="form-actions">
				<button type="submit" name="submit" value="Done" class="btn btn-small btn-info" onclick="SelectAll_Member();"><i class="icon-save"></i> Save</button> &nbsp;
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