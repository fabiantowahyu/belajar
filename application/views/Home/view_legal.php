<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
	<div class="span12 offset panel-box">
		<div>
			<div>
				<div id="validation-form" class="form-horizontal">
				<input type="hidden" id="type" value="<?=isset($client->type) ? $client->type : ''?>">
				<div class="row-fluid">
					<table border="0" cellpadding="5" cellspacing="2" width="100%">
						<tr>
							<td>
								<?php
									if($client){
								?>
								<table class="table table-bordered">
									<tr id="npwp">
										<th width="100">NPWP</th>
										<td width="100">
											<?php if($client->npwp){?>
											<a  href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->npwp; ?>','mywindow',800,600,'yes','yes'); return false;"><label>NPWP</a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?php 
											if(isset($exp->exp_npwp)){
												if($exp->exp_npwp != '0000-00-00' AND $exp->exp_npwp < date('Y-m-d')){ ?>
													<span class="label label-important arrowed-in arrowed-in-right">
														<?php echo "Expired"; ?>
													</span>
												<?php	}
												else { ?>
													<i class="icon-ok bigger-120"></i>
												<?php }
											} else{
												echo "Not Set";
											}
											?>
										</td>
									</tr>
									<tr id="tdp">
										<th width="100">Tanda Daftar Perusahaan</th>
										<td width="100">
											<?php if($client->tdp){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->tdp; ?>','mywindow',800,600,'yes','yes'); return false;"><label>Tanda Daftar Perusahaan</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_tdp) ? $exp_npwp : '';?>
										</td>
									</tr>
									<tr id="siup">
										<th width="100">Surat Izin Usaha Perdagangan</th>
										<td width="100">
											<?php if($client->siup){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->siup; ?>','mywindow',800,600,'yes','yes'); return false;"><label>Surat Izin Usaha Perdagangan</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_siup) ? $exp_npwp : '';?>
										</td>
									</tr>
									<tr id="api">
										<th width="100">Angka Pengenal Importir</th>
										<td width="100">
											<?php if($client->api){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->api; ?>','mywindow',800,600,'yes','yes'); return false;"><label>Angka Pengenal Importir</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_api) ? $exp_api : '';?>
										</td>
									</tr>
									<tr id="it">
										<th width="100">Importir Terdaftar</th>
										<td width="100">
											<?php if($client->it){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->it; ?>','mywindow',800,600,'yes','yes'); return false;"><label>Importir Terdaftar</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_it) ? $exp_it : '';?>
										</td>
									</tr>
									<tr id="ip">
										<th width="100">Importir Produsen</th>
										<td width="100">
											<?php if($client->ip){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->ip; ?>','mywindow',800,600,'yes','yes'); return false;"><label>Importir Produsen</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_ip) ? $exp_ip : '';?>
										</td>
									</tr>
									<tr id="pi">
										<th width="100">Persetujuan Impor</th>
										<td width="100">
											<?php if($client->pi){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->pi; ?>','mywindow',800,600,'yes','yes'); return false;"><label>Persetujuan Impor</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_pi) ? $exp_pi : '';?>
										</td>
									</tr>
									<tr id="si">
										<th width="100"><label>Shipping Instruction</label></th>
										<td width="100">
											<?php if($client->si){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->si; ?>','mywindow',800,600,'yes','yes'); return false;"><label>Shipping Instruction</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_si) ? $exp_si : '';?>
										</td>
									</tr>
									<tr id="nik">
										<th width="100">NIK</th>
										<td width="100">
											<?php if($client->nik){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->nik; ?>','mywindow',800,600,'yes','yes'); return false;"><label>NIK</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_nik) ? $exp_nik : '';?>
										</td>
									</tr>
									<tr id="spe">
										<th width="100">SPE</th>
										<td width="100">
											<?php if($client->spe){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->spe; ?>','mywindow',800,600,'yes','yes'); return false;"><label>SPE</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_spe) ? $exp_spe : '';?>
										</td>
									</tr>
									<tr id="et">
										<th width="100">Exporter Terdaftar</th>
										<td width="100">
											<?php if($client->et){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->et; ?>','mywindow',800,600,'yes','yes'); return false;"><label>Exporter Terdaftar</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_et) ? $exp_et : '';?>
										</td>
									</tr>
									<tr id="sre">
										<th width="100">Surat Rekomendasi ESDM</th>
										<td width="100">
											<?php if($client->sre){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->sre; ?>','mywindow',800,600,'yes','yes'); return false;"><label>Surat Rekomendasi ESDM</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											<?=isset($exp_sre) ? $exp_sre : '';?>
										</td>
									</tr>
									<tr id="sppda">
										<th width="100">Surat Pernyataan Penyerahan Dokumen Asli</th>
										<td width="100">
											<?php if($client->sppda){?>
											<a  href="#" href="#" onclick="PopUpWindow('<?php echo base_url().$file.$client->sppda; ?>','mywindow',800,600,'yes','yes'); return false;"><label>Surat Pernyataan Penyerahan Dokumen Asli</label></a>
											<?php }else{
												echo "File Not Exist";
											}
											?>
										</td>
										<td width="50px">
											
										</td>
									</tr>
									<tr>
										<fieldset>
											<h3 class="header blue bolder smaller">Update Data</h3>
											<?php echo form_open_multipart("admin/CTRL_Upload_Data",array("name"=>"frmUpload", "method"=>"post"));?>
												<input type="hidden" name="userid" value="<?=$userid?>">
												<table border="0" cellpadding="5" cellspacing="3" width="100%">
													<tr>
														<td width="20%"><label>Document Type</label></td>
														<td width="2%"></td>
														<td>
															<select name="fieldname" class="input-xlarge">
																<option value="npwp">Nomor Pokok Wajib Pajak (NPWP)</option>
																<option value="siup">Surat Izin Usaha Perdagangan (SIUP)</option>
																<option value="tdp">Tanda Daftar Perusahaan (TDP)</option>

																<?php if($client->type == 'IMPORTER' OR $client->type == 'ALL'){?>
																		<option value="api">Angka Pengenal Importer (API)</option>
																		<option value="it">Importer Terdaftar (IT)</option>
																		<option value="ip">Importer Produsen (IP)</option>
																		<option value="pi">Persetujuan Impor (PI)</option>
																<?php }
																 	  if($client->type == 'EXPORTER' OR $client->type == 'ALL'){?>
																		<option value="nik">Nomor Identitas Kepabeanan (NIK)</option>
																		<option value="spe">Surat Persetujuan Ekspor (SPE)</option>
																		<option value="et">Exporter Terdaftar (ET)</option>
																		<option value="sre">Surat Rekomendasi ESDM</option>
																<?php } ?>
																		<option value="sppda">Surat Pernyataan Penyerahan Dokumen Asli</option>	  

															</select>
														</td>
													</tr>
													<tr>
														<td width="20%"><label>File</label></td>
														<td width="2%"></td>
														<td>
															<input type="file" name="name" accept=".jpg, .png, .doc, .docx, .pdf">
														</td>
													</tr>
													
													<tr>
														<td colspan="3" align="center"><br/><input type="submit" class="btn btn-success btn-small" value="Update"></td>
														<td></td>
													</tr>
												</table>
											<?php echo form_close();?>
										</fieldset>
									</tr>
								</table>
								<?php
									}
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>	
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>plugins/jquery-ui/themes/dot-luv/jquery.ui.all.css">
<script src="<?php echo base_url();?>plugins/jquery-ui/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>plugins/jquery-ui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>plugins/jquery-ui/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var type = $('#type').val();
	    if( type == 'IMPORTER'){
	    	$('#si').hide();
	    	$('#nik').hide();
	    	$('#spe').hide();
	    	$('#sre').hide();
	    	$('#et').hide();
	    }else if(type == 'EXPORTER'){
	    	$('#api').hide();
	    	$('#it').hide();
	    	$('#ip').hide();
	    	$('#pi').hide();
	    }
	    $("#expired_date").datepicker({
			dateFormat : 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		});
	});
</script>