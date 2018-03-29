<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<br>
<div class="row-fluid">
    <!-- row -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <header>
            </header>
            <!-- widget div-->
            <div>
                <fieldset>
		    <div class="alert alert-success fade in" id="notification_error">
			<button class="close" data-dismiss="alert"> × </button>
			<i class="fa-fw fa fa-info"></i>
			<strong>Info!</strong>
			History Lists of every submited approver..
		    </div>
                    <legend class="text-info"><strong>APPROVAL HISTORY INFORMATION</strong></legend>
		    <table class="table table-striped table-bordered table-hover">
			<thead class="danger">
			    <tr>
				<th class="text-center">No</th>
				<th class="text-center">Name</th>
				<th class="text-center">Status</th>
				<th class="text-center">Respond Date</th>
				<th class="text-center">Remark</th>
			    </tr>
			</thead>
			<tbody>
			    <?php
			    $count = 1;
			    foreach ($history as $row) {
				?>
    			    <tr>
    				<td class="text-center"><?php echo $count ++; ?></td>
    				<td class="text-left"><?php echo $row->emp_name; ?></td>
    				<td>
    				    <div class="text-center">
					    <?php if ($row->approval_status == 0 || $row->approval_status == 1 || $row->approval_status == 7) { ?>
						<span class="label label-info"><?php echo $row->status_name; ?></span>
					    <?php } else if ($row->approval_status == 2 || $row->approval_status == 5) { ?>
						<span class="label label-warning"><?php echo $row->status_name; ?></span>
					    <?php } else if ($row->approval_status == 3 || $row->approval_status == 6) { ?>
						<span class="label label-success"><?php echo $row->status_name; ?></span>
					    <?php } else if ($row->approval_status == 4 || $row->approval_status == 8 || $row->approval_status == 9) { ?>
						<span class="label label-danger"><?php echo $row->status_name; ?></span>
					    <?php } ?>
    				    </div>
    				</td>
    				<td><?php echo $row->approval_date; ?></td>
    				<td><?php echo $row->remark; ?></td>
    			    </tr>
			    <?php } ?>
			</tbody>
		    </table>
                </fieldset>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
			    <?php
			    echo anchor('Lse_approval', '<i class="fa fa-reply"></i>&nbsp;Back', array('class' => 'btn btn-small btn-info'));
			    echo nbs(1);
			    ?>
                        </div>
                    </div>
                </div>
		<?php echo form_close(); ?>
            </div>
        </article>
    </div>

</div>