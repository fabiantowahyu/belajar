<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br>
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

        <div class="row-fluid">
            <div class="col-sm-4">
                <span class="profile-picture">
                    <img class="editable img-responsive" id="logoCompanyd_bak" src="<?php echo base_url() . $file_name;?>" />
                </span>
            </div>
            <div class="vspace"></div>
            <div class="col-sm-8">
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
                        <td align="right">Country</td>
                        <td>:</td>
                        <td><?php echo $country; ?>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Province</td>
                        <td>:</td>
                        <td><?php echo $province; ?>&nbsp;</td>
                    </tr> 
                    <tr>
                        <td align="right">City</td>
                        <td>:</td>
                        <td><?php echo $city; ?>&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>

        <legend>Contact</legend>
        <div class="col-sm-12">
            <table class="table  table-striped" cellpadding="3" cellspacing="3">
                <tr>
                    <td width="20%" align="right">Address</td>
                    <td width="10">:</td>
                    <td><?php echo $address; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">Postal Code</td>
                    <td>:</td>
                    <td><?php echo $postal_code; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">Phone</td>
                    <td>:</td>
                    <td><?php echo $phone; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">Fax</td>
                    <td>:</td>
                    <td><?php echo $fax; ?>&nbsp;</td>
                </tr> 
                <tr>
                    <td align="right"> Email</td>
                    <td>:</td>
                    <td><?php echo $email; ?>&nbsp;</td>
                </tr>


            </table> 


        </div>

        <legend>Bank Account</legend>
        <div class="col-sm-12">
            <table class="table  table-striped" cellpadding="3" cellspacing="3">
                <tr>
                    <td width="20%" align="right">Company Bank Account</td>
                    <td width="10">:</td>
                    <td><?php echo $bank_account; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">Company Bank Name</td>
                    <td>:</td>
                    <td><?php echo $bank_name; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">Account Name</td>
                    <td>:</td>
                    <td><?php echo $account_name; ?>&nbsp;</td>
                </tr>


            </table> 


        </div>

        <legend>Other</legend>
        <div class="col-sm-12">
            <table class="table  table-striped" cellpadding="3" cellspacing="3">
                <tr>
                    <td width="20%" align="right">Vision</td>
                    <td width="10">:</td>
                    <td><?php echo $vission; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">Mission</td>
                    <td>:</td>
                    <td><?php echo $mission; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">Company Currency</td>
                    <td>:</td>
                    <td><?php echo $currency; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">Tax Country</td>
                    <td>:</td>
                    <td><?php echo $tax_country; ?>&nbsp;</td>
                </tr>  <tr>
                <td align="right">Tax File Number</td>
                <td>:</td>
                <td><?php echo $tax_file; ?>&nbsp;</td>
                </tr>

            </table> 


        </div>

        <div class="clearfix"></div>

        <div class="form-actions">
            <input type="button" name="close" value="Close" class="btn btn-small btn-primary" onClick="self.close()">
        </div>
    </div>
</div>