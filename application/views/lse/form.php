<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <ul class="nav nav-tabs padding-16" id="myTab">
                    <li class="active" id="tab-basic">
                        <a data-toggle="tab" href="#FormAB">
                            <i class="blue fa fa-pencil bigger-125"></i>
                            Form Add LSE
                        </a>
                    </li>
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
                                        <legend><strong>ISSUING OFFICE INFORMATION</strong></legend>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">LSE No</label>
                                                <div class="col-md-6">
                                                    <label class="control-label"><strong><?= $no_lse; ?></strong></label>
                                                    <?php
                                                    echo form_hidden('no_lse', $no_lse);
                                                    echo form_hidden('id', $id);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label">Date of Issued <span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <?php
                                                        $input = array('name' => 'date_issued', 'placeholder' => "Tanggal Dikeluarkan", 'id' => 'date_issued', 'class' => 'form-control datepicker datecustom', 'data-dateformat' => 'yy-mm-dd', 'data-bv-notempty' => 'true');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="IssueOffice" class="col-md-4 control-label" >Issuing Office<span class="text-danger">*</span></label>
                                                <div class="col-md-6" style="padding-top: 5px">
                                                    <?php
                                                    echo form_dropdown('branch_id', $option_branch, $branch, 'id ="branch_id" class="form-control" data-bv-notempty="true" style="width:100%"');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Date of Expires<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'date_expired', 'placeholder' => "Tanggal Kadaluarsa", 'id' => 'date_expired', 'class' => 'form-control datepicker datecustom', 'data-dateformat' => 'yy-mm-dd', 'data-bv-notempty' => 'true');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12"></br><legend><strong>EXPORTER'S STATEMENT INFORMATION</strong></legend></div>

                                        
