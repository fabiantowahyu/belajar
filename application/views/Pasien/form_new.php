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
                            <label for="TypeName" class="col-md-2 control-label">Tanggal Daftar </label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'recdate', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Nama Pasien</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'nama', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">No.Rm</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'no_rm', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">No Member</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'id_pasien', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Nama Asuransi</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'asuransi', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">No Asuransi</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'no_asuransi', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Alamat Rumah</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'alamat', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Kota</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'kota', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Jenis Kelamin</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'jenis_kelamin', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Pekerjaan</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'pekerjaan', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Status Perkawinan</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'status_perkawinan', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Tempat Tanggal Lahir</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'tempat_lahir', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Tanggal Lahir</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'tanggal_lahir', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Umur</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'umur', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">No Telp</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'telp', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Email</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'email', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                echo form_input($input);
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="TableName" class="col-md-2 control-label">Foto</label>
                            <div class="col-md-4">
                                <?php
                                $input = array('name' => 'foto', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
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
