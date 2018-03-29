<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h6>&nbsp; Detail Registrasi </h6>
            </header>

	    <div>
		<div class="widget-body">
		    <form class="form-horizontal" action="<?= base_url() ?>registration/CTRL_Do_Approve" method="post" id="wizard-1">
			<?php foreach ($detail as $row) { ?>
    			<fieldset>
    			    <div id="bootstrap-wizard-1" class="col-sm-12">
    				<div class="form-bootstrapWizard">
    				    <ul class="bootstrapWizard form-wizard">
    					<li class="active" data-target="#step1">
    					    <a href="#tab1" data-toggle="tab" ><span class="step">1</span></a><span class="title">Company Information</span> 
    					</li>
    					<li data-target="#step2">
    					    <a href="#tab2" data-toggle="tab"><span class="step">2</span></a><span class="title">Documents information</span> 
    					</li>
    					<li data-target="#step3">
    					    <a href="#tab3" data-toggle="tab"><span class="step">3</span></a><span class="title">Licenses information</span> 
    					</li>
    					<li data-target="#step4">
    					    <a href="#tab4" data-toggle="tab"><span class="step">4</span></a><span class="title">Account information</span> 
    					</li>
    				    </ul>
    				    <div class="clearfix"></div>
    				</div>
    				<div class="tab-content" style="margin-top:50px;">
    				    <div class="tab-pane active" id="tab1">
					    <?php echo form_hidden('client_id', $id); ?>
    					<div class="form-group">
    					    <label for="Type" class="col-md-5 control-label">Company Type</label>
    					    <label class="col-md-offset-1 control-label">: <?php echo $row->client ?></label>
						<?php
						echo form_hidden('client_type', $row->client_type);
						?>
    					</div>
    					<div class="form-group">
    					    <label for="RequestName" class="col-md-5 control-label">Company Name</label>
    					    <label class="col-md-offset-1 control-label">: <?php echo $row->client_name ?></label>
						<?php
						echo form_hidden('client_name', $row->client_name);
						?>
    					</div>
    					<div class="form-group">
    					    <label for="RegisDate" class="col-md-5 control-label">Company Address</label>
    					    <label class="col-md-offset-1 control-label">: <?php echo $row->client_address ?></label>
						<?php
						echo form_hidden('client_address', $row->client_address);
						?>
    					</div>
    					<div class="form-group">
    					    <label for="Username" class="col-md-5 control-label">Email Address</label>
    					    <label class="col-md-offset-1 control-label">: <?php echo $row->client_email ?></label>
						<?php
						echo form_hidden('client_email', $row->client_email);
						?>
    					</div>
    					<div class="form-group">
    					    <label for="RegisDate" class="col-md-5 control-label">Mobile Phone</label>
    					    <label class="col-md-offset-1 control-label">: <?php echo $row->client_phone ?></label>
						<?php
						echo form_hidden('client_phone', $row->client_phone);
						?>
    					</div>
    					<div class="form-group">
    					    <label for="RegisDate" class="col-md-5 control-label">Job Title</label>
    					    <label class="col-md-offset-1 control-label">: <?php echo $row->client_jobtitle ?></label>
						<?php
						echo form_hidden('client_jobtitle', $row->client_jobtitle);
						?>
    					</div>
    				    </div>
    				    <!-- Tab 2 : Upload Documents -->
    				    <div class="tab-pane col-lg-12" id="tab2" style="margin-top:10px">
    					<table class="table table-striped table-hover" border="0">
    					    <tr id="APP">
    						<th width="45%"><label>Akta Pendirian Perusahaan</label></th>
    						<td width="45%">
							<?php if ($row->APP) { ?>
							    <a  href="#" href="#" onclick="PopUpWindow('<?php echo $file . $row->APP; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><label>Akta Pendirian Perusahaan</label></a>
							    <?php
							} else {
							    echo "File Not Exist";
							    ?>
							    <input type="hidden" name="app" value="app">
							<?php } ?>
    						</td>
    						<td width="10%">
    						    <label>
							    <?php echo form_checkbox('app', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
    						    </label>
    						</td>
    					    </tr>
    					    <tr id="TDI">
    						<th><label> IUI / TDI </label></th>
    						<td>
							<?php if ($row->TDI) { ?>
							    <a  href="#" href="#" onclick="PopUpWindow('<?php echo $file . $row->TDI; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><label>IUI / TDI</label></a>
							    <?php
							} else {
							    echo "File Not Exist";
							    ?>
							    <input type="hidden" name="tdi" value="tdi">
							<?php } ?>
    						</td>
    						<td>
    						    <label>
							    <?php echo form_checkbox('tdi', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
    						    </label>
    						</td>
    					    </tr>
    					    <tr id="NPWP">
    						<th><label>NPWP</label></th>
    						<td>
							<?php if ($row->NPWP) { ?>
							    <a  href="#" href="#" onclick="PopUpWindow('<?php echo $file . $row->NPWP; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><label>NPWP</label></a>
							    <?php
							} else {
							    echo "File Not Exist";
							    ?>
							    <input type="hidden" name="npwp" value="npwp">
							<?php } ?>
    						</td>
    						<td>
    						    <label>
							    <?php echo form_checkbox('npwp', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
    						    </label>
    						</td>
    					    </tr>
    					    <tr id="SM">
    						<th><label>Sertifikat Merek</label></th>
    						<td>
							<?php if ($row->SM) { ?>
							    <a  href="#" href="#" onclick="PopUpWindow('<?php echo $file . $row->SM; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><label>Sertifikat Merek</label></a>
							    <?php
							} else {
							    echo "File Not Exist";
							    ?>
							    <input type="hidden" name="sm" value="sm">
							<?php } ?>
    						</td>
    						<td>
    						    <label>
							    <?php echo form_checkbox('sm', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
    						    </label>
    						</td>
    					    </tr>
    					    <tr id="PLM">
    						<th width="100"><label>Perjanjian Lisensi Merek</label></th>
    						<td width="100">
							<?php if ($row->PLM) { ?>
							    <a  href="#" href="#" onclick="PopUpWindow('<?php echo $file . $row->PLM; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><label>Perjanjian Lisensi Merek</label></a>
							    <?php
							} else {
							    echo "File Not Exist";
							    ?>
							    <input type="hidden" name="plm" value="plm">
							<?php } ?>
    						</td>
    						<td width="100">
							<?php if ($row->PLM == "") { ?>
							    <label>
								<?php echo form_checkbox('plm', 1, 0, ' class="checkbox style-0" disabled'); ?><span class="lbl"></span>
							    </label>
							<?php } else { ?> 
							    <label>
								<?php echo form_checkbox('plm', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
							    </label>
							<?php }; ?>
    						</td>
    					    </tr>
    					</table>
    				    </div><div class="clearfix"></div>

    				    <!-- Tab 3 : NRP /NPB Documents -->
    				    <div class="tab-pane col-lg-12" id="tab3" style="margin-top:10px">
                            <!--    					<table class="table table-striped table-hover" border="0">
    					    <thead class="danger">
    						<tr>
    						    <th width="100" class="text-center">ID</th>	 
    						    <th width="170" class="text-center">Registration No</th>
    						    <th width="200" class="text-center">Commodity</th>
    						    <th width="200" class="text-center">Brand</th>
    						    <th width="200" class="text-center">Product Type</th>
    						    <th width="200" class="text-center">Registration Date</th>
    						    <th width="200" class="text-center">Attachment</th>
    						    <th width="200" class="text-center">Status</th>
    						</tr>
    					    </thead>
    					    <tbody>
					    <?php foreach ($result as $row) { ?>
														<tr>
														    <td class="text-center"><?php echo $row->id; ?></td>
														    <td class="text-left"><?php echo $row->registration_no; ?></td>
														    <td class="text-left"><?php echo $row->commodity_name; ?></td>
														    <td class="text-left"><?php echo $row->brand; ?></td>
														    <td class="text-left"><?php echo $row->product_type; ?></td>
														    <td class="text-center"><?php echo $row->registration_date; ?></td>
														    <td class="text-center"><a  href="#" href="#" onclick="PopUpWindow('<?php echo $file . $row->file_upload; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><label><?php echo $row->type; ?></label></a></td>
														    <td style="text-align:center"><?php if ($row->status == 0) { ?>
	    														<span class="label label-info"><?php echo "Unverified"; ?></span>
						    <?php
						}
						if ($row->status == 1) {
						    ?>
	    														<span class="label label-success"><?php echo "Verified"; ?></span>
						    <?php
						}
						if ($row->status == 2) {
						    ?>
	    														<span class="label label-warning"><?php echo "Denied"; ?></span>
						<?php }; ?>
														    </td>
														</tr>
					    <?php }; ?>
    					    </tbody>
    					</table>-->

    					<div id="NRP">

    					    <input type="hidden" value="<?php echo $type; ?>" id="client_type">
    					    <legend>Exporter <label> <?php echo form_checkbox('check_registration_nrp', 1, 0, ' class="checkbox style-0"  id="check_registration_nrp"'); ?><span class="lbl"></span> </label>
    					    </legend>
    					    <div class="alert alert-info no-margin fade in " id="info">
    						<span class="close" id="closeInfo"  data-dismiss="alert">  × </span>
    						<i class="fa-fw fa fa-info"></i>
    						Check to replace  with government data 
    					    </div>


    					    <table class="table table-striped table-hover text-center" border="0" id="table_registration">
    						<thead class="danger">
    						    <tr>
    							<th width="100"  class="text-center">Attribute</th>	 
    							<th width="100"  class="text-center">Company</th>
    							<th width="100"  class="text-center">Government</th>
    							<th width="100"  class="text-center">Validate</th>
    							<th width="100"  class="text-center">Verify</th>
    						    </tr>
    						</thead>
    						<tbody>

                            <!--<tr><td>Id</td><td><?php echo $comp_id; ?></td><td></td><td></td></tr> -->
    						    <tr id="row1"><td class="text-left">Registration No</td>
                                                        <td><span id="comp_registration_no_nrp"><?php echo $comp_registration_no; ?></span></td>
                                                        <td><?php if ($comp_registration_no != $gov_registration_no){echo form_dropdown('registration_no', $option_registration_noNRP, $gov_registration_no, 'class = "form-control col-sm-2", id="registrationselectNRP" , required="" , onchange="getdetailRegistration(this.value);"');}else{?>          
                                                        <span id="gov_registration_no_nrp"><?php echo $gov_registration_no; ?></span> <?php }?> </td>
                                                        <td><span id="gov_registration_no_nrp_check"><?php echo $comp_registration_no == $gov_registration_no ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    							<td><label> <?php echo form_checkbox('replace_registration_no', 1, 0, ' class="replace_nrp checkbox style-0" id="check1" onchange="highlight(1);" '); ?><span class="lbl"></span> </label></td>
    						<input type="hidden" id="gov_registration_no_nrp_temp" value="<?php echo $gov_registration_no; ?>" name="gov_registration_no">
    						</tr>
    						<tr id="row2"><td class="text-left">Commodity</td>
                                                    <td><span id="comp_commodity_name_nrp"><?php echo $comp_commodity_name; ?></span></td>
                                                    <td><span id="gov_commodity_name_nrp"><?php echo $gov_commodity_name; ?></span></td>
                                                    <td> <span id="gov_commodity_name_nrp_check"><?php echo $comp_commodity_name == $gov_commodity_name ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_commodity', 1, 0, ' class="replace_nrp checkbox style-0" id="check2" onchange="highlight(2);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_commodity_name_nrp_temp" value="<?php echo $gov_commodity; ?>" name="gov_commodity">	
    						</tr>
    						<tr id="row3"><td class="text-left">Brand</td>
    						    <td><span id="comp_brand_nrp"><?php echo $comp_brand; ?></span></td>
                                                    <td><span id="gov_brand_nrp"><?php echo $gov_brand; ?></span></td>
                                                    <td><span id="gov_brand_nrp_check"><?php echo $comp_brand == $gov_brand ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_brand', 1, 0, ' class="replace_nrp checkbox style-0" id="check3" onchange="highlight(3);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_brand_nrp_temp" value="<?php echo $gov_brand; ?>" name="gov_brand">
    						</tr>
    						<tr id="row4"><td class="text-left">Product Type</td>
    						    <td><span id="comp_product_type_nrp"><?php echo $comp_product_type; ?></span></td>
                                                    <td><span id="gov_product_type_nrp"><?php echo $gov_product_type; ?></span></td>
                                                    <td><span id="gov_product_type_nrp_check"><?php echo $comp_product_type == $gov_product_type ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_product_type', 1, 0, ' class="replace_nrp checkbox style-0" id="check4" onchange="highlight(4);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_product_type_nrp_temp" value="<?php echo $gov_product_type; ?>" name="gov_product_type">
    						</tr>
    						<tr id="row5"><td class="text-left">Registration Date</td>
                                                    <td><span id="comp_registration_date_nrp"><?php echo $comp_registration_date; ?></span></td>
                                                    <td><span id="gov_registration_date_nrp"><?php echo $gov_registration_date; ?></span></td>
                                                    <td><span id="gov_registration_date_nrp_check"><?php echo $comp_registration_date == $gov_registration_date ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_registration_date', 1, 0, ' class="replace_nrp checkbox style-0" id="check5" onchange="highlight(5);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_registration_date_nrp_temp" value="<?php echo $gov_registration_date; ?>" name="gov_registration_date">
    						</tr>
						<tr id="row5"><td class="text-left">Expired Date</td>
                                                    <td><span id="comp_expiration_date_nrp"><?php echo $comp_expiration_date; ?></span></td>
                                                    <td><span id="gov_expiration_date_nrp"><?php echo $gov_expiration_date; ?></span></td>
                                                    <td><span id="gov_expiration_date_nrp_check"><?php echo $comp_expiration_date == $gov_expiration_date ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_expiration_date', 1, 0, ' class="replace_nrp checkbox style-0" id="check7" onchange="highlight(7);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_expiration_date_nrp_temp"  value="<?php echo $gov_expiration_date; ?>" name="gov_expiration_date">
    						</tr>
    						<tr id="row6"><td class="text-left">Attachment</td>
                                                    <td><span id="comp_attachment_nrp"><a   href="#" onclick="PopUpWindow('<?php echo $file . $comp_file_upload; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><label>attachment<?php //echo $comp_type; ?></label></a></span></td>
                                                    <td><span id="gov_attachment_nrp"><?php if ($gov_file_upload) { ?><a   href="#" onclick="PopUpWindow('<?php echo $file . $gov_file_upload; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><label>attachment<?php //echo $comp_type; ?></label></a> <?php } ?></span></td>
                                                    <td><span id="gov_attachment_nrp_check"><?php echo $gov_file_upload && $comp_file_upload ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_file_upload', 1, 0, ' class="replace_nrp checkbox style-0" id="check6" onchange="highlight(6);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_attachment_nrp_temp" value="<?php echo $gov_file_upload; ?>" name="gov_file_upload">
    						</tr>


    						</tbody>
    					    </table>
    					</div>


    					<div id="NPB">
    					    <legend>Importer <label> <?php echo form_checkbox('check_registration_npb', 1, 0, ' class="checkbox style-0" id="check_registration_npb" '); ?><span class="lbl"></span> </label>
    					    </legend>
    					    <div class="alert alert-info no-margin fade in " id="info">
    						<span class="close" id="closeInfo"  data-dismiss="alert">  × </span>
    						<i class="fa-fw fa fa-info"></i>
    						Check to replace  with government data 
    					    </div>


    					    <table class="table table-striped table-hover text-center" border="0" id="table_registration">
    						<thead class="danger">
    						    <tr>
    							<th width="100"  class="text-center">Attribute</th>	 
    							<th width="100"  class="text-center">Company</th>
    							<th width="100"  class="text-center">Government</th>
    							<th width="100"  class="text-center">Validate</th>
    							<th width="100"  class="text-center">Replace</th>


    						    </tr>
    						</thead>



    						<tbody>

                            <!--<tr><td>Id</td><td><?php echo $comp_id_npb; ?></td><td></td><td></td></tr> -->
    						    <tr id="row_npb1"><td class="text-left">Registration No</td>
                                                        <td><span id="comp_registration_no_npb"><?php echo $comp_registration_no_npb; ?></span></td>
                                                        <td><?php if ($comp_registration_no_npb != $gov_registration_no_npb){echo form_dropdown('registration_no', $option_registration_noNPB, $gov_registration_no_npb, 'class = "form-control col-sm-2", id="registrationselectNPB" , required="" , onchange="getdetailRegistrationNPB(this.value);"');}else{?>          
                                                        <span id="gov_registration_no_npb"><?php echo $gov_registration_no_npb; ?></span><?php }?></td>
                                                        <td><span id="gov_registration_no_npb_check"><?php echo $comp_registration_no_npb == $gov_registration_no_npb ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    							<td><label> <?php echo form_checkbox('replace_registration_no_npb', 1, 0, ' class="replace_npb checkbox style-0" id="check_npb1" onchange="highlight_npb(1);" '); ?><span class="lbl"></span> </label></td>
    						<input type="hidden" id="gov_registration_no_npb_temp" value="<?php echo $gov_registration_no_npb; ?>" name="gov_registration_no_npb">   
    						</tr>
    						<tr id="row_npb2"><td class="text-left">Commodity</td>
                                                    <td><span id="comp_commodity_name_npb"><?php echo $comp_commodity_name_npb; ?></span></td>
    						    <td><span id="gov_commodity_name_npb"><?php echo $gov_commodity_name_npb; ?></span></td>
                                                    <td><span id="gov_commodity_name_npb_check"> <?php echo $comp_commodity_name_npb == $gov_commodity_name_npb ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_commodity_npb', 1, 0, ' class="replace_npb checkbox style-0" id="check_npb2" onchange="highlight_npb(2);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_commodity_name_npb_temp" value="<?php echo $gov_commodity_npb; ?>" name="gov_commodity_npb">  
    						</tr>
    						<tr id="row_npb3"><td class="text-left">Brand</td>
                                                    <td><span id="comp_brand_npb"><?php echo $comp_brand_npb; ?></span></td>
                                                    <td><span id="gov_brand_npb"><?php echo $gov_brand_npb; ?></span></td>
    						    <td><span id="gov_brand_npb_check"><?php echo $comp_brand_npb == $gov_brand_npb ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_brand_npb', 1, 0, ' class="replace_npb checkbox style-0" id="check_npb3" onchange="highlight_npb(3);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_brand_npb_temp"value="<?php echo $gov_brand_npb; ?>" name="gov_brand_npb">  
    						</tr>
    						<tr id="row_npb4"><td class="text-left">Product Type</td>
                                                    <td><span id="comp_product_type_npb"><?php echo $comp_product_type_npb; ?></span></td>
    						    <td><span id="gov_product_type_npb"><?php echo $gov_product_type_npb; ?></span></td>
    						    <td><span id="gov_product_type_npb_check"><?php echo $comp_product_type_npb == $gov_product_type_npb ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_product_type_npb', 1, 0, ' class="replace_npb checkbox style-0" id="check_npb4" onchange="highlight_npb(4);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_product_type_npb_temp" value="<?php echo $gov_product_type_npb; ?>" name="gov_product_type_npb"> 
    						</tr>
    						<tr id="row_npb5"><td class="text-left">Registration Date</td>
                                                    <td><span id="comp_registration_date_npb"><?php echo $comp_registration_date_npb; ?></span></td>
                                                    <td><span id="gov_registration_date_npb"><?php echo $gov_registration_date_npb; ?></span></td>
                                                    <td><span id="gov_registration_date_npb_check"><?php echo $comp_registration_date_npb == $gov_registration_date_npb ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_registration_date_npb', 1, 0, ' class="replace_npb checkbox style-0" id="check_npb5" onchange="highlight_npb(5);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_registration_date_npb_temp"  value="<?php echo $gov_registration_date_npb; ?>" name="gov_registration_date_npb"> 
    						</tr>
						<tr id="row_npb5"><td class="text-left">Expired Date</td>
                                                    <td><span id="comp_expiration_date_npb"><?php echo $comp_expiration_date_npb; ?></span></td>
                                                    <td><span id="gov_expiration_date_npb"><?php echo $gov_expiration_date_npb; ?></span></td>
                                                    <td><span id="gov_expiration_date_npb_check"><?php echo $comp_expiration_date_npb == $gov_expiration_date_npb ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_expiration_date_npb', 1, 0, ' class="replace_npb checkbox style-0" id="check_npb7" onchange="highlight_npb(7);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_expiration_date_npb_temp"  value="<?php echo $gov_expiration_date_npb; ?>" name="gov_expiration_date_npb"> 
    						</tr>
    						<tr id="row_npb6"><td class="text-left">Attachment</td>
                                                    <td><span id="comp_attachment_npb"><a   href="#" onclick="PopUpWindow('<?php echo $file . $comp_file_upload_npb; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><label>attachment<?php //echo $comp_type_npb; ?></label></a></span></td>
                                                    <td><span id="gov_attachment_npb"><?php if ($gov_file_upload_npb) { ?><a   href="#" onclick="PopUpWindow('<?php echo $file . $gov_file_upload_npb; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><label>attachment<?php// echo $comp_type_npb; ?></label></a> <?php } ?></span></td>
                                                    <td><span id="gov_attachment_npb_check"><?php echo $gov_file_upload_npb && $comp_file_upload_npb ? '<i class="fa fa-check txt-color-green"></i>' : '<i class="fa fa-remove txt-color-red"></i>' ?></span></td>
    						    <td><label> <?php echo form_checkbox('replace_file_upload_npb', 1, 0, ' class="replace_npb checkbox style-0" id="check_npb6" onchange="highlight_npb(6);"'); ?><span class="lbl"></span></label></td>
    						<input type="hidden" id="gov_attachment_npb_temp"  value="<?php echo $gov_file_upload_npb; ?>" name="gov_file_upload_npb"> 
    						</tr>


    						</tbody>
    					    </table>
    					</div>


    				    </div>	

    				    <div class="clearfix"></div>

    				    <!-- Tab 4 -->
    				    <div class="tab-pane" id="tab4" style="margin-top:10px">
					    <?php foreach ($detail as $row) { ?>
						<fieldset>
						    <div class="form-group">
							<label for="Type" class="col-md-5 control-label">Username</label>
							<label class="col-md-offset-1 control-label">: <?php echo $row->username; ?></label>
							<?php
							echo form_hidden('username', $row->username);
							?>
						    </div>
						    <div class="form-group">
							<label for="RequestName" class="col-md-5 control-label">Email Address</label>
							<label class="col-md-offset-1 control-label">: <?php echo $row->email; ?></label>
							<?php
							echo form_hidden('email', $row->email);
							?>
						    </div>
						</fieldset>
					    <?php }; ?>
    				    </div>
    				</div>
    			    </div>
    			</fieldset>

    			<fieldset>
    			    <legend><i class="fa fa-check txt-color-teal"></i> Approval Statement</legend>
    			    <div class="form-group">
    				<label for="STATUS" class="col-md-8 control-label">STATUS :</label>
    				<div class="col-md-3">
    				    <select name="status" class="form-control">
    					<option value="2">Rejected</option>
    					<option value="1">Approved</option>
    				    </select>
    				</div>
    			    </div>
    			    <div class="form-group">
    				<label for="NOTE" class="col-md-8 control-label">NOTE :</label>
    				<div class="col-md-3">
    				    <textarea name="note" class="form-control" style="overflow:auto; resize:none;"></textarea>
    				</div>
    			    </div>
    			</fieldset>

    			<div class="form-actions">
    			    <div class="row">
    				<div class="col-md-12">
					<?php
					echo anchor('registration', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
					echo form_hidden('id', $register_id);
					?>
    				    <button type="submit" name="btn_submit" value="Save" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button> &nbsp;
    				</div>
    			    </div>
    			</div>
			<?php } ?>
		    </form>
                </div>
            </div>
        </div>
    </article>
    <div class="clearfix"></div>
</div>