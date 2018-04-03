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
		    <h5><i class="fa fa-pencil"></i> Form <small> insert</small></h5>
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
		    <?php
		    echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form',
			'data-bv-message' => 'This value is not valid',
			'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok',
			'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove',
			'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh'
		    ));
		    ?>
		    <fieldset>
  <div class="form-group">
                    <label for="TypeName" class="col-md-2 control-label">Nama Dokter</label>
                    <div class="col-md-4">
                        <?php
                        $input = array('name' => 'nama', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'alamat', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Telp</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'telp', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                        
                        <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Poli</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'kontak', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                        <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Margin Tindakan</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'margin_tindakan', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                        
                        <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Margin Lab / Rontgen</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'margin_lab_rontgen', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                        
                        <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Margin Obat</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'margin_obat', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                
                
		    </fieldset>
		    <div class="hr-line-dashed"></div>

		    <div class="form-group">
			<div class="pull-right">
			    <div class="col-md-12">
				 <?php
                        echo anchor('asuransi', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                        ?>
                        <button class="btn btn-primary" name="btn_submit"  value="Save"  type="submit">
                            <i class="fa fa-save"></i>
                            Submit
                        </button>
			    </div>
			</div>
		    </div>


		    <?php echo form_close(); ?>
		    
		</div>
	    </div>
	</div>
    </div>
</div>