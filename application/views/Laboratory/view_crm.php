<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">
		<?php 
		echo 'Reference Material'; 
		echo nbs(2);
		echo anchor('laboratory/CTRL_New_CRM/'.$id, '<i class="icon-plus"></i>', array('class'=>'btn btn-warning btn-mini'));
		?>
	</h3>

	<table id="table-crm" class="table table-striped table-bordered table-hover">
		<thead class="info">
			<tr>
				<th width="100">Reference Material Name</th>
				<th width="90">Standard Type</th>
				<th width="100">Reference Material Value</th>
                <th width="220">Description</th>
                <th width="10" class="center">Action</th> 
			</tr>
		</thead>

		<tbody>
			<?php foreach ($results_crm as $row) { ?>
			<tr>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->standard_type; ?></td>
                <td><?php echo $row->standard_value; ?></td>
				<td style="text-align:left"><?php echo $row->remark; ?></td>
                <td class="center">
					<?php 
						echo anchor('laboratory/CTRL_Edit_CRM/' . $id . '/' . $row->id, '<button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>');
					?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>