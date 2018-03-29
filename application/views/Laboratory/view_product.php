<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
	<h3 class="header smaller lighter blue">
		<?php 
		echo 'Product'; 
		echo nbs(2);
		echo anchor('laboratory/CTRL_New_Product/'.$id, '<i class="icon-cog"></i> Manage', array('class'=>'btn btn-warning btn-mini'));
		?>
	</h3>

	<table id="table-product" class="table table-striped table-bordered table-hover">
		<thead class="info">
			<tr>
				<th width="50">Position</th>
				<th width="150">Product Code</th>
				<th width="150">Product Name</th>
				<th width="75">Standard Method</th>
                <th width="75">Industry</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($results_product as $row) { ?>
			<tr>
				<td><?php echo $row->position; ?> |
					<?php
					echo anchor('laboratory/CTRL_editProductPosition/'.$row->id_lab_product, '<i class="icon-pencil"></i> Edit', array('class'=>'btn btn-warning btn-mini'));
					?>
				</td>
				<td><?php echo $row->product_code; ?></td>
				<td><?php echo $row->product; ?></td>
				<td><?php echo $row->standard_method; ?></td>
                <td style="text-align:left"><?php echo $row->industry; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>