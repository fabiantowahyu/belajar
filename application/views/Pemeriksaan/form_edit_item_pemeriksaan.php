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
                    
                    <div class="span11">
                        <input type="hidden" id="last_num">
				<h4 class="header blue bolder smaller">Items</h4>
				<span class="btn btn-primary btn-xs" id="btnAddRow"> <i class="icon-plus"></i> Add items</span>
				<br><br>
				
                                   <table border="1" width="100%" <?php // echo  $last_status != 0 ? 'cellpadding="5"' : '' ?> class="table table-striped table-bordered table-hover">
                                <thead class="info">
                                    <tr>
                                        <th width="20%" class="center">Item</th>
                                        <th width="20%" class="center">Unit Prices</th>
                                        <th width="10%" class="center">Discount (%)</th>
                                        <th width="20%" class="center">Total</th>
                                        <?php //if ($last_status == 0 OR $last_status == 5) { ?>
                                            <th width="5%"></th>
                                        <?php // } ?>
                                    </tr>
                                </thead>
                                <!-- <td><?= $no ?></td> -->
                                <tbody id="itemRow">
                                    <?php
                                    $totaldiskon = 0;
                                    $grandtotal_diskon = 0;
                                    $totalunitprice =0;
                                    foreach ($result_tindakan as $key => $b) {
                                        $no = $key + 1;
                                        $harga = number_format($b->harga, 2, '.', ',');
                                        $diskon = number_format($b->diskon, 2, '.', ',');
                                        $total = number_format($b->total, 2, '.', ',');
                                        $total_diskon = ($b->harga * $b->diskon) / 100;
                                        $totalunitprice = $totalunitprice + $b->harga;
                                        $grandtotal_diskon = $grandtotal_diskon + $total_diskon;
                                        ?>
                                        <tr>
                                            <td align="center">
                                                <select name="barang[<?= $key ?>][item]" onChange="cekUom(this,<?= $key ?>)" >
                                                <?php foreach ($list_tindakan as $i) { ?>
                <option value="<?= $i->id_tindakan_lab ?>" <?= $b->kode_tindakan_lab == $i->id_tindakan_lab ? 'selected' : '' ?>><?= $i->id_tindakan_lab ?></option>
                                                            <?php } ?>
                                                </select>
                                                <input type="hidden" name="barang[<?= $key ?>][id_item]" value="<?= $b->id ?>">
                                            </td>
                                            <td align="center"><input type="text" class="form-control align-right" name="barang[<?= $key ?>][harga]" id="harga_<?= $key ?>" value="<?= $harga ?>" onchange="setNumber(<?= $key ?>)">
                                            </td>
                                            <td align="center"><input type="text" class="form-control" name="barang[<?= $key ?>][diskon]" id="diskon_<?= $key ?>" value="<?= $diskon ?>" onchange="setNumber(<?= $key ?>)">
                                            </td>
                                            <td align="center">
                                                <input type="hidden" class="form-control" name="barang[<?= $key ?>][total]" id="total_<?= $key ?>" onclick="sumTotal(<?= $key ?>)" value="<?= $total ?>">
                                                <input type="text" class="form-control align-right" id="total_temp_<?= $key ?>" onclick="sumTotal(<?= $key ?>)" value="<?= $total ?>" disabled>
                                            </td>
                                            <?php //if ($last_status == 0 OR $last_status == 5) { ?>
                                                <td align="center">
                                                    <a href="../../purchase_order/CTRL_Delete_item/<?php echo $b->id; ?>" class="btn btn-mini btn-danger"onclick="if (!confirm('Delete Data?'))
                                                                                    {
                                                                                        return false;
                                }
                                ;"><i class="icon-trash"></i></a>
                                                </td>
                                            <?php// } ?>
                                        </tr>
                                        <?php
                                    } $last_num = $key + 1;
                                    ?>
                                <input style="width:0px;height: 0px; display: none;" disabled type="text" id="last_num" value="<?php echo $last_num ?>"/>


                                </tbody>
                            </table>

                                
				<div class="hr hr8 hr-double hr-dotted"></div>
                                <div class="row-fluid">
					<div class="col-md-5 pull-right">
						<h4 class="pull-right">
							Total : <input type="text" class="input align-right" id="grandtotal" placeholder="Total" disabled/>
						</h4>
					</div>
				</div>
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
