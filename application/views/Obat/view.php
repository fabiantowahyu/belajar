<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title; ?>
	    <?php
	    echo nbs(2);
	    echo anchor('dokter/CTRL_New', '<i class="fa fa-plus"></i>', array('class' => 'btn btn-info btn-xs'));
	    ?>
	</h2>
	<div class="col-lg-12">
	    <?php
	    if (!empty($breadcrum))
		echo $breadcrum;
	    ?>

	</div>


    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
	<div class="col-lg-12">
	    <div class="ibox float-e-margins">
		<div class="ibox-title">
		    <h5><i class="fa fa-table "></i> Table <small>Master Type</small></h5>
		    <div class="ibox-tools">
			<a class="collapse-link">
			    <i class="fa fa-chevron-up"></i>
			</a>
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			    <i class="fa fa-wrench"></i>
			</a>
			<ul class="dropdown-menu dropdown-user">
			    <li><a href="#">Config option 1</a>
			    </li>
			    <li><a href="#">Config option 2</a>
			    </li>
			</ul>
			<a class="close-link">
			    <i class="fa fa-times"></i>
			</a>
		    </div>
		</div>
		<div class="ibox-content">
		    <div class="table-responsive">
			<table id="dt_basic" class="table table-striped table-bordered table-hover dataTables-example">
			   <thead class="danger">
                                    <tr>
                                        <th width="100">Kode Obat</th>
                                        <th width="150">Nama</th> 
                                        <th width="150">Merk</th> 
                                        <th width="50">Satuan</th> 
                                        <th width="50">Harga Jual</th> 
                                        <th width="10" class="center">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($results as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->id_obat; ?></td>
                                        <td><?php echo $row->nama; ?></td>
                                        <td><?php echo $row->merk; ?></td>
                                        <td><?php echo $row->satuan; ?></td>
                                        <td><?php echo $row->harga_jual; ?></td>
                                        <td class="center">
                                            <?php 
                                                                      echo anchor('obat/CTRL_Edit/' . $row->id_obat, '<button class="btn btn-xs btn-primary"><i class="fa fa-pencil bigger-120"></i></button>');
                                            ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
			</table>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>