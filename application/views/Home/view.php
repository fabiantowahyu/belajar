<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <?php
    if ($user_group == '1') {
	?> 
        <tr>
    	<td valign="top" width="50%">
			<?php foreach ($dashboard_left as $left) { ?>
			    <div class="col-md-12">
				<div class="panel panel-default ">
				    <div class="panel-heading">
					<span class="font-md">
					    <i class="fa fa-signal"></i>
					    <?= $left->view_title ?>
					</span>
				    </div>

				    <div class="panel-body">
					<?php $this->load->view('Home/' . $left->view_name); ?>
				    </div>
				</div>
			    </div>
			<?php } ?>
    	</td>
    	<td valign="top">
    	    <div class="col-md-12">
			    <?php foreach ($dashboard_right as $right) { ?>
				<div class="panel panel-default">
				    <div class="panel-heading">
						<span class="font-md">
						    <i class="fa fa-signal"></i>
						    <?= $right->view_title ?>
						</span>
				    </div>

				    <div class="panel-body">
						<?php $this->load->view('Home/' . $right->view_name); ?>
				    </div>
				</div>
		    </div>
		<?php } ?>
    	</td>
    </tr>
	<?php
    } else {
	?>
        <tr>
    	<td valign="top" width="50%">
		<?php foreach ($dashboard_left as $left) { ?>
		    <div class="col-md-12">
			<div class="panel panel-default ">
			    <div class="panel-heading">
				<span class="font-md">
				    <i class="fa fa-signal"></i>
				    <?= $left->view_title ?>
				</span>
			    </div>

			    <div class="panel-body">
				<?php $this->load->view('Home/' . $left->view_name); ?>
			    </div>
			</div>
		    </div>

		<?php } ?>
    	</td>
    	<td valign="top">
    	    <div class="col-md-12">
		    <?php foreach ($dashboard_right as $right) { ?>
			<div class="panel panel-default">
			    <div class="panel-heading">
				<span class="font-md">
				    <i class="fa fa-signal"></i>
				    <?= $right->view_title ?>
				</span>
			    </div>

			    <div class="panel-body">
				<?php $this->load->view('Home/' . $right->view_name); ?>
			    </div>
			</div>
		    </div>

		<?php } ?>
    	</td>
        </tr>
	<?php
    }
    ?> 
</table>