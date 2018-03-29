<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">

    <!-- NEW WIDGET START -->
    <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Edit Form </h2>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
		    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>


                    <fieldset>
                        <legend>City</legend>
                        <div class="form-group">
                            <label for="ProvinceCode" class="col-md-2 control-label">City Code</label>
                            <label class="control-label">: &nbsp;<?php echo $city_code; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="ProvinceName" class="col-md-2 control-label">City Name <span class="text-danger">*</span></label>
                            <div class="col-md-4">
				<?php
				$input = array('name' => 'city_name', 'maxlength' => 128, 'id' => 'CityName', 'class' => 'form-control', 'value' => $city_name, 'data-bv-notempty' => 'true');
				echo form_input($input);
				?>
                            </div>
                        </div>
			<div class="form-group">
                            <label for="CityType" class="col-md-2 control-label">City Type <span class="text-danger">*</span></label>
                            <div class="col-md-4">
				<?php
				echo form_dropdown('type', $option_city_type, $city_type, 'id="CityType" class="form-control" data-bv-notempty="true"');
				?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="CountryName" class="col-md-2 control-label">Province <span class="text-danger">*</span></label>
                            <div class="col-md-4">
				<?php
				echo form_dropdown('province', $option_province, $province, 'id="ProvinceName" class="form-control" data-bv-notempty="true"');
				?>
                            </div>
                        </div>
			<div class="form-group">
			    <label for="PostalCode" class="col-md-2 control-label">Postal Code<span class="text-danger">*</span></label>
			    <div class="col-md-2">
				<?php
				$input = array('name' => 'postal_code','value'=>'$postal_code', 'maxlength' => 64, 'id' => 'PostalCode', 'class' => 'form-control input-mask-kdpos' , 'data-bv-notempty' => 'true');
				echo form_input($input);
				?>
			    </div>
			</div>
                        <i><span class="text-danger">*</span>) Required</i>
                    </fieldset>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
				<?php
				echo anchor('city', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
				echo nbs(1);
				echo form_hidden('id', $id);
				?>
                                <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button>&nbsp;
                                <button class="btn btn-small btn-danger" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-trash"></i>&nbsp;Delete</a>
                                </button>
                            <!--<a href="#" id="cdelete" class="btn btn-small btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>-->
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
</div>

<?php echo form_open($url_del, array('name' => 'del', 'id' => 'del')); ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-times"></i>&nbsp;Delete</a></h4>
	    </div>
	    <div class="modal-body">
		<p>
		    Are you sure to delete this data..!!!
		</p>
	    </div>

	    <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">
		    Cancel
		</button>
		<button type="submit" name="btn_submit_delete" class="btn btn-danger" value="delete">
		    Delete
		</button>
	    </div>
	</div>
    </div>
</div>
<input type="hidden" name="id" id="delid" value="<?php echo $city_code; ?>">
<?php echo form_close(); ?>