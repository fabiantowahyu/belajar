<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <legend>
	<h4> <i class="fa fa-user bigger-125 txt-color-blue"></i><strong><strong>
	    <?php
	    echo anchor('profile', $title, array('class' => 'link-control'));
	    ?></strong>
	</h4>
    </legend>

    <section id="widget-grid" class="">
        <!-- row -->





	<div class="row">
	    <div class="col-xs-12 col-sm-3 text-center">
		<span class="profile-picture "  >
		    <img class=" center-block well well-light well-sm  editable img-responsive" id="Photo"  alt="Alex's Avatar" id="avatar2" src="<?php echo base_url() . $avatar; ?>" />
		</span>

		<div class="space space-4"></div>
<!--
		<a href="#" class="btn btn-sm btn-block btn-success">
		    <i class="ace-icon fa fa-plus-circle bigger-120"></i>
		    <span class="bigger-110">Add as a friend</span>
		</a>

		<a href="#" class="btn btn-sm btn-block btn-primary">
		    <i class="ace-icon fa fa-envelope-o bigger-110"></i>
		    <span class="bigger-110">Send a message</span>
		</a> -->
	    </div><!-- /.col -->

	    <div class="col-xs-12 col-sm-9">
		<h4 class="blue">
		    <span class="middle"><?php  echo $client_name;  ?></span> <span class="label label-success"><i class="fa fa-circle smaller-120 align-middle"></i> Online</span>

		  
		</h4><br/>
		
		
		<table class="table  table-striped" cellpadding="3" cellspacing="3">
		    <tr>
			<td width="20%" align="right">PIC</td>
			<td width="10">:</td>
			<td><?php  echo $pic;  ?>&nbsp;</td>
		    </tr>
		    <tr>
			<td width="20%" align="right">Username</td>
			<td width="10">:</td>
			<td><?php // echo $id;  ?>&nbsp;</td>
		    </tr>
		    <tr>
			<td align="right">Location</td>
			<td>:</td>
			<td><i class="fa fa-map-marker light-orange bigger-110"></i> <?php //echo $client_name;  ?>&nbsp;</td>
		    </tr>
		    
		    <tr>
			<td align="right">Joined</td>
			<td>:</td>
			<td><?php // echo $email;  ?>&nbsp;</td>
		    </tr> 
		    <tr>
			<td align="right"> Last Online</td>
			<td>:</td>
			<td><?php // echo $phone;  ?>&nbsp;</td>
		    </tr>
		   
			
		</table> 


		<div class="hr hr-8 dotted"></div>


	    </div><!-- /.col -->
	</div><!-- /.row -->

	<div class="space-20"></div>
	
<legend>Contact</legend>


	
<div class="col-md-12">
<table class="table  table-striped" cellpadding="3" cellspacing="3">
		    <tr>
			<td width="20%" align="right">Email</td>
			<td width="10">:</td>
			<td><?php  echo $email;  ?>&nbsp; </td>
		    </tr>
		    
		    <tr>
			<td align="right">Phone</td>
			<td>:</td>
			<td><?php  echo $phone;  ?>&nbsp;</td>
		    </tr>
		    <tr>
			<td align="right">Hp</td>
			<td>:</td>
			<td><?php  echo $hp;  ?>&nbsp;</td>
		    </tr> 
		    <tr>
			<td align="right"> Fax</td>
			<td>:</td>
			<td><?php  echo $fax;  ?>&nbsp;</td>
		    </tr>
		    <tr>
			<td align="right"> Address</td>
			<td>:</td>
			<td><?php echo $address;  ?>&nbsp;</td>
		    </tr>
		  
		</table> 
</div>
<div class="clearfix"></div>
	<!-- NEW WIDGET START -->
    </section>
</div>


