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
							<td width="35%">Company Name</td>
							<td width="2%">:</td>
							<td><?=isset($client->client_name) ? $client->client_name : '' ?></td>
						</tr>
						<tr>
							<td>Commodity</td>
							<td>:</td>
							<td><?=isset($client->commodity) ? $client->commodity : '' ?></td>
						</tr>
						<tr>
							<td>NPWP</td>
							<td>:</td>
							<td><?=isset($client->client_npwp) ? $client->client_npwp : '' ?></td>
						</tr>
						<tr>
							<td>Address</td>
							<td>:</td>
							<td><?=isset($client->address) ? $client->address : '' ?></td>
						</tr>
						<tr>
							<td>Postal Code/ZIP</td>
							<td>:</td>
							<td><?=isset($client->postcode) ? $client->postcode : '' ?></td>
						</tr>
						<tr>
							<td>Region - City</td>
							<td>:</td>
							<td><?=isset($province->province_name) ? $province->province_name : '' ?></td>
						</tr>
						<tr>
							<td>Telephone</td>
							<td>:</td>
							<td><?=isset($client->phone) ? $client->phone : '' ?></td>
						</tr>
						<tr>
							<td>Facsimile</td>
							<td>:</td>
							<td><?=isset($client->fax) ? $client->fax : ''?></td>
						</tr>
						<tr>
							<td>Contact</td>
							<td>:</td>
							<td><?=isset($client->pic) ? $client->pic : ''?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><?=isset($client->email) ? $client->email : ''?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>	
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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
	});
</script>