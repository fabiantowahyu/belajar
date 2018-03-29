<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">
		<?php
		echo 'Expert';
		echo nbs(2);
		echo anchor('laboratory/CTRL_New_Leader/'.$id, '<i class="icon-plus"></i>', array('class'=>'btn btn-warning btn-mini'));
		?>
	</h3>

	<table id="table-leader" class="table table-striped table-bordered table-hover">
		<thead class="info">
			<tr>
				<th width="150">Name</th>
				<th width="150">Position</th>
				<th width="100">Start Date</th>
				<th width="100">End Date</th>
				<th width="50">Status</th>
				<th width="10" class="center">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($results_leader as $row) {
				$startdate = ($row->startdate != "0000-00-00") ? date("d F Y",strtotime($row->startdate)) : "-";
				$enddate = ($row->enddate != "0000-00-00") ? date("d F Y",strtotime($row->enddate)) : "-";
			?>
			<tr>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->position; ?></td>
				<td><?php echo $startdate; ?></td>
				<td><?php echo $enddate; ?></td>
				<td>
					<?php
					if($row->status) {
					?>
						<span class="label label-info arrowed-in-right">
							<i class="icon-circle smaller-80"></i>
							<?php echo $row->nm_status; ?>
						</span>
					<?php
					} else {
					?>
						<span class="label label-warning arrowed-in-right">
							<i class="icon-ban-circle smaller-80"></i>
							<?php echo $row->nm_status; ?>
						</span>
					<?php
					}
					?>
				</td>
				<td class="center">
					<?php
						echo anchor('laboratory/CTRL_Edit_Leader/' . $id . '/' . $row->id, '<button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>');
					?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>