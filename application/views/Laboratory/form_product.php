<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<br><br>
<div class="row">
	<div class="span10 offset panel-box">
		<div><h3><?php echo $title_head; ?></h3></div>
		<?php echo form_open($url,array('name'=>'myForm','class'=>'form-horizontal')); ?>
		<fieldset>
			<div class="hr"></div>
			<div class="row-fluid">
				<div class="span6"><b>Not Product of : </b></div>
				<div class="span6"><b>Product of : </b></div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="span9">
						<div class="input-append">
							<!--<input name="search_not_member" value="<?php //echo $search_not_member; ?>" class="input-medium" placeholder="Search" id="SearchNotMember" type="text">	  		
							<button type="submit" name="searchNotMember" value="Search" class="btn btn-success"><i class="icon-search"></i></button>	-->	
                            <input name="search_not_member" value="<?php echo $search_not_member; ?>" placeholder="Search" id="SearchNotMember" type="text"  onkeydown="cekKey(event,document.myForm.selNonMember,document.myForm.selMember)" size="10">	
							<button type="button" name="searchNotMember" value="Search" class="btn btn-success"><i class="icon-search"></i></button> 				
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
				<div class="span6">
						<div class="input-append">
							<!--<input name="search_member" value="<?php echo $search_member; ?>" class="input-medium" placeholder="Search" id="SearchMember" type="text">	  		
							<button type="submit" name="searchMember" value="Search" class="btn btn-success"><i class="icon-search"></i></button>-->
						</div>
						 <br /><br />
						<?php
							echo form_dropdown("selMember",$option_member,'','size="16" multiple="multiple" class="span7"');
						?>
				</div>
			</div>
			<div class="hr"></div>
			<div>
				<button type="submit" name="submit" value="Done" class="btn btn-small btn-info" onclick="SelectAll_Member();"><i class="icon-save"></i> Done</button> &nbsp;
				<?php 
					echo anchor('laboratory/CTRL_Edit/'.$id, '<i class="icon-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-primary'));
					echo form_hidden('lab_id',$id);
					echo form_hidden('selMember_value','');
				?>
			</div>
		</fieldset>
		<?php echo form_close(); ?>
	</div>
</div>
