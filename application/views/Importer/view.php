<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <legend>
        <h3>
            <?php
            echo anchor('importer', $title, array('class' => 'link-control'));
            echo nbs(2);
            echo anchor('importer/CTRL_New', '<i class="fa fa-plus"></i>', array('class' => 'btn btn-success btn-mini', 'data-rel' => 'tooltip', 'title' => 'Add Customer'));
            ?>
        </h3>
    </legend>

    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="true">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Row Tables </h2>
                    </header>
                    <div>
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                <thead class="danger">
                                    <tr>
                                        <th style="text-align: center">ID</th>
                                        <th>Name</th>
                                        <th>PIC</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th style="text-align: center">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($results as $row) { ?>
                                        <tr>
                                            <td style="text-align: center"><a href="#" onclick="PopUpWindow('<?php echo $url_view . $row->importer_id; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;"><?php echo $row->importer_id; ?></a></td>
                                            <td><?php echo $row->importer_name; ?></td>
                                            <td><?php echo $row->pic; ?></td>
                                            <td><?php echo $row->phone; ?></td>
                                            <td><?php echo $row->email; ?></td>

                                            <td style="text-align: center">
                                                <?php
                                                echo anchor('importer/CTRL_Edit/' . $row->importer_id, '<button class="btn btn-xs btn-primary"><i class="fa fa-edit bigger-120"></i></button>');
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
    
</div>