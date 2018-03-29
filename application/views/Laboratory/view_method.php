<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">
		<?php 
		echo 'Method'; 
		echo nbs(2);
		echo anchor('laboratory/CTRL_New_Method/'.$id, '<i class="icon-cog"></i> Manage', array('class'=>'btn btn-warning btn-mini'));
		?>
	</h3>

	<table id="table-method" class="table table-striped table-bordered table-hover">
		<thead class="info">
			<tr>
				<th width="80">Standard Method</th>
				<th width="100">Method Name</th>
				<th width="80">Year</th>
				<th width="220">Description</th>
               
			</tr>
		</thead>

		<tbody>
			<?php
			$i = 2011;
			foreach ($results_method as $row) { ?>
			<tr>
				<td><?php echo $row->standard_method; ?></td>
				<td><?php echo $row->method_name; ?></td>
				<td><?php echo $row->year;?> |
					<?php
					echo anchor('laboratory/CTRL_editMethodYear/'.$row->id_lab_method, '<i class="icon-pencil"></i> Edit', array('class'=>'btn btn-warning btn-mini'));
					?>
				</td>
				<td style="text-align:left"><?php echo $row->description; ?></td>
			</tr>
			<?php
				$i++;
			} ?>
		</tbody>
	</table>
</div>