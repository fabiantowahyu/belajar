<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">
		<?php
		echo 'Equipment';
		echo nbs(2);
		echo anchor('laboratory/CTRL_New_Equip/'.$id, '<i class="icon-plus"></i>', array('class'=>'btn btn-warning btn-mini'));
		?>
	</h3>

	<table id="table-equipment" class="table table-striped table-bordered table-hover">
		<thead class="info">
			<tr>
				<th width="170">Equipment Name</th>
				<th width="130">Merk/Type</th>
				<th width="130">Measure Capacity</th>
				<th width="130">Inventory Number</th>
				<th width="50">Status</th>
                <th width="80">Next Calibration</th>
				<th width="10" class="center">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($results_equipment as $row) { ?>
			<tr>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->brand; ?></td>
				<td><?php echo $row->measure_capacity; ?></td>
				<td><?php echo $row->inventory_num; ?></td>
				<td><?php echo $row->status; ?></td>
                <td><?php echo date("d M Y", strtotime($row->next_calibrate)); ?></td>
				<td class="center">
					<?php
						echo anchor('laboratory/CTRL_Edit_Equip/' . $id . '/' . $row->id, '<button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>');
					?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>