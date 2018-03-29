<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <legend>
        <h3>
	    <?php
	    echo anchor('report_lse_lc', $title, array('class' => 'link-control'));
	    ?><br/>
            <small>  Verifikasi Ekspor LC Pertambangan tertentu </small>
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
			<?php echo form_open('report_lse_lc', array('name' => 'fmFilter', 'id' => 'fmFilter', 'class' => 'col-md-10 col-sm-12')); ?>
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
                        <div class="pull-right"><a href="<?php echo $url_excel; ?>" type="submit" name="filter" class="btn btn-small btn-danger"><i class="fa fa-file-excel-o"></i> Generate Report</a></div>
                        <div class="clearfix"></div>
                        <legend></legend>
                        <div class="widget-body ">
                            <div class="tabbable">
                                <table id="dt_basic" class="table table-striped table-bordered table-hover">
				    <thead class="info">
					<tr>
					    <th>LSE No</th>
					    <th>Date Issued</th>
					    <th>Exporter</th>
					    <th>Importer</th>
					    <th>Loading_port</th>

					</tr>
				    </thead>

				    <tbody>
					<?php foreach ($results as $row) { ?>
    					<tr>
    					    <td><?php echo $row->no_lse; ?></td>
    					    <td><?php echo date("d F Y", strtotime($row->date_issued)); ?></td>
    					    <td><?php echo $row->client_name; ?></td>
    					    <td><?php echo $row->importer_name; ?></td>
    					    <td><?php echo $row->loading_port_name; ?></td>




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