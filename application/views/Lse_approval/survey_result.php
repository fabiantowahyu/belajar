<?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
<fieldset>
    <div role="content">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-12">
                    <legend><strong class="text-info">SURVEY INFORMATION</strong></legend>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label" >Mode of Transport: </label>
                        <div class="col-md-2">
			    <label class="control-label"><?= $mode_transport; ?></label>
                        </div>
                        <label for="" class="col-md-2 col-md-offset-1 control-label" >Cargo Type: </label>
                        <div class="col-md-3">
			    <label class="control-label"><?= $cargo_type; ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label" >Container Number Seal: </label>
                        <div class="col-md-2">
			    <label class="control-label"><?= $container_numseal; ?></label>
                        </div>
                        <label for="" class="col-md-2 col-md-offset-1 control-label" >Note: </label>
                        <div class="col-md-3">
			    <label ><?= $note; ?></label>
                        </div>
                    </div>
		    <br/><br/>
                    <!-- Result 1 -->
		    <div class="row-fluid">
			<legend class="text-info">
			    Good Information
			</legend>
			<table class="table table-striped table-bordered table-hover">
			    <thead>
				<tr>
				    <th style="text-align: center">No</th>
				    <th style="text-align: center">HS</th>
				    <th style="text-align: center">Description</th>
				    <th style="text-align: center">Quantity (TNE)</th>
				    <th style="text-align: center">FAS (USD)</th>
				    <th style="text-align: center">Mining License of Goods Origin</th>
				</tr>
			    </thead>
			    <tbody>
				<?php
				$i = 1;
				$SumQty = 0;
				$SumFas = 0;
				foreach ($goods AS $row) {
				    ?>
    				<tr>
    				    <td style="text-align: center"><?php echo $i; ?></td>
    				    <td><?php echo $row->hs; ?></td>
    				    <td><?php echo $row->description; ?></td>
    				    <td><?php echo number_format($row->quantity, 3,",","."); ?></td>
    				    <td><?php echo number_format($row->fas, 2,",","."); ?></td>
    				    <td><?php echo $row->no_mining_license; ?></td>
    				</tr>
				    <?php
				    $i++;
				    $SumQty = $SumQty + $row->quantity;
				    $SumFas = $SumFas + $row->fas;
				};
				?>
				<tr>
				    <td style="text-align: center" colspan="3"><strong>TOTAL</strong></td>
				    <td><strong><?php echo number_format($SumQty, 3,",",".") ?> MT</strong></td>
				    <td><strong><?php echo number_format($SumFas, 2,",","."); ?></strong></td>
				    <td colspan="2"></td>
				</tr>
			    </tbody>
			</table>
			<!-- End 1 -->

			<!-- Result 2 -->
			<legend class="text-info">
			    Company Information
			</legend>
			<table class="table table-striped table-bordered table-hover">
			    <thead>
				<tr>
				    <th style="text-align: center">No</th>
				    <th style="text-align: center">Nama Perusahaan Asal Barang</th>
				    <th style="text-align: center">NPWP</th>
				    <th style="text-align: center">Issued Province</th>
				    <th style="text-align: center">Royalty DP</th>
				</tr>
			    </thead>
			    <tbody>
				<?php
				$j = 1;
				$SumRoyalty = 0;
				foreach ($companys AS $row1) {
				    ?>
    				<tr>
    				    <td style="text-align: center"><?php echo $j; ?></td>
    				    <td><?php echo $row1->company_name; ?></td>
    				    <td><?php echo $row1->npwp; ?></td>
    				    <td><?php echo $row1->province_name; ?></td>
    				    <td><?php echo number_format($row1->royalty_dp, 2,",","."); ?></td>
    				</tr>
				    <?php
				    $j++;
				    $SumRoyalty = $SumRoyalty + $row1->royalty_dp;
				};
				?>
				<tr>
				    <td colspan="4"><strong></strong></td>
				    <td><strong><?php echo number_format($SumRoyalty, 2,",","."); ?></strong></td>
				</tr>
			    </tbody>
			</table>
			<!-- End 2 -->

			<!-- Result 3 -->
			<legend class="text-info">
			    Cal Information
			</legend>
			<table class="table table-striped table-bordered table-hover">
			    <thead>
				<tr>
				    <th style="text-align: center; vertical-align: middle;">No</th>
				    <th style="text-align: center">Cal.(KKal/Kg-arb)</th>
				    <th style="text-align: center">Cal.(KKal/Kg-adb)</th>
				    <th style="text-align: center">TM(%-arb)</th>
				    <th style="text-align: center">T.Ash(%-adb)</th>
				    <th style="text-align: center">T.Sulfur(%-adb)</th>
				    <th style="text-align: center">Klarifikasi <br/> Batubara(adb)</th>
				    <th style="text-align: center">Ket</th>
				</tr>
			    </thead>
			    <tbody>
				<?php
				$k = 1;
				foreach ($cals AS $row2) {
				    ?>
    				<tr>
    				    <td style="text-align: center"><?php echo $k; ?></td>
    				    <td><?php echo $row2->cal_arb; ?></td>
    				    <td><?php echo $row2->cal_adb; ?></td>
    				    <td><?php echo $row2->tm_arb; ?></td>
    				    <td><?php echo $row2->t_ash_adb; ?></td>
    				    <td><?php echo $row2->t_sulfur_adb; ?></td>
    				    <td><?php echo $row2->klasifikasi_batubara; ?></td>
    				    <td><?php echo $row2->ket; ?></td>
    				</tr>
				    <?php
				    $k++;
				};
				?>
			    </tbody>
			</table>
		    </div>
		    <br/>
		    <!-- End 3 -->
		    <div class="form-actions">
			<?php
			echo anchor('Lse_approval', '<i class="fa fa-reply"></i>&nbsp;Back', array('class' => 'btn btn-small btn-info'));
			?>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</fieldset>