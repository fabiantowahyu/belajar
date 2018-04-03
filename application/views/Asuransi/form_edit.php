<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title; ?>

	</h2>
	<div class="col-lg-12">
	    <?php
	    if (!empty($breadcrum))
		echo $breadcrum;
	    ?>

	</div>


    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
	<div class="col-lg-12">
	    <div class="ibox float-e-margins">
		<div class="ibox-title">
		    <h5><i class="fa fa-pencil text-warning"></i> Form <small> update</small></h5>
		    <div class="ibox-tools">
			<a class="collapse-link">
			    <i class="fa fa-chevron-up"></i>
			</a>
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			    <i class="fa fa-wrench"></i>
			</a>
			<ul class="dropdown-menu dropdown-user">
			    <li><a href="#">Config option 1</a>
			    </li>
			    <li><a href="#">Config option 2</a>
			    </li>
			</ul>
			<a class="close-link">
			    <i class="fa fa-times"></i>
			</a>
		    </div>
		</div>
		<div class="ibox-content">
		    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>

		    <div class="form-group">
                    <label for="TypeName" class="col-md-2 control-label">Nama Dokter</label>
                    <div class="col-md-4">
                        <?php
                        $input = array('name' => 'nama','value'=>$nama, 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'alamat','value'=>$alamat, 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Kontak</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'kontak','value'=>$kontak, 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                        
                        <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Margin Tindakan</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'margin_tindakan','value'=>$margin_tindakan, 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                        
                        
                         <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Margin Lab / Rontgen</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'margin_lab_rontgen','value'=>$margin_lab_rontgen, 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                        
                        <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Margin Obat</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'margin_obat','value'=>$margin_obat, 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
		    <div class="hr-line-dashed"></div>

		    <div class="form-group">
                        <div class="pull-right">
                            <div class="col-md-12">
				 <?php
                                echo anchor('asuransi', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                                echo nbs(1);
                                echo form_hidden('id_asuransi', $id_asuransi);
                                ?>
                                <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button> &nbsp;
                                <a href="#" id="cdelete" data-toggle="modal" data-target="#myModal" class="btn btn-small btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                            </div>
                        </div>
                    </div>

		    <?php echo form_close(); ?>
		    </form>
		</div>
	    </div>
	</div>
    </div>
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
		<button type="submit" name="btn_submit_delete" class="btn btn-danger">
		    Delete
		</button>
	    </div>
	</div>
    </div>
</div>
<input type="hidden" name="id" id="delid" value="<?php echo $id_asuransi; ?>">
<?php echo form_close(); ?>
