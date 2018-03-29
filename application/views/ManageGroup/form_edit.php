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
			<?php echo form_open($url,array('class'=>'form-horizontal','id'=>'validation-form',
					'data-bv-message'=>'This field is required',
					'data-bv-feedbackicons-valid'=>'glyphicon glyphicon-ok',
					'data-bv-feedbackicons-invalid'=>'glyphicon glyphicon-remove',
					'data-bv-feedbackicons-validating'=>'glyphicon glyphicon-refresh'
				)); ?>

			<fieldset>
				<legend><?php echo $title; ?></legend>
				<div class="form-group">
					<label for="CustomTitle" class="col-md-2 control-label">Group Name</label>
					<div class="col-md-4">
						<?php
							$input = array('name'=>'nama','value'=>$nama,'maxlength'=>64,'id'=>'GroupName','class'=>'form-control','data-bv-notempty'=>'true');
							echo form_input($input);
						?>
					</div>
				</div>

				<div class="form-group">
					<label for="CustomTitle" class="col-md-2 control-label">Description</label>
					<div class="col-md-4">
						<?php
							$input = array('name'=>'description','value'=>$description,'maxlength'=>128,'id'=>'GroupName','class'=>'form-control');
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
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-danger btn-small dropdown-toggle">
								<i class="fa fa-plus-circle">  More..</i> 
								<span class="caret"></span>
							</button>	

							<ul class="dropdown-menu dropdown-danger">
								<li>
									<?php 
										echo anchor('manage_group/CTRL_Privileges_User/'.$id, '<i class="icon-group"></i> Admin Group');
									?>
								</li>
								<li>
									<?php 
										echo anchor('manage_group/CTRL_Privileges_Menu/'.$id, '<i class="icon-key"></i> User Authorization Group');
									?>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#" data-toggle="modal" data-target="#myModal"><i class="icon-trash"></i>&nbsp;Delete</a>
								</li>
							</ul>
						</div><!--/btn-group-->
						&nbsp;
						<?php 
							echo anchor('manage_group', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
							echo form_hidden('id',$id);
						?>
						&nbsp;
						<button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button> 						
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
</article>
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