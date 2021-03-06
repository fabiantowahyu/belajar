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
                    <label for="TypeName" class="col-md-2 control-label">Nama Pasien</label>
                    <div class="col-md-4">
                        <?php
                        $input = array('name' => 'nama_pasien','value'=>$nama_pasien, 'placeholder' => 'Nama Pasien', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                    
                    <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">No.Rm</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'no_rm','value'=>$no_rm ,'placeholder' => 'No.Rm', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">No Member</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'id_pasien','value'=>$id_pasien, 'placeholder' => 'No Member', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Nama Asuransi</label>
                            <div class="col-md-4">
                                <?php
                                echo form_dropdown('asuransi', $option_asuransi, $asuransi, 'id ="client_id" class="form-control" data-bv-notempty="true" style="width:100%"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">No Asuransi</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'no_asuransi','value'=>$no_asuransi, 'placeholder' => 'placeholder', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                    
                <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'alamat','value'=>$alamat, 'placeholder' => 'Alamat', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                    <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Kota</label>
                            <div class="col-md-4">
                                <?php
                                echo form_dropdown('kota', $option_kota, $kota, 'id ="client_id" class="form-control" data-bv-notempty="true" style="width:100%"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Jenis Kelamin</label>
                            <div class="col-md-4">
                               <?php
                                echo form_dropdown('jenis_kelamin', $option_jenis_kelamin, $jenis_kelamin, 'id ="client_id" class="form-control" data-bv-notempty="true" style="width:100%"');
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Pekerjaan</label>
                            <div class="col-md-4">
                                <?php
                                echo form_dropdown('pekerjaan', $option_jenis_pekerjaan, $pekerjaan, 'id ="client_id" class="form-control" data-bv-notempty="true" style="width:100%"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Status Perkawinan</label>
                            <div class="col-md-4">
                                <?php
                                echo form_dropdown('status_perkawinan', $option_status_perkawinan, $status_perkawinan, 'id ="client_id" class="form-control" data-bv-notempty="true" style="width:100%"');
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Tempat Lahir</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'tempat_lahir','value'=>$tempat_lahir, 'placeholder' => 'Tempat Lahir', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Tanggal Lahir</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'tanggal_lahir','value'=>$tanggal_lahir, 'placeholder' => 'Tanggal Lahir', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Umur</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'umur','value'=>$umur, 'placeholder' => 'Umur', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Telp</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'telp','value'=>$telp, 'placeholder' => 'Telp', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                    <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'email','value'=>$email, 'placeholder' => 'Email', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Foto</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'foto','value'=>$foto, 'placeholder' => 'Foto', 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                        
                        
		    <div class="hr-line-dashed"></div>

		    <div class="form-group">
                        <div class="pull-right">
                            <div class="col-md-12">
				<?php
                                echo anchor('pasien', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                                echo nbs(1);
                                echo form_hidden('pasien', $pasien);
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
<input type="hidden" name="id" id="delid" value="<?php echo $id_pasien; ?>">
<?php echo form_close(); ?>  