<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <legend>
        <h3>
	    <?php
	    echo anchor('lse', $title, array('class' => 'link-control'));
	    echo nbs(2);
	    echo anchor('lse/CTRL_New', '<i class="fa fa-plus"></i>', array('class' => 'btn btn-success btn-mini'));
	    ?>
        </h3>
    </legend>
    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="true" >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Row Tables </h2>
                    </header>

                    <div>
			            <?php echo form_open('lse', array('name' => 'fmFilter', 'id' => 'fmFilter')); ?>
                        <table width="60%" border="0">
                            <tr>
                                <td width="15%">
                                    <div class="row-fluid input-append">
                                        <label for="id-date-picker-1">From Date</label>
                                    </div>
                                </td>
                                <td width="25%">
                                    <div class=" input-group">
                    					<?php
                    					$input = array('name' => 'req_startdate', 'id' => 'req_startdate', 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd', 'value' => $req_startdate);
                    					echo form_input($input);
                    					?>

                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </td>
                                <td width="15%" align="center">
                                    <div class="row-fluid input-append">
                                        <label for="id-date-picker-2">End Date</label>
                                    </div>
                                </td>
                                <td width="25%">
                                    <div class=" input-group">
                					<?php
                					$input = array('name' => 'req_enddate', 'id' => 'req_enddate', 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd', 'value' => $req_enddate);
                					echo form_input($input);
                					?>

                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </td>
                                <td valign="middle" align="center">
                                    <div class="row-fluid input-append">
                                        <button type="submit" name="filter" class="btn btn-small btn-info"><i class="icon-filter"></i> Filter</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
			<?php echo form_close(); ?>

                        <legend></legend>
                        <div class="widget-body ">
                            <div class="tabbable">
                                <table id="example" class="display projects-table table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				    <thead>
					<tr>
					    <th></th>
					    <th><i class="fa fa-exchange fa-user text-muted hidden-md hidden-sm hidden-xs"></i> No LS</th>
					    <th><i class="fa fa-building fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Branch</th>
					    <th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Exporter Name</th>
					    <th><i class="fa fa-circle txt-color-darken font-xs"></i> Issued Date</th>
					    <th><i class="fa fa-circle text-danger font-xs"></i> Expired Date</th>
					    <th><i class="fa fa-leaf text-success font-xs"></i> Status</th>
					</tr>
				    </thead>
				</table>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>