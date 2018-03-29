<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br/>
<div class="row-fluid">
	<div class="col-sm-12  well well-light well-sm">
		<h3 class="black">
			<span class="middle"><?php echo $title_head; ?></span>

			<?php
			if($cek_status) {
			?>
				<span class="label label-primary arrowed-in-right">
					<i class="fa fa-circle smaller-80"></i>
					<?php echo $status; ?>
				</span>
			<?php
			} else {
			?>
				<span class="label label-warning arrowed-in-right">
					<i class="fa fa-ban-circle smaller-80"></i>
					<?php echo $status; ?>
				</span>
			<?php
			}
			?>
		</h3>
		<legend>General</legend>

                 <table class="table  table-striped" cellpadding="3" cellspacing="3">
                                    <tr>
                                        <td class="is-visible" width="30%" align="right"><?php echo $title; ?> ID</td>
                                        <td width="10">:</td>
                                        <td><?php echo $id; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><?php echo $title; ?> Name</td>
                                        <td>:</td>
                                        <td><?php echo $name; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right">Branch</td>
                                        <td>:</td>
                                        <td><?php echo $branch; ?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Address</td>
                                        <td>:</td>
                                        <td><?php echo $address; ?>&nbsp;</td>
                                    </tr> 
                                    <tr>
                                        <td align="right">Phone</td>
                                        <td>:</td>
                                        <td><?php echo $phone; ?>&nbsp;</td>
                                    </tr>
                                    
                                    
                                </table> 
				
		
		<legend>Attach Files</legend>
                
                <table class="table  table-striped" cellpadding="3" cellspacing="3">
                                    <tr>
                                        <td class="is-visible" width="30%" align="right">Certificate</td>
                                        <td width="10">:</td>
                                        <td><?php if($file_certificate) { echo anchor('laboratory/CTRL_Download/certificate/'.$id, $file_certificate); } ?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Accreditation</td>
                                        <td>:</td>
                                        <td><?php if($file_accreditation) { echo anchor('laboratory/CTRL_Download/accreditation/'.$id, $file_accreditation); } ?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Brochure</td>
                                        <td>:</td>
                                        <td><?php if($file_brochure) { echo anchor('laboratory/CTRL_Download/brochure/'.$id, $file_brochure); } ?>&nbsp;</td>
                                    </tr>
                                  
                                    
                                </table> 
				
		
		<div class="form-actions">
			<input type="button" name="close" value="Close" class="btn btn-small btn-primary" onClick="self.close()">
		</div>
	</div>
</div>