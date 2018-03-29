<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<br>
<div class="row-fluid">



    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->

            <header>

            </header>

            <!-- widget div-->
            <div>
                <!-- widget edit box -->
                <!-- <div class="jarviswidget-editbox">
This area used as dropdown edit box
</div> -->
                <!-- end widget edit box -->

                <!-- widget content -->
                <fieldset>
                    <legend>Document Upload</legend>

                    <div class="alert alert-danger fade in" id="notification_error">
                        <button class="close" data-dismiss="alert"> × </button>
                        <i class="fa-fw fa fa-info"></i>
                        <strong>Info!</strong>
                        Please complete all required documents.
                    </div>
                    <div class="span6 offset panel-box1">
			<?php
			echo form_open_multipart($url, array('class' => 'form-horizontal', 'id' => 'upload_form',
			));
			?>

                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">NPWP<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="npwp_upload" id="id-input-file-1" accept=".pdf" data-bv-notempty ="true">
                                <div class="note">
				    <?php if ($npwp_upload) { ?>
    				    <strong class="txt-color-greenDark">uploaded:</strong>
    				    <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $npwp_upload; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><?php echo $npwp_upload; ?></a>    
    				    <input type="hidden" value="<?php echo $npwp_upload; ?>" name="uploaded_npwp">
				    <?php } ?>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">TDP<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="tdp" id="id-input-file-2" accept=".pdf" data-bv-notempty ="true">
                                <div class="note">
				    <?php if ($tdp) { ?>
    				    <strong class="txt-color-greenDark">uploaded:</strong>
    				    <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $tdp; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><?php echo $tdp; ?></a>    
    				    <input type="hidden" value="<?php echo $tdp; ?>" name="uploaded_tdp">
				    <?php } ?>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">SIUP <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="siup" id="id-input-file-3" accept=".pdf" data-bv-notempty ="true">
                                <div class="note">
				    <?php if ($siup) { ?>
    				    <strong class="txt-color-greenDark">uploaded:</strong>
    				    <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $siup; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><?php echo $siup; ?></a>    
    				    <input type="hidden" value="<?php echo $siup; ?>" name="uploaded_siup">
				    <?php } ?>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">SITU <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="situ" id="id-input-file-4" accept=".pdf" data-bv-notempty ="true">
                                <div class="note">
				    <?php if ($situ) { ?>
    				    <strong class="txt-color-greenDark">uploaded:</strong>
    				    <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $situ; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><?php echo $situ; ?></a>    
    				    <input type="hidden" value="<?php echo $situ; ?>" name="uploaded_situ">
				    <?php } ?>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">PKP<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="pkp" id="id-input-file-5" accept=".pdf" data-bv-notempty ="true">
                                <div class="note">
				    <?php if ($pkp) { ?>
    				    <strong class="txt-color-greenDark">uploaded:</strong>
    				    <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $pkp; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><?php echo $pkp; ?></a>    
    				    <input type="hidden" value="<?php echo $pkp; ?>" name="uploaded_pkp">
				    <?php } ?>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">IUPOP <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="iupop" id="id-input-file-6" accept=".pdf" data-bv-notempty ="true">
                                <div class="note">
				    <?php if ($iupop) { ?>
    				    <strong class="txt-color-greenDark">uploaded:</strong>
    				    <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $iupop; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><?php echo $iupop; ?></a>    
    				    <input type="hidden" value="<?php echo $iupop; ?>" name="uploaded_iupop">
				    <?php } ?>
                                </div> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">IUKOP <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="iukop" id="id-input-file-7" accept=".pdf" data-bv-notempty ="true">
                                <div class="note">
				    <?php if ($iukop) { ?>
    				    <strong class="txt-color-greenDark">uploaded:</strong>
    				    <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $iukop; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><?php echo $iukop; ?></a>    
    				    <input type="hidden" value="<?php echo $iukop; ?>" name="uploaded_iukop">
				    <?php } ?>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">PKP2B<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="pkp2b" id="id-input-file-8" accept=".pdf" data-bv-notempty ="true">
                                <div class="note">
				    <?php if ($pkp2b) { ?>
    				    <strong class="txt-color-greenDark">uploaded:</strong>
    				       <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $pkp2b; ?>', 'mywindow', 800, 600, 'yes', 'yes');
    					       return false;"><?php echo $pkp2b; ?></a>    
    				    <input type="hidden" value="<?php echo $pkp2b; ?>" name="uploaded_pkp2b">
				    <?php } ?>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">IUPOPKPM <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="iupopkpm" id="id-input-file-9" accept=".pdf" data-bv-notempty ="true">
                                <div class="note">
				    <?php if ($iupopkpm) { ?>
    				    <strong class="txt-color-greenDark">uploaded:</strong>
    				       <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $iupopkpm; ?>', 'mywindow', 800, 600, 'yes', 'yes');
    					       return false;"><?php echo $iupopkpm; ?></a>    
    				    <input type="hidden" value="<?php echo $iupopkpm; ?>" name="uploaded_iupopkpm">
				    <?php } ?>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">Exporter Terdaftar <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" name="et" id="id-input-file-10" accept=".pdf" data-bv-notempty ="true">
                                <div class="note">
				    <?php if ($et) { ?>
    				    <strong class="txt-color-greenDark">uploaded:</strong>
    				       <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $et; ?>', 'mywindow', 800, 600, 'yes', 'yes');
    					       return false;"><?php echo $et; ?></a>    
    				    <input type="hidden" value="<?php echo $et; ?>" name="uploaded_et">
				    <?php } ?>
                                </div> 
                            </div>
                        </div>

                        
                        <legend>Document Information</legend>
                        
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">No ET <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="no_reg_exporter" <?php echo $no_reg_exporter? "value='$no_reg_exporter'":'';?> data-bv-notempty ="true" placeholder="No ET-Batubara Terdaftar">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">Date Registered <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control datepicker" name="date_reg_exporter" data-dateformat = "yy-mm-dd" data-bv-notempty ="true" <?php echo $date_reg_exporter!='0000-00-00'? "value='$date_reg_exporter'":'';?> placeholder="Tanggal Terdaftar">
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">No PVEB <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="no_pveb" data-bv-notempty ="true" placeholder="No PVEB" <?php echo $no_pveb? "value='$no_pveb'":'';?>>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeID" class="col-md-3 control-label">Date PVEB <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control datepicker" name="date_pveb" data-bv-notempty ="true" data-dateformat = "yy-mm-dd" placeholder="Tanggal PVEB" <?php echo $date_pveb!='0000-00-00'? "value='$date_pveb'":'';?>>
                                
                            </div>
                        </div>

                    </div>


                    <i><span class="text-danger">*</span>) Required</i>
                </fieldset>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
			    <?php
			    echo anchor('client', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
			    echo nbs(1);
			    echo form_hidden('id', $id);
			    ?>
                            <button type="submit" name="btn_upload" value="Upload" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Upload</button>&nbsp;

                        </div>
                    </div>
                </div>
		<?php echo form_close(); ?>
                <!-- end widget content -->
            </div>
            <!-- end widget div -->

            <!-- end widget -->
        </article>
    </div>

</div>