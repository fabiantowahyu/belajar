<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
    <legend>
    <h3>
        <?php 
        echo anchor('Holiday', $title, array('class'=>'link-control')); 
        echo nbs(2);
        echo anchor('holiday/CTRL_New', '<i class="fa fa-plus"></i>', array('class'=>'btn btn-success btn-mini','data-rel'=>'tooltip','title'=>'Add Holiday'));
        ?>
    </h3>
    </legend>

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
                    <div>
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                <thead class="success">
                                    <tr>
										<th width="200">Holiday Name</th>
										<th width="150">Holiday Type</th> 
										<th width="100">Start Date</th> 
										<th width="100">End Date</th> 
										<th width="50" class="center">Action</th> 
									</tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($results as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->holiday_name; ?></td>
										<td><?php echo $row->type; ?></td>
										<td><?php echo $row->start_date; ?></td>
										<td><?php echo $row->end_date; ?></td>
										<td class="center">
											<?php 
												echo anchor('holiday/CTRL_Edit/' . $row->holiday_id, '<button class="btn btn-xs btn-primary"><i class="fa fa-edit bigger-120"></i></button>');
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
    </section>
</div>