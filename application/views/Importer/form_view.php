<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<br/>
<div class="row-fluid">
    <div class="col-sm-12  well well-light well-sm">
        <h3 class="black">
            <span class="middle"><?php echo $title_head; ?> - View</span>
        </h3>
        <legend>General</legend>
        <div class="col-sm-12">
            <table class="table  table-striped" cellpadding="3" cellspacing="3">
                <tr>
                    <td width="20%" align="right"><?php echo $title; ?> ID</td>
                    <td width="10">:</td>
                    <td><?php echo $id; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right"><?php echo $title; ?> Name</td>
                    <td>:</td>
                    <td><?php echo $importer_name; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">PIC</td>
                    <td>:</td>
                    <td><?php echo $pic; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right">Email</td>
                    <td>:</td>
                    <td><?php echo $email; ?>&nbsp;</td>
                </tr> 
                <tr>
                    <td align="right"> Phone</td>
                    <td>:</td>
                    <td><?php echo $phone; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right"> Fax</td>
                    <td>:</td>
                    <td><?php echo $fax; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td align="right"> Address</td>
                    <td>:</td>
                    <td><?php echo $address; ?>&nbsp;</td>
                </tr>
            </table> 
        </div>        
<div class="clearfix"></div>
        <div class="form-actions">
            <input type="button" name="close" value="Close" class="btn btn-small btn-primary" onClick="self.close()">
        </div>
    </div>
</div>
