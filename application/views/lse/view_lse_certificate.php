<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<br>
<div class="row-fluid">
    <!-- row -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	    <?php
	    echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form',
		'data-bv-message' => 'This value is not valid',
		'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok',
		'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove',
		'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh'
	    ));
	    ?>
	    <?php echo form_hidden('requester_id', $requester); ?>
	    <?php echo form_hidden('no_lse', $no_lse); ?>

	    <div class="col-md-12">
		<?php if ($last_status == '7') { ?>
    		<button type="submit" name="btn_inatrade" value="Done" class="btn btn-small btn-danger pull-right"><i class="fa fa-send"></i> SEND TO INATRADE</button> &nbsp; 
		    <?php
		}
		?>
	    </div>
            <div class="col-md-12" style="padding-top: 20px">
                <fieldset>
		    <table width="100%" cellspacing="1" cellpadding="3" border="1">
			<tbody>
			    <tr>
				<td align="center" colspan="3" style="font-size: 10px;"><span style="font-size:10pt;"><strong><u>LAPORAN SURVEYOR EKSPOR ( LSE )</u></strong><br><em>SURVEYOR'S EXPORT REPORT</em></span></td>
			    </tr>
			    <tr>
				<td align="center" colspan="3" style="font-size: 10px;"><strong><u>PERATURAN MENTERI PERDAGANGAN RI NO. 39/M-DAG/PER/7/2014, 15 JULI 2014</u></strong><br><em>REGULATION OF TRADE MINISTRY NO. 39/M-DAG/PER/7/2014 DATED JULY 15TH, 2014</em></td>
			    </tr>
			    <tr>
				<td align="left" colspan="3" style="font-size: 10px;"><strong>A. KANTOR PENERBIT / <em>ISSUING OFFICE</em> : <?= $branch_name ?></strong></td>
			    </tr>
			    <tr>
				<td width="224" align="left" style="width: 6cm;font-size: 10px;">NO. LSE  : <strong><?= $no_lse ?></strong></td>
				<td width="223" align="left" style="width: 7cm;font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td style="width: 2.5cm;font-size: 10px;"> <u>TGL. DIKELUARKAN </u><br><em>DATE OF ISSUED</em></td>
						<td style="width: 0.5cm;font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= date("d M Y", strtotime($date_issued)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
				<td width="223" align="left" style="width: 8cm;font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td style="width: 2.5cm;font-size: 10px;"><u>TGL. HABIS PAKAI</u><br><em>DATE OF EXPIRES</em></td>
						<td style="width: 0.5cm;font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= date("d M Y", strtotime($date_expired)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="left" colspan="3" style="font-size: 10px;"><strong>B. PERNYATAAN EKSPORTIR / <em>EXPORTER'S STATEMENT</em></strong></td>
			    </tr>
			    <tr>
				<td valign="top" align="left" rowspan="2" style="font-size: 10px;"><u>EKSPORTIR (NPWP, Nama, Alamat)</u><br><em>EXPORTER'S (NPWP, NAME, ADDRESS)</em> <br> <strong><?= $npwp_no ?><br><?= $client_name ?><br><?= $exporter_address ?></strong> </td>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="193" style="font-size: 10px;">NO. WO (PVEB)</td>
						<td width="6" style="font-size: 10px;">:</td>
						<td width="193" style="font-size: 10px;"><strong><?= $no_wo ?></strong></td>
						<td width="56" style="font-size: 10px;"><u>TGL.</u><br><em>DATE</em></td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= date("d M Y", strtotime($date_wo)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="102" style="font-size: 10px;"><u>TEMPAT PEMERIKSAAN</u><br>
						    <em>SURVEY LOCATION</em></td>
						<td width="5" style="font-size: 10px;">:</td>
						<td width="100" style="font-size: 10px;"><?= $survey_location ?></td>
						<td width="31" style="font-size: 10px;"><u>TGL.</u><br><em>DATE</em></td>
						<td width="5" style="font-size: 10px;">:</td>
						<td width="151" style="font-size: 10px;"><?= date("d M Y", strtotime($survey_location_date)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td valign="top" align="left" rowspan="3" style="font-size: 10px;"><u>ET-BATUBARA &amp; PRODUK BATUBARA</u><br><em>REGISTERED EXPORTER</em><br><br>
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="20" style="font-size: 10px;">NO.</td>
						<td width="5" style="font-size: 10px;">:</td>
						<td width="80" style="font-size: 10px;"><?= $no_reg_exporter ?></td>
						<td width="40" style="font-size: 10px;"><u>TGL.</u><br><em>DATE</em></td>
						<td width="5" style="font-size: 10px;">:</td>
						<td width="100" style="font-size: 10px;"><?= date("d M Y", strtotime($date_reg_exporter)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="100" style="font-size: 10px;">NO. PACKING LIST</td>
						<td width="5" style="font-size: 10px;">:</td>
						<td width="100" style="font-size: 10px;"><?= $no_packing_list ?></td>
						<td width="31" style="font-size: 10px;"><u>TGL.</u><br><em>DATE</em></td>
						<td width="5" style="font-size: 10px;">:</td>
						<td width="151" style="font-size: 10px;"><?= date("d M Y", strtotime($date_packing_list)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="100" style="font-size: 10px;">NO. INVOICE</td>
						<td width="5" style="font-size: 10px;">:</td>
						<td width="100" style="font-size: 10px;"><?= $no_invoice_packing_list ?></td>
						<td width="31" style="font-size: 10px;"><u>TGL.</u><br><em>DATE</em></td>
						<td width="5" style="font-size: 10px;">:</td>
						<td width="151" style="font-size: 10px;"><?= date("d M Y", strtotime($date_invoice_packing_list)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="250" style="font-size: 10px;"><u>NILAI EKSPOR (FOB)</u> / <em>EXPORT VALUE (USD)</em></td>
						<td width="10" style="font-size: 10px;">:</td>
						<td width="150" style="font-size: 10px;"><?= number_format($SumAmount, 2, ',', '.') ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="left" style="font-size: 10px;"><u>IMPORTIR (NAMA DAN ALAMAT)</u><br><em>IMPORTER (NAME AND ADDRESS)</em><br><?= $importer_name ?><br><?= $importer_address ?></td>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="370" rowspan="2" style="font-size: 10px;"><u>IUPOP/PKP2B/IUPKOP/IPR</u><br><em>MINING LICENSE</em></td>
						<td width="50" style="font-size: 10px;">NO.</td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= $no_mining_license ?></td>
					    </tr>
					    <tr>
						<td style="font-size: 10px;"><u>TGL.</u><br><em>DATE</em></td>
						<td style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= date("d M Y", strtotime($date_mining_license)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="left" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="100" style="font-size: 10px;"><u>PELABUHAN MUAT</u><br>
						    <em>LOADING PORT</em></td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= $port ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="370" rowspan="2" style="font-size: 10px;"><u>IUPOPK PENGANGKUTAN DAN PENJUALAN</u><br><em>TRANSPORTING AND SELLING LICENCE</em></td>
						<td width="50" style="font-size: 10px;">NO.</td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;">&nbsp;</td>
					    </tr>
					    <tr>
						<td style="font-size: 10px;"><u>TGL.</u><br><em>DATE</em></td>
						<td style="font-size: 10px;">:</td>
						<td style="font-size: 10px;">&nbsp;</td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="left" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="100" style="font-size: 10px;"><u>TANGGAL MUAT</u><br><em>DATE OF LOADING</em></td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= date("d M Y", strtotime($stdate_load_vessel)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="370" rowspan="2" style="font-size: 10px;"><u>IUPOPK PENGOLAHAN &amp; PEMURNIAN / IUI</u><br><em>SMELTING LICENCE</em></td>
						<td width="50" style="font-size: 10px;">NO.</td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;">&nbsp;</td>
					    </tr>
					    <tr>
						<td style="font-size: 10px;"><u>TGL.</u><br><em>DATE</em></td>
						<td style="font-size: 10px;">:</td>
						<td style="font-size: 10px;">&nbsp;</td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="left" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="100" style="font-size: 10px;"><u>NEGARA DAN NAMA PELABUHAN TUJUAN</u><br><em>COUNTRY AND PORT DESTINATION</em></td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= $port_destination ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="370" rowspan="2" style="font-size: 10px;"><u>BUKTI PEMBAYARAN ROYALTI</u><br><em>ROYALTY PAYMENT</em></td>
						<td width="50" style="font-size: 10px;">NO.</td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= $no_royalty_payment ?></td>
					    </tr>
					    <tr>
						<td style="font-size: 10px;"><u>TGL.</u><br><em>DATE</em></td>
						<td style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= date("d M Y", strtotime($date_royalty_payment)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="left" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="100" style="font-size: 10px;"><u>NAMA KAPAL</u><br><em>VESSEL NAME</em></td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= $vessel_name ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="150" style="font-size: 10px;"><u>TGL. PEMUATAN / STUFFING</u><br><em>DATE OF LOADING/ STUFFING</em></td>
						<td width="10" style="font-size: 10px;">:</td>
						<td width="250" style="font-size: 10px;"><?= date("d M Y", strtotime($stdate_load_vessel)) ?> s/d <?= date("d M Y", strtotime($enddate_load_vessel)) ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="left" colspan="3" style="font-size: 10px;"><strong>C. HASIL SURVEY / <em>SURVEY RESULT</em></strong></td>
			    </tr>
			    <tr>
				<td align="left" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="100" style="font-size: 10px;"><u>ALAT ANGKUT</u><br><em>MODE OF TRANSPORT</em></td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= $mode_transport ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
				<td align="left" colspan="2" style="font-size: 10px;">
				    <table width="100%" border="0">
					<tbody>
					    <tr>
						<td width="150" style="font-size: 10px;"><u>TIPE PEMUATAN</u><br><em>CARGO TYPE</em></td>
						<td width="10" style="font-size: 10px;">:</td>
						<td style="font-size: 10px;"><?= $cargo_type ?></td>
					    </tr>
					</tbody>
				    </table>
				</td>
			    </tr>
			    <tr>
				<td align="center" colspan="3" style="font-size: 10px;">
				    <table width="100%" border="1" cellpadding="2"><br/>
					<tr>
					    <th class="text-center"><b>NO</b></font></th>
					    <th class="text-center"><b>HS</b></font></th>
					    <th class="text-center"><b>DESCRIPTION</b></font></th>
					    <th class="text-center"><b>QUANTITY(TNE)</font></b></th>
					    <th class="text-center"><b>FAS(USD) PRICE</font></b></th>
					    <th class="text-center"><b>NO MINING LICENSE</font></b></th>
					</tr>
					<?php
					if ($table1) {
					    $SumQty = 0;
					    $SumFAS = 0;
					    foreach ($table1 as $key => $row) {
						$no = $key + 1;
						?>
						<tr>
						    <td><?= $no ?></td>
						    <td><?= $row->hs ?></td>
						    <td><?= $row->description ?></td>
						    <td><?= number_format($row->quantity, 3, ',', '. ') ?> MT</td>
						    <td><?= number_format($row->fas, 2, ',', '. ') ?></td>
						    <td><?= $row->no_mining_license ?></td>
						</tr>
						<?php
						$SumQty = $SumQty + $row->quantity;
						$SumFAS = $SumFAS + $row->fas;
					    }
					} else {
					    ?>
    					<tr>
    					    <td colspan="6" class="text-center">No Data Records</td>
    					</tr>
					    <?php
					}
					;
					?>
					<?php if ($table1) { ?>
    					<tr>
    					    <td class="text-center" colspan="3"><b>TOTAL</b></td>
    					    <td><font face="Arial"><b><?= number_format($SumQty, 3, ',', '.') ?> MT</b></font></td>
    					    <td><font face="Arial"><b><?= number_format($SumFAS, 2, ',', '.') ?></font></b></td>
    					    <td colspan="2"></td>
    					</tr>
					<?php }; ?>
				    </table><br/>
				    <table width="100%" border="1" cellpadding="2">
					<tr>
					    <th class="text-center"><b>NO</b></font></th>
					    <th class="text-center"><b>NAMA PERUSAHAAN ASAL BARANG</b></font></th>
					    <th class="text-center"><b>NPWP</b></font></th>
					    <th class="text-center"><b>PROPINSI ASAL BARANG</font></b></th>
					    <th class="text-center"><b>ROYALTI DP</font></b></th>
					</tr>
					<?php
					if ($table2) {
					    $SumRoyalty = 0;
					    foreach ($table2 as $key2 => $row2) {
						$no2 = $key2 + 1;
						?>
						<tr>
						    <td><?= $no2 ?></td>
						    <td><?= $row2->company_name ?></td>
						    <td><?= $row2->npwp ?></td>
						    <td><?= $row2->province_name ?></td>
						    <td><?= number_format($row2->royalty_dp, 2, ',', '.') ?></td>
						</tr>
						<?php
						$SumRoyalty = $SumRoyalty + $row2->royalty_dp;
					    }
					} else {
					    ?>
    					<tr>
    					    <td colspan="5" class="text-center">No Data Records</td>
    					</tr>
					    <?php
					};
					?>
					<?php if ($table2) { ?>
    					<tr>
    					    <td class="text-center" colspan = "4"></td><br/>
    					<td><b><?= number_format($SumRoyalty, 0, '.', ',') ?></b></td>
    			    </tr>
			    <?php }; ?>
		    </table>
		    <table width="100%" border="1" cellpadding="2">
			<tr>
			    <th align="center"><font face="Arial"><b>No</b></font></th>
			    <th align="center"><font face="Arial"><b>Cal.(KKal/Kg-arb)</b></font></th>
			    <th align="center"><font face="Arial"><b>Cal.(KKal/Kg-adb)</b></font></th>
			    <th align="center"><font face="Arial"><b>TM(%-arb)</font></b></th>
			    <th align="center"><font face="Arial"><b>T.Ash(%-adb)</font></b></th>
			    <th align="center"><font face="Arial"><b>T.Sulfur(%-adb)</b></font></th>
			    <th align="center"><font face="Arial"><b>Klarifikasi <br/> Batubara(adb)</font></b></th>
			    <th align="center"><font face="Arial"><b>Ket</font></b></th>
			</tr>
			<?php
			if ($table3) {
			    foreach ($table3 as $key3 => $row3) {
				$no3 = $key3 + 1;
				?>
				<tr>
				    <td><?= $no3 ?></td>
				    <td><?= $row3->cal_arb ?></td>
				    <td><?= $row3->cal_adb ?></td>
				    <td><?= $row3->tm_arb ?></td>
				    <td><?= $row3->t_ash_adb ?></td>
				    <td><?= $row3->t_sulfur_adb ?></td>
				    <td><?= $row3->klasifikasi_batubara ?></td>
				    <td><?= $row3->ket ?></td>
				</tr>
				<?php
			    }
			} else {
			    ?>
    			<tr>
    			    <td colspan="8" class="text-center">No Data Records</td>
    			</tr>
			    <?php
			};
			?>
			<br/>
		    </table>
		    <br/>
		    </td>
		    </tr>
		    <tr>
			<td align="left" colspan="3" style="font-size: 10px;">NO. PETI KEMAS DAN SEGEL (<em>CONTAINER NUMBER AND SEAL</em>) : -</td>
		    </tr>
		    <tr>
			<td align="left" colspan="3" style="font-size: 10px;">CATATAN / NOTE : <?= $note ?></td>
		    </tr>
		    <tr>
			<td align="left" colspan="2" style="width: 10cm;font-size: 10px;">KESIMPULAN PEMERIKSAAN / <em>SURVEY CONCLUSION</em> :<br><br><br><u><strong>BARANG YANG DIPERIKSA SESUAI PERATURAN MENTERI PERDAGANGAN NOMOR 39/M-DAG/PER/7/2014, 15 JULI 2014</strong></u><br><em>GOODS VERIFICATED FOUND IN COMPLIANCE WITH THE REGULATION OF TRADE MINISTRY NO. 39/M-DAG/PER/7/2014 DATED JULY 15TH, 2014</em></td>
			<td align="left" style="width: 316px;font-size: 10px;">
			    <table width="100%" border="0">
				<tbody>
				    <tr>
					<td align="center" style="font-size: 10px;"><strong>PT. CARSURIN</strong></td>
				    </tr>
				    <tr>
					<td height="50" align="center" style="font-size: 10px;">&nbsp;</td>
				    </tr>
				    <tr>
					<td align="center" style="font-size: 10px;">{SIGNATURE}</td>
				    </tr>
				</tbody>
			    </table>
			</td>
		    </tr>
		    <tr>
			<td width="100%" align="left" colspan="3" style="font-size: 10px;">Laporan ini diterbitkan untuk memenuhi ketentuan ekspor Produk Pertambangan. Isi Laporan ini merupakan hasil pemeriksaan terhadap Produk Pertambangan yang akan diekspor. Laporan Surveyor ini tidak membebaskan eksportir dari kewajiban dan tanggung jawab hukum yang tercantum dalam kontrak jual beli.</td>
		    </tr>
		    <tr>
			<td width="100%" align="left" colspan="3" style="font-size: 10px;">This report is made to fulfill the export requirements for export of Mining Product. This report contains the result of survey on Mining Product for export. This report does not lease the exporter from his/her obligations and responsibilities stated in the sales-purchase contract.</td>
		    </tr>
		    </tbody>
		    </table>
		</fieldset>
		<div class="form-actions">
		    <div class="row">
			<div class="col-md-12">
			    <?php
			    if ($last_status == '3' || $last_status == '6') {
				echo form_dropdown('client_aggrement', $option_aggrement, $aggrement, ' class="form-control" style="width:20%"');
			    }
			    ?>
			    <br/>
			    <?php
			    echo anchor('lse', '<i class = "fa fa-reply"></i>&nbsp;
						    Back', array('class' => 'btn btn-small btn-info'));
			    echo nbs(2);
			    ?>
			    <div class="pull-left">
				<?php if ($last_status == '3' || $last_status == '6') { ?>
    				<button type = "submit" name = "btn_aggrement" value = "Done" class = "btn btn-small btn-warning"><i class = "fa fa-save"></i> Submit</button> &nbsp;
				    <?php
				}
				echo nbs(2);
				if ($last_status == '3' || $last_status == '6' || $last_status == '7' || $last_status == '8') {
				    echo anchor('lse/CTRL_Print/' . $no_lse . '/' . $id, '<i class = "fa fa-print"></i>&nbsp;
					    Print', array('class' => 'btn btn-small btn-success ', 'target' => 'blank'));
				}
				?>
			    </div>
			</div>
		    </div>
		</div>
		<?php echo form_close(); ?>
	    </div>
        </article>
    </div>

</div>