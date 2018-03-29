<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br><br><br><br>
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
		<legend>Basic Info</legend>
 <table class="table  table-striped" cellpadding="3" cellspacing="3">
                                    <tr>
                                        <td class="is-visible" width="30%" align="right"><?php echo $title; ?> Code</td>
                                        <td width="10">:</td>
                                        <td><?php echo $id; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><?php echo $title; ?> Name</td>
                                        <td>:</td>
                                        <td><?php echo $service; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right">Description</td>
                                        <td>:</td>
                                        <td><?php echo $description; ?>&nbsp;</td>
                                    </tr>
                                  
                                    
                                </table> 
		
		
		<div class="form-actions">
			<input type="button" name="close" value="Close" class="btn btn-small btn-primary" onClick="self.close()">
		</div>
	</div>
</div>