<?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form-result'
));
?>
<fieldset>
    <div role="content">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-lg-12"><legend class="text-primary"><strong>SURVEI RESULT</strong></legend></div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="col-md-4 control-label" >Mode of Transport<span class="text-danger">*</span></label>
                        <div class="col-md-6" style="padding-top: 5px">
			    <?php
			    echo form_dropdown('mode_transport', $option_transport, $transport, 'id ="mode_transport" class="form-control" style="width:100%"');
			    ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="col-md-4 control-label" >Cargo Type<span class="text-danger">*</span></label>
                        <div class="col-md-6" style="padding-top: 5px">
			    <?php
			    $input = array('name' => 'cargo_type', 'value' => $cargo_type, 'placeholder' => "Tipe Cargo", 'class' => 'form-control');
			    echo form_input($input);
			    //echo form_dropdown('cargo_type', $option_cargo, $cargo, 'id ="cargo_type" class="form-control" style="width:100%"');
			    ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="col-md-4 control-label" >Container Number and Seal</label>
                        <div class="col-md-6">
			    <?php
			    $input = array('name' => 'container_numseal', 'value' => $container_numseal, 'placeholder' => "No Peti Kemas dan Segel", 'class' => 'form-control');
			    echo form_input($input);
			    ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="" class="col-md-4 control-label" >Note</label>
                        <div class="col-md-6">
			    <?php
			    $txtarea = array('name' => 'note', 'value' => $note, 'placeholder' => "Catatan", 'rows' => 4, 'class' => 'form-control');
			    echo form_textarea($txtarea);
			    ?>
                        </div>
                    </div>
                </div>


		<?php if ($transport || $cargo) {
		    ?>
                    <div class="col-lg-12"><br/>
                        <br/><legend> <h5 class="text-primary">
                                Add New HS

                                <a href="#" class="btn btn-success btn-xs" onclick="PopUpWindow('<?php echo base_url(); ?>lse/CTRL_New_SR1/<?php echo $no_lse; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><i class="fa fa-plus"></i></a>

                            </h5>
    		    </legend>

                        <!-- Result 1 -->


                        <table class="table table-striped table-bordered table-hover">
                            <thead class="danger">
                                <tr>
                                    <th style="text-align: center">HS</th>
                                    <th style="text-align: center">Uraian Barang </br> Description</th>
                                    <th style="text-align: center">Jumlah (TNE) </br> Quantity (TNE)</th>
                                    <th style="text-align: center">FAS (USD)</th>
                                    <th style="text-align: center">No IUP/PKP2B/IPR Asal Barang </br> Mining License of Goods Origin</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
				<?php if ($results2) {
				    foreach ($results2 as $row) { ?>
	    			    <tr>
	    				<td style="text-align: center"><?php echo $row->hs; ?></td>
	    				<td style="text-align: center"><?php echo $row->description; ?></td>
	    				<td style="text-align: right"><?php echo number_format($row->quantity, 3, ",", "."); ?> MT</td>
	    				<td style="text-align: right"><?php echo number_format($row->fas, 2, ",", "."); ?></td>
	    				<td style="text-align: center"><?php echo $row->no_minlic; ?></td>
	    				<td style="text-align: center">
	    				    <a href="#" class="btn btn-primary btn-xs" onclick="PopUpWindow('<?php echo base_url(); ?>lse/CTRL_Edit_SR1/<?php echo $row->id_hs; ?>/<?php echo $row->no_lse; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><i class="fa fa-pencil"></i></a>
	    				</td>
	    			    </tr>
				    <?php
				    }
				} else {
				    ?>
				    <tr>
					<td colspan="6" class="text-center"> No Record Data </td>

				    </tr>

				<?php } ?>
    <?php foreach ($results2a as $row) { ?>
				    <tr>
					<td style="text-align: center" colspan="2"><strong>TOTAL</strong></td>
					<td style="text-align: right"><strong><?php echo number_format($row->total_quantity, 3, ",", "."); ?> MT</strong></td>
					<td style="text-align: right"><strong><?php echo number_format($row->total_fas, 2, ",", "."); ?></strong></td>
					<td style="text-align: center" colspan="2"></td>
				    </tr>
    <?php } ?>
                            </tbody>
                        </table>
                        <!-- End 1 -->
    		    <br/><legend><h5 class="text-primary">
    			    Add New Company
    			    <a href="#" class="btn btn-success btn-xs" onclick="PopUpWindow('<?php echo base_url(); ?>lse/CTRL_New_SR2/<?php echo $no_lse; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><i class="fa fa-plus"></i></a>

    			</h5></legend>
                        <!-- Result 2 -->

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Nama Perusahaan Asal Barang</th>
                                    <th style="text-align: center">NPWP </th>
                                    <th style="text-align: center">Provinsi Asal </br> Barang Province</th>
                                    <th style="text-align: center">Royalti Dimuka </br> Royalty DP</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
    <?php if ($results3) {
	foreach ($results3 as $row) { ?>
	    			    <tr>
	    				<td style="text-align: left"><?php echo $row->client_name; ?></td>
	    				<td style="text-align: center"><?php echo $row->npwp; ?></td>
	    				<td style="text-align: center"><?php echo $row->province_name; ?></td>
	    				<td style="text-align: right"><?php echo number_format($row->royalty_dp, 2, ",", "."); ?></td>
	    				<td style="text-align: center">
	    				    <a href="#" class="btn btn-primary btn-xs" onclick="PopUpWindow('<?php echo base_url(); ?>lse/CTRL_Edit_SR2/<?php echo $row->id_roy; ?>/<?php echo $row->no_lse; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><i class="fa fa-pencil"></i></a>

	    				</td>
	    			    </tr>
				    <?php
				    }
				} else {
				    ?>
				    <tr>
					<td colspan="5" class="text-center"> No Record Data </td>

				    </tr>

    <?php } ?>
    <?php foreach ($results3a as $row) { ?>
				    <tr>
					<td style="text-align: center" colspan="3"><strong>TOTAL</strong></td>
					<td style="text-align: right"><strong><?php echo number_format($row->total_royalty_dp, 2, ",", "."); ?></strong></td>
					<td style="text-align: center"></td>
				    </tr>
    <?php } ?>
                            </tbody>
                        </table>
                        <!-- End 2 -->
    		    <br/><legend> <h5 class="text-primary">
    			    Add New Cal
    			    <a href="#" class="btn btn-success btn-xs" onclick="PopUpWindow('<?php echo base_url(); ?>lse/CTRL_New_SR3/<?php echo $no_lse; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><i class="fa fa-plus"></i></a>
    			</h5></legend>
                        <!-- Result 3 -->

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Cal.(KKal/Kg-arb)</th>
                                    <th style="text-align: center">Cal.(KKal/Kg-adb)</th>
                                    <th style="text-align: center">TM(%-arb)</th>
                                    <th style="text-align: center">T.Ash(%-adb)</th>
                                    <th style="text-align: center">T.Sulfur(%-adb)</th>
                                    <th style="text-align: center">Klarifikasi </br> Batubara(adb)</th>
                                    <th style="text-align: center">Ket</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
				<?php
				if ($results4) {
				    foreach ($results4 as $row) {
					?>
	    			    <tr>
	    				<td style="text-align: center"><?php echo number_format($row->cal_arb, 2, '.', ','); ?></td>
	    				<td style="text-align: center"><?php echo number_format($row->cal_adb, 2, '.', ','); ?></td>
	    				<td style="text-align: center"><?php echo number_format($row->tm_arb, 2, '.', ','); ?></td>
	    				<td style="text-align: center"><?php echo number_format($row->t_ash_adb, 2, '.', ','); ?></td>
	    				<td style="text-align: center"><?php echo number_format($row->t_sulfur_adb, 2, '.', ','); ?></td>
	    				<td style="text-align: center"><?php echo $row->klasifikasi_batubara; ?></td>
	    				<td style="text-align: center"><?php echo $row->ket; ?></td>
	    				<td style="text-align: center">
	    				    <a href="#" class="btn btn-primary btn-xs" onclick="PopUpWindow('<?php echo base_url(); ?>lse/CTRL_Edit_SR3/<?php echo $row->id_cal; ?>/<?php echo $row->no_lse; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><i class="fa fa-pencil"></i></a>
	    				</td>
	    			    </tr>
				    <?php
				    }
				} else {
				    ?>
				    <tr>
					<td colspan="8" class="text-center"> No Record Data </td>

				    </tr>

    <?php } ?>
                            </tbody>
                        </table>
                        <!-- End 3 -->

                    </div>

<?php } ?> 
            </div>
        </div>
    </div>
</fieldset>
</br></br></br>
<div class="form-actions">
    <div class="row">
        <div class="row">
            <div class="col-md-12">
		<?php
		echo anchor('lse', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
		echo nbs(1);
		echo form_hidden('id', $no_lse);
		?>
                <button type="submit" name="btn_submit2" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button>&nbsp;
		<?php
		foreach ($results2a as $submit) {
		    if (!empty($submit->total_quantity)) {
			?>
			<button type="submit" name="btn_send_approve" value="Save" class="btn btn-small  btn-success" value="<?php echo $no_lse ?>"><i class="fa fa-save"></i> Send To Approval</button>&nbsp;
			<?php
		    }
		}
		?>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>