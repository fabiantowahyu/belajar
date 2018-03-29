<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <div class="col-md-12 ">
	<div class="col-md-6">
	 <form method="post" id="form-filter" action="<?= base_url() ?>admin/CTRL_SetFilterGroup">
		
		    <div class="row-fluid input-append">
			<div class="form-group">
			<select name="user_group" onchange="submitChange()" class="form-control">
			    <?php
			    foreach ($group as $group) {
				?>
    			    <option value="<?= $group->id ?>" <?= $group->id == $active_group ? 'selected' : '' ?>><?= $group->nama ?></option>
			    <?php } ?>
			</select>
			</div>
		    </div>
		
	    </form> 
	</div>
	<div class="clearfix"></div>
	<?php
	/*	    foreach ($active_view as $key => $v) {
			?>
    					    <tr>
    						    <td><?= $v->view_title ?></td>
    						    <td><a href="" class="btn btn-danger btn-mini">Remove</td>
    					    </tr>
			<?php
		    } */
		    ?>
	
	<div class="col-md-6">	    
					    
					     <div class=" well ">
			<h5><strong>Add Access</strong></h5>
			<form method="post" action="<?= base_url() ?>admin/CTRL_AddDashboardView">
			    <input type="hidden" name="group_id" value="<?= isset($active_group) ? $active_group : '' ?>">
			    <div class="form-group">
			    <select name="view_id" class="form-control">
					    <?php
					    foreach ($dashboard_view as $key => $view) {
						?>
    					    <option value="<?= $view->id ?>"><?= $view->view_title ?></option>
						<?php
					    }
					    ?>
					</select>
			    </div>
			       <div class="form-group">
			    <select name="position" class="form-control" >
					    <option value="L">LEFT</option>
					    <option value="R">RIGHT</option>
					</select>
			       </div>
			    <button class="btn btn-small btn-warning pull-right"><i class="fa fa-plus"></i>Add</button>
			    <div class="clearfix"></div>
			</form>
		    </div>
	</div>		 
	<div class="clearfix"></div>
	<div class="col-md-6">
			<div class="well">
			<h5><strong>LEFT</strong></h5> <br/>
			<table class="table table-striped table-bordered table-hover">
			    <thead class="info">
			    <th>View Name</th>
			    <th>Action</th>
			    </thead>
			    <tbody>
				<?php
				foreach ($active_view_left as $key => $v) {
				    ?>
    				<tr>
    				    <td><?= $v->view_title ?></td>
    				    <td><a href="<?= base_url() ?>admin/CTRL_DeleteView/<?= $v->previlege_id ?>" class="btn btn-danger btn-mini">Remove</td>
    				</tr>
				    <?php
				}
				?>
			    </tbody>
			</table>
		    </div>	
	</div>	    
	<div class="col-md-6">
			<div class="well">
			<h5><strong>RIGHT</strong></h5> <br/>
			<table class="table table-striped table-bordered table-hover">
			    <thead class="info">
			    <th>View Name</th>
			    <th>Action</th>
			    </thead>
			    <tbody>
				<?php
				foreach ($active_view_right as $key => $v) {
				    ?>
    				<tr>
    				    <td><?= $v->view_title ?></td>
    				    <td><a href="<?= base_url() ?>admin/CTRL_DeleteView/<?= $v->previlege_id ?>" class="btn btn-danger btn-mini">Remove</td>
    				</tr>
				    <?php
				}
				?>
			    </tbody>
			</table>
		    </div>		    
	</div>			    
	<table>
	    <tr>
	   
	    </tr>
	    <tr>
		<td colspan="2" align="center">
		    <!-- <div class="span12 offset panel-box">
			    <h5><strong>User Access</strong></h5> <br/>
			    <table class="table table-striped table-bordered table-hover">
				    <thead class="info">
					    <th>View Name</th>
					    <th>Action</th>
				    </thead>
				    <tbody>
		    
				    </tbody>
			    </table>
		    </div> -->

		   
		</td>
		<td>
		</td>

	    </tr>
	    <tr>
		<td>
		    
		</td>
		<td>
		    
		</td>
	    </tr>
	</table>
	<br/>

	<table>
	    <tr>
		<th></th>
	    </tr>
	</table>

    </div>
</div>
<script src="<?php echo base_url(); ?>themes/js/jquery.js"></script>

<script type="text/javascript">
                            function submitChange() {
                                document.getElementById('form-filter').submit();
                            }
</script>
