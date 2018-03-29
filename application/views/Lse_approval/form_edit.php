<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <ul class="nav nav-tabs padding-16" id="myTab">
                    <li class="active" id="tab-basic">
                        <a data-toggle="tab" href="#FormAB">
                            <i class="blue fa fa-rebel bigger-125 text-warning"></i>
                            Information Detail
                        </a>
                    </li>
                    <li id="tab-confirmation">
                        <a data-toggle="tab" href="#FormB">
                            <i class="blue fa fa-key bigger-125 text-success"></i>
                            Survey Information
                        </a>
                    </li>
		    <li id="tab-confirmation">
                        <a data-toggle="tab" href="#FormC">
                            <i class="blue fa fa-file-pdf-o bigger-125 text-primary"></i>
                            Documents Information
                        </a>
                    </li>
		    <?php if ($history != null) { ?>
    		    <li id="tab-confirmation">
    			<a data-toggle="tab" href="#FormD">
    			    <i class="blue fa fa-pencil bigger-125 text-danger"></i>
    			    History Information
    			</a>
    		    </li>
		    <?php }; ?>
		    <?php if ($last_status == '3' || $last_status == '6' || $last_status == '7' || $last_status == '8') { ?>
    		    <li id="tab-confirmation">
    			<a data-toggle="tab" href="#FormE">
    			    <i class="blue fa fa-pencil bigger-125 text-magenta"></i>
    			    Certificate Information
    			</a>
    		    </li>
		    <?php }; ?>
                </ul>
            </header>
            <!-- start widget-->
            <div><div class="widget-body">
                    <div class="tab-content profile-edit-tab-content">
                        <!-- start content -->
                        <div id="FormAB" class="tab-pane in active">
			    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                            <fieldset>
                                <div role="content">
                                    <div class="col-md-12">
                                        <legend><strong class="text-info">ISSUING OFFICE INFORMATION</strong></legend>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">LSE No: </label>
                                            <div class="col-md-3">
                                                <label class="control-label"><strong><?= $no_lse; ?></strong></label>
                                            </div>
                                            <label class="col-md-2 col-md-offset-1 control-label">Date of Issued: </label>
                                            <div class="col-md-3">
                                                <label class="control-label"><?= date("d M Y", strtotime($date_issued)); ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Issuing Office: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= $branch; ?></label>
                                            </div>
                                            <label class="col-md-2 col-md-offset-1 control-label" >Date of Expires: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= date("d M Y", strtotime($date_expired)); ?></label>
                                            </div>
                                        </div><br/>
                                        <legend><strong class="text-info">EXPORTER'S STATEMENT INFORMATION</strong></legend>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >ET-COAL Registered No: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= $no_reg_exporter; ?></label>
                                            </div>
                                            <label class="col-md-2 col-md-offset-1 control-label" >ET-Coal Registered Date: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= date("d M Y", strtotime($date_reg_exporter)); ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >NPWP No: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= $npwp_no; ?></label>
                                            </div>
                                            <label class="col-md-2 col-md-offset-1 control-label" >WO No: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= $no_wo; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Exporter Name: </label>
					    <div class="col-md-3">
						<label class="control-label"><?= $client_name; ?></label>
					    </div>
					    <label class="col-md-2 col-md-offset-1 control-label" >WO Date : </label>
					    <div class="col-md-3">
						<label class="control-label"><?= date("d M Y", strtotime($date_wo)); ?></label>
					    </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Exporter Address: </label>
                                            <div class="col-md-3">
						<label><?= $exporter_address; ?></label>
                                            </div>
                                            <label  class="col-md-2 col-md-offset-1 control-label" >Packing List No: <br/><br/> Packing List Date: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= $no_packing_list; ?></label>
                                                <br/>
						<label class="control-label" style="padding-top: 15px"><?= date("d M Y", strtotime($date_packing_list)); ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-md-2 control-label" >Invoice Packing List No: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= $no_invoice_packing_list; ?></label>
                                            </div>
                                            <label class="col-md-2 col-md-offset-1 control-label" >Invoice Packing Date: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= date("d M Y", strtotime($date_invoice_packing_list)); ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Survey Location: </label>
                                            <div class="col-md-3">
						<label><?= $survey_location; ?></label>
                                            </div>
                                            <label class="col-md-2 col-md-offset-1 control-label" >Survey Location Date: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= date("d M Y", strtotime($survey_location_date)); ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Importer Name:  <br/><br/> Country:  <br/><br/> Port Destination: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= $importer; ?></label>
                                                <br/>
						<label class="control-label" style="padding-top: 20px"><?= $country; ?></label>
                                                <br/>
						<label class="control-label" style="padding-top: 20px"><?= $port_destination; ?></label>
                                            </div>
                                            <label for="" class="col-md-2 col-md-offset-1 control-label" >Importer Address: </label>
                                            <div class="col-md-3" style="padding-top: 5px">
						<label><?= $importer_address; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Loading Port: </label>
                                            <div class="col-md-3">
						<label><?= $port; ?></label>
                                            </div>
                                            <label class="col-md-2 col-md-offset-1 control-label" >Vessel Name: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= $vessel_name; ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-2 control-label" >Loading Vessel Start Date: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= date("d M Y", strtotime($stdate_load_vessel)); ?></label>
                                            </div>
                                            <label for="" class="col-md-2 col-md-offset-1 control-label" >Loading Vessel End Date:</label>
                                            <div class="col-md-3">
						<label class="control-label"><?= date("d M Y", strtotime($enddate_load_vessel)); ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-2 control-label" >Mining License No: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= $no_mining_license; ?></label>
                                            </div>
                                            <label for="" class="col-md-2 col-md-offset-1 control-label" >Mining License Date: </label>
                                            <div class="col-md-3" style="padding-top: 8px">
						<?php
						echo date("d M Y", strtotime($date_mining_license));
						?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-2 control-label" >Transporting & Selling License No: </label>
                                            <div class="col-md-3" style="padding-top: 8px">
						<label class="control-label"><?php
						    if ($no_transsell_license) {
							echo $no_transsell_license;
						    } else {
							echo "<strong>No Data For Transport License</strong>";
						    };
						    ?>
						</label>
                                            </div>
                                            <label for="" class="col-md-2 col-md-offset-1 control-label" >Transporting & Selling License Date: </label>
                                            <div class="col-md-3" style="padding-top: 8px">
						<label class="control-label"><?php
						    if ($date_transsell_license != '0000-00-00') {
							echo date("d M Y", strtotime($date_transsell_license));
						    } else {
							echo "<strong>No Data For Transport Date</strong>";
						    };
						    ?>
						</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-2 control-label" >Smelter License No: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?php
						    if ($no_smelter_license) {
							echo $no_smelter_license;
						    } else {
							echo "<strong>No Data For Smelter License</strong>";
						    };
						    ?>
						</label>
                                            </div>
                                            <label for="" class="col-md-2 col-md-offset-1 control-label" >Date Smelter License: </label>
                                            <div class="col-md-3">
						<label class="control-label">
						    <?php
						    if ($date_smelter_license != '0000-00-00') {
							echo date("d M Y", strtotime($date_smelter_license));
						    } else {
							echo "<strong>No Data For Smelter Date</strong>";
						    };
						    ?>
						</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-md-2 control-label" >Royalty Payment No: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= $no_royalty_payment; ?></label>
                                            </div>
                                            <label for="" class="col-md-2 col-md-offset-1 control-label" >Date Royalty Payment: </label>
                                            <div class="col-md-3">
						<label class="control-label"><?= date("d M Y", strtotime($date_royalty_payment)); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset> 
			    <div class="form-actions">
				<?php
				echo anchor('Lse_approval', '<i class="fa fa-reply"></i>&nbsp;Back', array('class' => 'btn btn-small btn-info'));
				?>
			    </div>
			    <?php
			    echo form_close();
			    ?>
			</div>
			<div id="FormB" class="tab-pane">
			    <?php $this->load->view('lse_approval/survey_result', $plugin); ?>
			</div>
			<div id="FormC" class="tab-pane">
			    <?php $this->load->view('lse_approval/view_upload', $plugin); ?>
			</div>
			<div class="clearfix"></div>
			<div id="FormD" class="tab-pane">
			    <?php $this->load->view('lse_approval/view_history_approval', $plugin); ?>
			</div>
			<div class="clearfix"></div>
			<div id="FormE" class="tab-pane">
			    <?php $this->load->view('lse_approval/view_approval_certificate', $plugin); ?>
			</div>
			<!-- end content -->
		    </div>
		</div></div>
	    <!-- end widget-->
	</div>
    </article>
    <div class="clearfix"></div>
</div>