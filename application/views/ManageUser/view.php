<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row-fluid">
	<h3 class="header smaller lighter blue">
		<?php 
		echo anchor('manage_user', $title, array('class'=>'link-control')); 
		echo nbs(2);
		echo anchor('manage_user/CTRL_New', '<i class="fa fa-plus"></i>', array('class'=>'btn btn-success btn-mini'));
		?>
	</h3>

	<section id="widget-grid" class="">
		<!-- row -->		
		<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-colorbutton="false"
		data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="true" 
		>
		<header>
            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
            <h2>Row Tables </h2>
        </header>

		<!-- widget div-->
		<div>

		<!-- widget content -->
		<div class="widget-body no-padding">
			<table id="dt_basic" class="table table-striped table-bordered table-hover">
				<thead class="success">
					<tr>
						<th width="150">Userid</th>
						<th width="250">Name</th>
						<th width="250">Email</th>
						<th width="100">Status</th>
						<th width="150">Last Login</th>
						<th width="10" class="center">Action</th> 
					</tr>
				</thead>

				<tbody>
					<?php foreach ($results as $row) { ?>
					<tr>
						<td><?php echo $row->userid; ?></td>
						<td><?php echo $row->username; ?></td>
						<td><?php echo $row->email; ?></td>
						<td><?php echo $row->active; ?></td>
						<td><?php echo $row->last_login; ?></td>
						<td class="center">
							<?php 
								echo anchor('manage_user/CTRL_Edit/' . $row->id, '<button class="btn btn-xs btn-info"><i class="fa fa-edit bigger-120"></i></button>');
							?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- end widget content -->
	</div>
	<!-- end widget div -->
</div>
<!-- end widget -->
        </article>
                        </div>
        </section></div>