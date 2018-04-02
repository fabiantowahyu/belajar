<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row-fluid">
    <legend>
        <h3>
            <?php 
            echo anchor('diagnosa', $title, array('class'=>'link-control')); 
            echo nbs(2);
            echo anchor('diagnosa/CTRL_New', '<i class="fa fa-plus"></i>', array('class'=>'btn btn-success btn-mini'));
            ?>
        </h3>
    </legend>

    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-colorbutton="false"
                     data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="true" 
                     >
                    <!-- widget options:
usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

data-widget-colorbutton="false"
data-widget-editbutton="false"
data-widget-togglebutton="false"
data-widget-deletebutton="false"
data-widget-fullscreenbutton="false"
data-widget-custombutton="false"
data-widget-collapsed="true"
data-widget-sortable="false"

-->
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Row Tables </h2>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <!-- <div class="jarviswidget-editbox">
This area used as dropdown edit box

</div> -->
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                <thead class="danger">
                                    <tr>
                                        <th width="100">Kode Tindakan</th>
                                        <th width="150">Nama</th> 
                                        <th width="150">Poli</th> 
                                        <th width="10" class="center">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($results as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->id_diagnosa; ?></td>
                                        <td><?php echo $row->nama; ?></td>
                                        <td><?php echo $row->poli; ?></td>
                                        <td class="center">
                                            <?php 
                                                                      echo anchor('diagnosa/CTRL_Edit/' . $row->id_diagnosa, '<button class="btn btn-xs btn-primary"><i class="fa fa-pencil bigger-120"></i></button>');
                                            ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- end widget content -->

                    </div>
                    <!-- end widget div -->

                </div>
                <!-- end widget -->

                </div>
            </section>
        </div>