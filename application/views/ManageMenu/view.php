<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row-fluid">
    <h3 class="header smaller lighter blue">
        <?php 
        echo anchor('manage_menu', $title, array('class'=>'link-control')); 
        echo nbs(2);
        echo anchor('manage_menu/CTRL_New', '<i class="fa fa-plus"></i>', array('class'=>'btn btn-success btn-mini'));
        ?>
    </h3>

    <section id="widget-grid" class="">
        <!-- row -->		
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-colorbutton="false"
                     data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="true" 
                     >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Row Tables </h2>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                <thead class="success">
                                    <tr>
                                        <th width="200">Custom Title</th>
                                        <th width="200">Parent</th> 
                                        <th width="150">URL</th> 
                                        <th width="50">Order</th> 
                                        <th width="100">Status</th> 
                                        <th width="10" class="center">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($results as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->custom_title; ?></td>
                                        <td><?php echo $row->parentt; ?></td>
                                        <td><?php echo $row->url_menu; ?></td>
                                        <td><?php echo $row->tid; ?></td>
                                        <td><?php echo $row->active; ?></td>
                                        <td class="center">
                                            <?php 
                                                                      echo anchor('manage_menu/CTRL_Edit/' . $row->id, '<button class="btn btn-xs btn-primary"><i class="fa fa-pencil bigger-120"></i></button>');
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
            </article>
        </div>
    </section>
</div>
