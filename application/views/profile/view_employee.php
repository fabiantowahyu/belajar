<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <legend>
	<h4> <i class="fa fa-user bigger-125 txt-color-blue"></i><strong>
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
		    <span class="middle"><?php  echo $employee_name;  ?></span> <span class="label label-success"><i class="fa fa-circle smaller-120 align-middle"></i> Online</span>

		  
		</h4><br/>
		
		
		<table class="table  table-striped" cellpadding="3" cellspacing="3">
		    
		    <tr>
			<td width="20%" align="right"><span class="txt-color-blueDark">Username</span></td>
			<td width="10">:</td>
			<td><?php  echo $username;  ?>&nbsp;</td>
		    </tr>
		    <tr>
			<td align="right"><span class="txt-color-blueDark">Work Location</span></td>
			<td>:</td>
			<td><i class="fa fa-map-marker light-orange bigger-110"></i> <?php echo $branch_id;  ?>&nbsp;</td>
		    </tr>
		    
		    <tr>
			<td align="right"><span class="txt-color-blueDark">Joined</span></td>
			<td>:</td>
			<td><?php  echo $join_date;  ?>&nbsp;</td>
		    </tr> 
		    <tr>
			<td align="right"><span class="txt-color-blueDark"> Last Online</span></td>
			<td>:</td>
			<td><?php  echo $last_login;  ?>&nbsp;</td>
		    </tr>
		   
			
		</table> 


		<div class="hr hr-8 dotted"></div>


	    </div><!-- /.col -->
	</div><!-- /.row -->

	<div class="space-20"></div>
<legend>Contact</legend>


	<div class="col-sm-12 col-lg-12">

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
			<td align="right"> Address</td>
			<td>:</td>
			<td><?php echo $address;  ?>&nbsp;</td>
		    </tr>
		  
		</table> 

	</div>

<legend>Other Information</legend>

<div class="col-sm-12 col-lg-6">
	

<table class="table  table-striped" cellpadding="3" cellspacing="3">
		    <tr>
			<td width="20%" align="right"><span class="txt-color-blueDark">Birth Place</span></td>
			<td width="10">:</td>
			<td><?php  echo $birth_place;  ?>&nbsp; </td>
		    </tr>
		    
		    <tr>
			<td align="right"><span class="txt-color-blueDark">Birth Date</span></td>
			<td>:</td>
			<td><?php  echo $birth_date;  ?>&nbsp;</td>
		    </tr>
		    <tr>
			<td align="right"><span class="txt-color-blueDark">Religion</span></td>
			<td>:</td>
			<td><?php  echo $religion;  ?>&nbsp;</td>
		    </tr> 
		    
		    
		  
		</table> 
	<!-- NEW WIDGET START -->
	
</div>

<div class="col-sm-12 col-lg-6">
	

<table class="table  table-striped" cellpadding="3" cellspacing="3">
		  
		    <tr>
			<td align="right"><span class="txt-color-blueDark"> Marital Status</span></td>
			<td>:</td>
			<td><?php echo $marital_status;  ?>&nbsp;</td>
		    </tr>
		    <tr>
			<td align="right"> <span class="txt-color-blueDark">Marital Place</span></td>
			<td>:</td>
			<td><?php echo $marital_place;  ?>&nbsp;</td>
		    </tr>
		    <tr>
			<td align="right"> <span class="txt-color-blueDark">Marital Date</span></td>
			<td>:</td>
			<td><?php echo $marital_date;  ?>&nbsp;</td>
		    </tr>
		  
		</table> 
	<!-- NEW WIDGET START -->
	
</div>
<div class="clearfix"></div>
    </section>
</div>


<script type="text/javascript">

</script>