<div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >No NPWP<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    echo form_dropdown('client_id', $option_exporter, $exporter, 'id ="client_id" class="form-control" data-bv-notempty="true" style="width:100%", onchange="getdetailExporter(this.value);"');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Date ET-Coal Registered<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'date_reg_exporter', 'placeholder' => "Tanggal Terdaftar", 'id' => 'date_reg_exporter', 'class' => 'form-control datepicker datecustom', 'data-dateformat' => 'yy-mm-dd', 'data-bv-notempty' => 'true');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >No ET-COAL Registered<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'no_reg_exporter', 'class' => 'form-control', 'id' => 'no_reg_exporter', 'data-bv-notempty' => 'true', 'placeholder' => 'No ET-Batubara Terdaftar');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >No WO<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'no_wo', 'placeholder' => "Nomor WO (PVEB)", 'id' => 'no_wo', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
<div class="clearfix"></div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Exporter Name</label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'exporter_name', 'id' => 'exporter_name', 'placeholder' => "Nama Eksportir", 'class' => 'form-control', 'readonly' => 'true');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Date WO<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'date_wo', 'placeholder' => "Tanggal WO (PVEB)", 'id' => 'date_wo', 'data-bv-notempty' => 'true', 'class' => 'form-control datepicker datecustom', 'data-dateformat' => 'yy-mm-dd', 'data-bv-notempty' => 'true');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Exporter Address</label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $txtarea = array('name' => 'exporter_address', 'id' => 'exporter_address', 'placeholder' => "Alamat Eksportir", 'rows' => 4, 'class' => 'form-control', 'readonly' => 'true');
                                                    echo form_textarea($txtarea);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Survey Location<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $txtarea = array('name' => 'survey_location', 'placeholder' => "Lokasi Pemeriksaan", 'rows' => 4, 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                                    echo form_textarea($txtarea);
                                                    ?>
                                                </div>  
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >No Packing List<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'no_packing_list', 'placeholder' => "List Nomor Packing", 'id' => 'no_packing_list', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Date Survey Location<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'survey_location_date', 'placeholder' => "Tanggal Lokasi Pemeriksaan", 'data-bv-notempty' => 'true', 'class' => 'form-control datepicker datecustom', 'data-dateformat' => 'yy-mm-dd');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Date Packing List<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'date_packing_list', 'placeholder' => "Tanggal List Packing", 'id' => 'date_packing_list', 'class' => 'form-control datepicker datecustom', 'data-dateformat' => 'yy-mm-dd', 'data-bv-notempty' => 'true');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >No Invoice Packing List<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'no_invoice_packing_list', 'placeholder' => "Nomor Invoice List Packing", 'id' => 'no_invoice_packing_list', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label">Importer Name<span class="text-danger">*</span></label>
                                                <div class="col-md-5" >
                                                    <?php
                                                    echo form_dropdown('importer_id', $option_importer, $importer, 'id ="importer_id" class="form-control" data-bv-notempty="true" style="width:100%", onchange="getdetailImporter(this.value);"');
                                                    ?>
                                                    
                                                </div>
                                           
                                            <div class="col-md-2">
                                        <button type="button" class="btn btn-primary btn-xs" id="buttonmodal" >
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <button type="button"  class="btn btn-success btn-xs" id="buttonmodal_2">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                            </div>
                                                 </div>
                                    </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Date Invoice Packing List<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'date_invoice_packing_list', 'placeholder' => "Tanggal Invoice List Packing", 'class' => 'form-control datepicker datecustom', 'data-dateformat' => 'yy-mm-dd', 'data-bv-notempty' => 'true');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Importer Address</label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $txtarea = array('name' => 'importer_address', 'id' => 'importer_address', 'rows' => 4, 'class' => 'form-control', 'true', 'placeholder' => "Alamat Importir", 'readonly' => 'true');
                                                    echo form_textarea($txtarea);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Loading Port<span class="text-danger">*</span></label>
                                                <div class="col-md-6" style="padding-top: 5px">
                                                    <?php
                                                    echo form_dropdown('loading_port_id', $option_port, $port, 'id ="LoadingPort" class="form-control" data-bv-notempty="true" style="width:100%"');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label">Country<span class="text-danger">*</span></label>
                                                <div class="col-md-6" style="">
                                                    <?php
                                                    echo form_dropdown('country_id', $option_country, $country, 'id ="CompanyID" class="form-control" data-bv-notempty="true" style="width:100%"');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label">Port Destination<span class="text-danger">*</span></label>
                                                <div class="col-md-6" style="">
                                                    <?php
                                                    $input = array('name' => 'port_destination', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'placeholder' => "Pelabuhan Tertuju");
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Vessel Name<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'vessel_name', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'placeholder' => "Nama Kapal");
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Loading Vessel Start Date<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'stdate_load_vessel', 'placeholder' => "Tanggal Mulai Muat Vessel", 'class' => 'form-control datepicker datecustom', 'data-dateformat' => 'yy-mm-dd', 'data-bv-notempty' => 'true');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >No Mining License<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'no_mining_license', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'placeholder' => "No IUPOP / PKP2B / IUPKOP / IPR ");
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Loading Vessel End Date<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'enddate_load_vessel', 'placeholder' => "Tanggal Selesai Pemuatan Vessel", 'class' => 'form-control datepicker datecustom', 'data-dateformat' => 'yy-mm-dd', 'data-bv-notempty' => 'true');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Date Mining License<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'date_mining_license', 'placeholder' => "Tanggal Lisensi Pertambangan", 'class' => 'form-control datepicker datecustom', 'data-dateformat' => 'yy-mm-dd', 'data-bv-notempty' => 'true');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >No Transporting & Selling License</label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'no_transsell_license', 'class' => 'form-control', 'placeholder' => "Nomor IUPOPK Pengangkutan & Penjualan");
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >No Smelter License</label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'no_smelter_license', 'class' => 'form-control', 'placeholder' => "No IUPOPK Pengolahan & Pemurnian/IUI");
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Date Transporting & Selling License</label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'date_transsell_license', 'placeholder' => "Tanggal IUPOPK Pengangkutan & Penjualan ", 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >No Royalty Payment</label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'no_royalty_payment', 'class' => 'form-control', 'placeholder' => "Nomor Pembayaran Royalti");
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Date Smelter License</label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'date_smelter_license', 'placeholder' => "Tanggal IUPOPK Pengolahan & Pemurnian/IUI ", 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Date Royalty Payment</label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'date_royalty_payment', 'placeholder' => "Tanggal Pembayaran Royalti", 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >L/C Number</label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'no_lc', 'class' => 'form-control', 'placeholder' => "Nomor L/C");
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >L/C Type</label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'lc_type', 'class' => 'form-control', 'placeholder' => "Tipe L/C");
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >L/C Date</label>
                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'date_lc', 'placeholder' => "Tanggal L/C", 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br/><br/><br/>
                                        <div class="col-lg-12"><i><strong><span class="text-danger">*</span>) Required</strong></i></div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        echo anchor('lse', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                                        echo nbs(1);
                                        ?>
                                        <button type="submit" name="btn_submit" id="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- end content -->
                    </div>
                </div></div>
            <!-- end widget-->
        </div>
    </article>
    <div class="clearfix"></div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class = "form-horizontal" id="myModalForm" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Importer</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php
                                    $input = array('name' => 'importer', 'maxlength' => 32, 'id' => 'importer', 'class' => 'form-control', 'data-bv-notempty' => 'true','placeholder'=>'Importer Name');
                                    echo form_input($input);
                                    ?> </div>
                            <div class="form-group">
                             <?php
                                    echo form_dropdown('type', $option_type, $type, 'id="type" class="form-control"');
                                    ?> </div>
                             
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'pic', 'maxlength' => 32, 'id' => 'pic', 'class' => 'form-control','placeholder'=>'PIC');
                                    echo form_input($input);
                                    ?> </div>
                            <div class="form-group">
                                <?php
                                    echo form_dropdown('province', $option_province, $province, 'id="province" class="form-control"');
                                    ?></div>
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'email', 'maxlength' => 64, 'id' => 'email', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'type' => 'email','placeholder'=>'Email');
                                    echo form_input($input);
                                    ?></div>
                            <!-- <div class="form-group">
                                    <textarea class="form-control" placeholder="Content" rows="5" required></textarea>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                             <?php
                                    $input = array('name' => 'npwp', 'maxlength' => 32, 'id' => 'npwp', 'class' => 'form-control','placeholder'=>'NPWP');
                                    echo form_input($input);
                                    ?></div>
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'npwp_address', 'maxlength' => 32, 'id' => 'npwp_address', 'class' => 'form-control','placeholder'=>'NPWP Address');
                                    echo form_input($input);
                                    ?></div>
                             
                          
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'phone', 'maxlength' => 16, 'id' => 'phone', 'class' => 'form-control', 'data-bv-notempty' => 'true','placeholder'=>'Phone');
                                    echo form_input($input);
                                    ?></div>
                            
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'fax', 'maxlength' => 16, 'id' => 'fax', 'class' => 'form-control','placeholder'=>'Fax');
                                    echo form_input($input);
                                    ?></div>
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'postal_code', 'maxlength' => 16, 'id' => 'postal_code', 'class' => 'form-control input-mask-kdpos','placeholder'=>'Postal Code');
                                    echo form_input($input);
                                    ?></div>
                            <!-- <div class="form-group">
                                    <textarea class="form-control" placeholder="Content" rows="5" required></textarea>
                            </div> -->
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                   <div class="row">
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="address" class="form-control" placeholder="Detail address" id="address" rows="5" required></textarea>
                            </div>
                        </div>
                       </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit"  class="btn btn-primary" id="btn_modal_submit">
                        Submit
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" id="myModal_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class = "form-horizontal" id="myModalForm_2" >
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Edit Importer</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php
                                    $input = array('name' => 'importer', 'maxlength' => 32, 'id' => 'importer_e', 'class' => 'form-control', 'data-bv-notempty' => 'true','placeholder'=>'Importer Name', 'readonly'=>'true');
                                    echo form_input($input);
                                    ?> </div>
                            <div class="form-group">
                             <?php
                                    echo form_dropdown('type', $option_type, $type, 'id="type_e" class="form-control"');
                                    ?> </div>
                             
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'pic', 'maxlength' => 32, 'id' => 'pic_e', 'class' => 'form-control','placeholder'=>'PIC');
                                    echo form_input($input);
                                    ?> </div>
                            <div class="form-group">
                                <?php
                                    echo form_dropdown('province', $option_province, $province, 'id="province_e" class="form-control"');
                                    ?></div>
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'email', 'maxlength' => 64, 'id' => 'email_e', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'type' => 'email','placeholder'=>'Email');
                                    echo form_input($input);
                                    ?></div>
                            <!-- <div class="form-group">
                                    <textarea class="form-control" placeholder="Content" rows="5" required></textarea>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                             <?php
                                    $input = array('name' => 'npwp', 'maxlength' => 32, 'id' => 'npwp_e', 'class' => 'form-control','placeholder'=>'NPWP');
                                    echo form_input($input);
                                    ?></div>
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'npwp_address', 'maxlength' => 32, 'id' => 'npwp_address_e', 'class' => 'form-control','placeholder'=>'NPWP Address');
                                    echo form_input($input);
                                    ?></div>
                             
                          
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'phone', 'maxlength' => 16, 'id' => 'phone_e', 'class' => 'form-control', 'data-bv-notempty' => 'true','placeholder'=>'Phone');
                                    echo form_input($input);
                                    ?></div>
                            
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'fax', 'maxlength' => 16, 'id' => 'fax_e', 'class' => 'form-control','placeholder'=>'Fax');
                                    echo form_input($input);
                                    ?></div>
                            <div class="form-group">
                            <?php
                                    $input = array('name' => 'postal_code', 'maxlength' => 16, 'id' => 'postal_code_e', 'class' => 'form-control input-mask-kdpos','placeholder'=>'Postal Code');
                                    echo form_input($input);
                                    ?></div>
                            <!-- <div class="form-group">
                                    <textarea class="form-control" placeholder="Content" rows="5" required></textarea>
                            </div> -->
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                   <div class="row">
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="address" class="form-control" placeholder="Detail address" id="address_e" rows="5" required></textarea>
                            </div>
                        </div>
                       </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit"  class="btn btn-primary" id="btn_modal_submit">
                        Submit
                    </button>
                </div>
            </form>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    
    $('#buttonmodal_2').hide();
    
</script>