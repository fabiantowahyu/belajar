<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <!-- NEW WIDGET START -->
    <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2><?php echo $title_head; ?></h2>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                    <?php echo form_open_multipart($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                    <!--
                                    <form action=<?php echo $url ?> method="post" id="validation-form" class="form-horizontal"
                                            data-bv-message="This value is not valid"
                                            data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                            data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                            data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                    -->
                    <fieldset>


                        <legend>General</legend>
                        <div role="content">
                            <div class="col-md-2">
                                <span class="profile-picture">
                               <!--     <img class="editable" id="logoCompany" src="<?php //echo base_url() . $file_name;   ?>" /> -->
                                    <input type="file" name="userfile" />
                                </span>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="CompanyID" class="col-md-3 control-label"><?php echo $title; ?> ID</label>
                                    <div class="col-md-4">
                                        <?php
                                        $input = array('name' => 'id', 'maxlength' => 15,'value'=>$id, 'id' => 'CompanyID', 'class' => 'form-control','disabled'=>'disabled');
                                        echo form_input($input);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="CompanyType" class="col-md-3 control-label"><?php echo $title; ?> Type <span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <?php
                                        echo form_dropdown('type', $option_type, $type, 'class = "form-control", data-bv-notempty = "true"');
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="CompanyName" class="col-md-3 control-label"><?php echo $title; ?> Name <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <?php
                                        $input = array('name' => 'name', 'maxlength' => 64, 'id' => 'CompanyName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                        echo form_input($input);
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>       
                        <div class="clearfix"></div>
                        <div role="content">
                            <div class="space"></div>
                            <legend>Contact</legend>


                            <div class="form-group">
                                <label for="Country" class="col-md-2 control-label">Country  <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'country', 'maxlength' => 64, 'id' => 'Country', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Province" class="col-md-2 control-label">Province  <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'province', 'maxlength' => 64, 'id' => 'Province', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="City" class="col-md-2 control-label">City  <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'city', 'maxlength' => 64, 'id' => 'City', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Address" class="col-md-2 control-label">Address  <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    $txtarea = array('name' => 'address', 'rows' => 2, 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_textarea($txtarea);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="PostalCode" class="col-md-2 control-label">Postal Code</label>
                                <div class="col-md-2">
                                    <?php
                                    $input = array('name' => 'postal_code', 'maxlength' => 64, 'id' => 'PostalCode', 'class' => 'form-control input-mask-kdpos');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Phone" class="col-md-2 control-label">Phone</label>
                                <div class="col-md-2">
                                    <?php
                                    $input = array('name' => 'phone', 'maxlength' => 64, 'id' => 'Phone', 'class' => 'form-control input-mask-phone');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="Fax" class="col-md-2 control-label">Fax</label>
                                <div class="col-md-2">
                                    <?php
                                    $input = array('name' => 'fax', 'maxlength' => 64, 'id' => 'Fax', 'class' => 'form-control input-mask-fax');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>	


                            <div class="form-group">
                                <label for="Email" class="col-md-2 control-label">Email</label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'email', 'maxlength' => 64, 'id' => 'Email', 'class' => 'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>	
                            <div class="space"></div>
                            <legend>Bank Account</legend>
                            <div class="form-group">
                                <label for="BankAccount" class="col-md-2 control-label">Company Bank Account</label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'bank_account', 'maxlength' => 64, 'id' => 'BankAccount', 'class' => 'form-control', 'onkeypress' => 'return numbersonly(event)');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>	

                            <div class="form-group">
                                <label for="BankName" class="col-md-2 control-label">Company Bank Name</label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'bank_name', 'maxlength' => 64, 'id' => 'BankName', 'class' => 'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>		

                            <div class="form-group">
                                <label for="AccountName" class="col-md-2 control-label">Account Name</label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'account_name', 'maxlength' => 64, 'id' => 'AccountName', 'class' => 'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>	
                            <div class="space"></div>
                            <legend>Others</legend>

                            <div class="form-group">
                                <label for="Vision" class="col-md-2 control-label">Vision</label>
                                <div class="col-md-4">
                                    <?php
                                    $txtarea = array('name' => 'vission', 'rows' => 3, 'class' => 'form-control');
                                    echo form_textarea($txtarea);
                                    ?>
                                </div>
                            </div>		

                            <div class="form-group">
                                <label for="Mission" class="col-md-2 control-label">Mission</label>
                                <div class="col-md-4">
                                    <?php
                                    $txtarea = array('name' => 'mission', 'rows' => 3, 'class' => 'form-control');
                                    echo form_textarea($txtarea);
                                    ?>
                                </div>
                            </div>	

                          	
                            <div class="form-group">
                                <label for="CompanyStatus" class="col-md-2 control-label">Company Status</label>
                                <div class="col-md-2">
                                    <span>
                                        <span class="onoffswitch">
                                            <?php
                                            echo form_checkbox('status', 1, 0, 'class="onoffswitch-checkbox" id="st3"');
                                            ?>
                                            <label class="onoffswitch-label" for="st3"> 
                                                <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                                <span class="onoffswitch-switch"></span> 
                                            </label> 
                                        </span>
                                    </span>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="CompanyCurrency" class="col-md-2 control-label">Company Currency</label>
                                <div class="col-md-4">
                                    <?php
                                    echo form_dropdown('currency', $option_currency, $currency, 'class="form-control"');
                                    ?>
                                </div>
                            </div>		
                            <div class="form-group">
                                <label for="TaxCountry" class="col-md-2 control-label">Tax Country</label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'tax_country', 'maxlength' => 64, 'id' => 'TaxCountry', 'class' => 'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>	
                            <div class="form-group">
                                <label for="TaxFile" class="col-md-2 control-label">NPWP</label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'tax_file', 'maxlength' => 64, 'id' => 'TaxFile', 'class' => 'form-control');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>	


                            <div class="form-group">
                                <label for="tax_signature" class="col-md-2 control-label">Tax Author Signature </label>
                                <div class="col-md-4">
                                    <?php
                                    echo form_dropdown('tax_signature', $option_tax_signature, $tax_signature, 'class="form-control" ');
                                    ?>
                                </div>
                            </div>	


                            <div class="form-group">
                                <label for="invoice_signature" class="col-md-2 control-label">Invoice Author Signature  </label>
                                <div class="col-md-4">
                                    <?php
                                    echo form_dropdown('invoice_signature', $option_invoice_signature, $invoice_signature, 'class="form-control"');
                                    ?>
                                </div>
                            </div>		
                        </div><br/>
                         <i><span class="text-danger">*</span>) Required</i>
                    </fieldset>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                echo anchor('company', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                                echo nbs(1);
                                echo form_hidden('id', $id);
                                ?>
                                <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button> &nbsp;
                            </div>
                        </div>
                    </div>

                    <?php echo form_close(); ?>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
    </article>
    <!-- end widget -->
</div>
<div class="clearfix"></div>
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/js/ace/ace.min.css">
<script src="<?php echo ASSETS_URL; ?>/js/ace/ace-elements.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/ace/function.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/ace/ace.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/ace/jquery.gritter.min.js"></script>
<script type="text/javascript">
    $('#validation-form')
		.find('input[type=file]').ace_file_input({
			style:'well',
			btn_choose:'Change logo',
			btn_change:null,
			no_icon:'fa fa-picture-o',
			thumbnail:'large',
			droppable:true,
			before_change: function(files, dropped) {
				var file = files[0];
				if(typeof file === "string") {//files is just a file name here (in browsers that don't support FileReader API)
					if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
				}
				else {//file is a File object
					var type = $.trim(file.type);
					if(last_gritter) $.gritter.remove(last_gritter);
					if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
							|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
						) {
						last_gritter = $.gritter.add({
							title: 'File is not an image!',
							text: 'Please choose a jpg|gif|png image!',
							class_name: 'gritter-error gritter-center'
						});
						return false;
					}
	
					if( file.size > 510000 ) {//~500Kb
						last_gritter = $.gritter.add({
							title: 'File too big!',
							text: 'Image size should not exceed 500Kb!',
							class_name: 'gritter-error gritter-center'
						});
						return false;
					}
				}
	
				$.gritter.removeAll();
				return true;
			}
		});

    </script>
