<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <ul class="nav nav-tabs padding-16" id="myTab">
                    <li class="active" id="tab-basic">
                        <a data-toggle="tab" href="#FormAB">
                            <i class="blue fa fa-pencil bigger-125"></i>
                            Form Add Survey Result
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
                                        <div class="col-md-12"><legend><strong>Survey Result 2</strong></legend></div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >No LSE<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <label class="control-label"><strong><?= $no_lse; ?></strong></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Royalty DP.</label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'royalty_dp', 'placeholder' => "Royalti Dimuka", 'class' => 'form-control','id' => 'royalty', 'onkeypress'=>'return isNumberKey(event)');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >NPWP No<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    echo form_dropdown('client_id', $option_exporter, $exporter, 'id ="client_id" class="chzn-select form-control" data-bv-notempty="true" style="width:100%", onchange="getdetailExporter(this.value);"');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Origin Goods<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $input = array('name' => 'exporter_name', 'id' => 'exporter_name', 'placeholder' => "Nama Perusahaan Asal Barang", 'class' => 'form-control', 'readonly' => 'true');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-md-4 control-label" >Address<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <?php
                                                    $txtarea = array('name' => 'exporter_address', 'id' => 'exporter_address', 'placeholder' => "Alamat Eksportir", 'rows' => 4, 'class' => 'form-control',  'readonly' => 'true');
                                                    echo form_textarea($txtarea);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <br/><br/><br/>
                                        <div class="col-md-12"><i><strong><span class="text-danger">*</span>) Required</strong></i></div>
                                    </div>
                                </div>
                            </fieldset> 
                            </br></br></br>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                         <button type="button" name="close" value="close" class="btn btn-small btn-primary" onclick="self.close();"><i class="fa fa-remove"></i> Close</button>
                                    
                                        <?php
                                        //echo anchor('lse/CTRL_Edit/' . $no_lse . '/#FormC', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                                        echo nbs(1);
                                        echo form_hidden('id', $no_lse);
                                        ?>
                                        <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button>
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