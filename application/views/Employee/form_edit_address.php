<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <div class="span12 offset panel-box2">
        <?php echo form_open_multipart($url, array('class' => 'form-horizontal', 'id' => 'validation-form-address')); ?>
        <div class="space-10"></div><br/>
        <legend>Current Address</legend>
        <div class="row-fluid">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Address" class="col-md-3 control-label">Address <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <?php
                        $txtarea = array('name' => 'address', 'rows' => 4, 'class' => 'form-control', 'id' => 'Address', 'value' => $address1, 'data-bv-notempty' => 'true');
                        echo form_textarea($txtarea);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="CountryName" class="col-md-3 control-label">Country <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <?php
                        echo form_dropdown('country', $option_country, $country, 'id="CountryName" class="form-control" data-bv-notempty="true"');
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ProvinceName" class="col-md-3 control-label">Province <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <?php
                        echo form_dropdown('province', $option_province, $province, 'id="ProvinceName" class="form-control" data-bv-notempty="true"');
                        ?>
                    </div>
                </div>

            </div>
          
            <div class="col-md-6">
                <div class="form-group">
                    <label for="RTRW" class="col-md-3 control-label">RT/RW</label>
                    <div class="col-md-6">
                        <?php
                        $input = array('name' => 'rt', 'maxlength' => 8, 'id' => 'RTRW', 'class' => 'form-control', 'value' => $rt1);
                        echo form_input($input);
                        ?>
                        &nbsp;/&nbsp;
                        <?php
                        $input = array('name' => 'rw', 'maxlength' => 8, 'id' => 'RTRW', 'class' => 'form-control', 'value' => $rw1);
                        echo form_input($input);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="postalcode" class="col-md-3 control-label">Postal Code</label>
                    <div class="col-md-6">
                        <?php
                        $input = array('name' => 'postalcode', 'maxlength' => 8, 'id' => 'postalcode', 'class' => 'form-control', 'value' => $postal_code1 );
                        echo form_input($input);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Phone" class="col-md-3 control-label">Phone</label>
                    <div class="col-md-6">
                        <?php
                        $input = array('name' => 'phone', 'maxlength' => 8, 'id' => 'Phone', 'class' => 'form-control', 'value' => $phone1);
                        echo form_input($input);
                        ?>
                    </div>
                </div>
            </div> 
        </div>
 <div class="clearfix"></div>
 <div class="space-10"></div><br/>
        <legend>Card Address</legend>
        <div class="row-fluid">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Address2" class="col-md-3 control-label">Address <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <?php
                        $txtarea = array('name' => 'address2', 'rows' => 4, 'class' => 'form-control', 'id' => 'Address2', 'value' => $address2, 'data-bv-notempty' => 'true');
                        echo form_textarea($txtarea);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="CountryName2" class="col-md-3 control-label">Country <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <?php
                        echo form_dropdown('country2', $option_country2, $country2, 'id="CountryName2" class="form-control" data-bv-notempty="true"');
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ProvinceName2" class="col-md-3 control-label">Province <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <?php
                        echo form_dropdown('province2', $option_province2, $province2, 'id="ProvinceName2" class="form-control" data-bv-notempty="true"');
                        ?>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="RTRW2" class="col-md-3 control-label">RT/RW</label>
                    <div class="col-md-6">
                        <?php
                        $input = array('name' => 'rt2', 'maxlength' => 8, 'id' => 'RTRW2', 'class' => 'form-control', 'value' => $rt2);
                        echo form_input($input);
                        ?>
                        &nbsp;/&nbsp;
                        <?php
                        $input = array('name' => 'rw2', 'maxlength' => 8, 'id' => 'RTRW2', 'class' => 'form-control', 'value' => $rw2);
                        echo form_input($input);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="postalcode2" class="col-md-3 control-label">Postal Code</label>
                    <div class="col-md-6">
                        <?php
                        $input = array('name' => 'postalcode2', 'maxlength' => 12, 'id' => 'postalcode2', 'class' => 'form-control', 'value' => $postal_code2);
                        echo form_input($input);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Phone2" class="col-md-3 control-label">Phone</label>
                    <div class="col-md-6">
                        <?php
                        $input = array('name' => 'phone2', 'maxlength' => 12, 'id' => 'Phone2', 'class' => 'form-control', 'value' => $phone2);
                        echo form_input($input);
                        ?>
                    </div>
                </div>
            </div> 
        </div>
        <div class="clearfix"></div>
        <div class="space-10"></div><br/>
        <legend>Mobile Phone</legend>
        <div class="row-fluid">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="MobilePhone1" class="col-md-3 control-label">Mobile Phone 1</label>
                    <div class="col-md-6">
                        <?php
                        $input = array('name' => 'mobilephone1', 'maxlength' => 12, 'id' => 'MobilePhone1', 'class' => 'form-control', 'value' => $mobile_phone1);
                        echo form_input($input);
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="MobilePhone2" class="col-md-3 control-label">Mobile Phone 2</label>
                    <div class="col-md-6">
                        <?php
                        $input = array('name' => 'mobilephone2', 'maxlength' => 12, 'id' => 'MobilePhone2', 'class' => 'form-control', 'value' => $mobile_phone2);
                        echo form_input($input);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="hr"></div>
        <div class="form-actions">
            <?php
            echo anchor('employee/', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
            echo form_hidden('emp_id', $id);
            echo nbs(1);
            ?>
            <button type="submit" name="submit_address" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Save</button> &nbsp;
            <button type="reset" name="reset" value="reset" class="btn btn-small btn-danger"><i class="icon-save"></i> Reset</button> &nbsp;
            
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<?php echo form_close(); ?>
