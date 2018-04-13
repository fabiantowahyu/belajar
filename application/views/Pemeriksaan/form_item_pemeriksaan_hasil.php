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
                            <label for="TypeName" class="col-md-2 control-label">Tanggal Kunjungan </label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'tgl_kunjungan', 'value' => $tgl_kunjungan, 'id' => 'TypeName', 'class' => 'form-control', 'readonly' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TypeName" class="col-md-2 control-label">No Urut </label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'no_urut', 'placeholder' => 'No Urut', 'value' => $no_urut, 'id' => 'TypeName', 'class' => 'form-control', 'readonly' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Nama Pasien</label>
                            <div class="col-md-4">
                                <?php
                                                    echo form_dropdown('pasien', $option_pasien, $pasien, 'id ="client_id" class="form-control" data-bv-notempty="true" style="width:100%"');
                                  ?>
                            </div>
                        </div>
                        <div class="form-group">
                                                <label for="" class="col-md-2 control-label" >Dokter<span class="text-danger">*</span></label>
                                                <div class="col-md-4">
                                                    <?php
                                                    echo form_dropdown('dokter', $option_dokter, $dokter, 'id ="client_id" class="form-control" data-bv-notempty="true" style="width:100%"');
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
              
                    </fieldset>
                    
                    <div class="col-md-12">
                        <input type="hidden" id="last_num">
				<h4 class="header blue bolder smaller">Hasil Pemeriksaan</h4>
			<?php    foreach ($result_tindakan as $value) {?>


                                    
                                <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Nama Tindakan</label>
                            <div class="col-md-4">
                                <label class="form-control-static">nama tindakan</label>
                            </div>
                        </div>
                                
                                
                                <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Nilai</label>
                            <div class="col-md-4">
<?php
                                $input = array('name' => 'nilai', 'value' => $tgl_kunjungan, 'id' => 'TypeName', 'class' => 'form-control', 'readonly' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                                <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Saran</label>
                            <div class="col-md-4">
                               <?php
                                $input = array('name' => 'saran', 'value' => $tgl_kunjungan, 'id' => 'TypeName', 'class' => 'form-control', 'readonly' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                                
                                <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Analisis</label>
                            <div class="col-md-4">
                               <?php
                                $input = array('name' => 'saran', 'value' => $tgl_kunjungan, 'id' => 'TypeName', 'class' => 'form-control', 'readonly' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="pull-right">
                            <div class="col-md-12">
                                <?php
                                echo anchor('pasien', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
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
