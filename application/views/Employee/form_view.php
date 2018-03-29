<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br/>
<div class="row-fluid">
	<div class="col-sm-12  well well-light well-sm ">
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
		<legend >General</legend>

		
			<div class="col-sm-4">
				<span >
					<img class="editable img-responsive" id="logoCompanyd_bak" src="<?php echo base_url() . $file_name;?>" />
				</span>
			</div>
			 <div class="col-sm-8">
                                <table class="table  table-striped" cellpadding="3" cellspacing="3">
                                    <tr>
                                        <td class="is-visible" width="30%" align="right"><?php echo $title; ?> ID</td>
                                        <td width="10">:</td>
                                        <td><?php echo $id; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right">First Name</td>
                                        <td>:</td>
                                        <td><?php echo $first_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right">Middle Name</td>
                                        <td>:</td>
                                        <td><?php echo $middle_name; ?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Last Name</td>
                                        <td>:</td>
                                        <td><?php echo $last_name; ?>&nbsp;</td>
                                    </tr> 
                                    <tr>
                                        <td align="right">Position</td>
                                        <td>:</td>
                                        <td><?php echo $position_id; ?>&nbsp;</td>
                                    </tr>
                                    
                                     <tr>
                                        <td align="right">Gender</td>
                                        <td>:</td>
                                        <td><?php echo $gender; ?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Join Date</td>
                                        <td>:</td>
                                        <td><?php echo $join_date; ?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Username</td>
                                        <td>:</td>
                                        <td><?php echo $username; ?>&nbsp;</td>
                                    </tr>
                                    
                                    <tr>
                                        <td align="right">Role Application</td>
                                        <td>:</td>
                                        <td><?php echo $role; ?>&nbsp;</td>
                                    </tr>
                                </table> 
                            </div>
                <div class="clearfix"></div>
                
                <legend>Contact</legend>
		 <div class="col-sm-12">
                                <table class="table  table-striped" cellpadding="3" cellspacing="3">
                                    <tr>
                                        <td width="20%" align="right">Email</td>
                                        <td width="10">:</td>
                                        <td><?php echo $email; ?>&nbsp;</td>
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
                                    <tr>
                                        <td align="right">HandPhone</td>
                                        <td>:</td>
                                        <td><?php echo $hp; ?>&nbsp;</td>
                                    </tr> 
                                    <tr>
                                        <td align="right"> Postal Code</td>
                                        <td>:</td>
                                        <td><?php echo $post_code; ?>&nbsp;</td>
                                    </tr>
                                    
                                   
                                </table> 
                     
                    
                            </div>
		
	 <div class="clearfix"></div>

		<div class="form-actions">
			<input type="button" name="close" value="Close" class="btn btn-small btn-primary" onClick="self.close()">
		</div>
	</div>
</div>