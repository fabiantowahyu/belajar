<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">

    <!-- NEW WIDGET START -->
    <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Form Add </h2>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                   
                    <fieldset>
                        <legend>Commodity Category</legend>
                        <div class="form-group">
                            <label for="CountryCode" class="col-md-2 control-label">Commodity Name <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
                                    $input = array('name'=>'commodity_name','maxlength'=>16,'id'=>'CommodityName','class'=>'form-control','data-bv-notempty'=>'true');
                                    echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="CountryName" class="col-md-2 control-label">SNI <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name'=>'sni','maxlength'=>128,'id'=>'SNI','class'=>'form-control','data-bv-notempty'=>'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="CountryName" class="col-md-2 control-label">Schema <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <?php
                                    echo form_dropdown('schema[]', $option_schema, $schema, 'id="schema" class="chzn-select form-control" multiple="multiple"');
                                ?>
                            </div>
                        </div>
                        <i><span class="text-danger">*</span>) Required</i>
                    </fieldset>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 
                                echo anchor('commodity', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class'=>'btn btn-small btn-info'));
                                ?>
                                <button class="btn btn-primary" type="submit" name="btn_submit" value="save">
                                    <i class="fa fa-save"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>

                    <?php echo form_close(); ?>
                </div>
                <!-- end widget content -->
            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->
    </article>
    <div class="clearfix"></div>
</div>
