<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <legend>
        <h3>
	    <?php
	    echo anchor('lse_approval', $title, array('class' => 'link-control'));
	    ?>
        </h3>
    </legend>   
    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="true" >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>LSE Approval Data</h2>
                    </header>
                    <div>
			<?php echo form_open('lse_approval', array('name' => 'fmFilter', 'id' => 'fmFilter')); ?>
                        <table width="60%" border="0">
                            <tr>
                                <td width="5%">
                                    <div class="row-fluid input-append">
                                        <label>Last Status</label>
                                    </div>
                                </td>
                                <td width="25%">
                                    <div class=" input-group">
					<?php
					echo form_dropdown('laststatus_lse', $option_laststatus, $laststatus, 'class="form-control" data-bv-notempty="true" style="width:100%" onchange="this.form.submit()";');
					?>
                                    </div>
                                </td>
                            </tr>
                        </table>
			<?php echo form_close(); ?>
                        <legend></legend>
                        <div class="widget-body ">
                            <div class="tabbable">
                                <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                    <thead class="danger">
                                        <tr>
                                            <th class="text-center">LSE No</th>
                                            <th class="text-center">Requester</th>
                                            <th class="text-center">Request Date</th>
					    <th class="text-center">Branch</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
					<?php foreach ($results as $row) { ?>
    					<tr>
    					    <td class="text-center"><?php echo $row->no_lse; ?></td>
    					    <td><?php echo $row->client_name; ?></td>
    					    <td><?php echo $row->date_issued; ?></td>
    					    <td><?php echo $row->branch; ?></td>
    					    <td>
    						<div class="text-center">
							<?php if ($row->laststatus_lse == 0 || $row->laststatus_lse == 1 || $row->laststatus_lse == 8) { ?>
							    <span class="label label-info"><?php echo $row->status_lse; ?></span>
							<?php } else if ($row->laststatus_lse == 2 || $row->laststatus_lse == 5 || $row->laststatus_lse == 9) { ?>
							    <span class="label label-warning"><?php echo $row->status_lse; ?></span>
							<?php } else if ($row->laststatus_lse == 3 || $row->laststatus_lse == 6) { ?>
							    <span class="label label-success"><?php echo $row->status_lse; ?></span>
							<?php } else if ($row->laststatus_lse == 4 || $row->laststatus_lse == 7) { ?>
							    <span class="label label-danger"><?php echo $row->status_lse; ?></span>
							<?php } ?>
    						</div>
    					    </td>
    					    <td class="text-center">
						    <?php echo anchor('Lse_approval/CTRL_Edit/' . $row->id . '/' . $row->no_lse, '<button class="btn btn-xs btn-primary"><i class="fa fa-edit bigger-120"></i></button>'); ?>
    					    </td>
    					</tr>
					<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>