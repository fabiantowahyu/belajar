<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<br>
<div class="row-fluid">



    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->

            <header>

            </header>

            <!-- widget div-->
            <div>
                <!-- widget edit box -->
                <!-- <div class="jarviswidget-editbox">
This area used as dropdown edit box
</div> -->
                <!-- end widget edit box -->

                <!-- widget content -->
                <fieldset>
                    <div class="col-md-12">
                        <legend><strong class="text-info">Documents</strong></legend>
                        <div class="col-md-8">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Document Type</th>
                                        <th class="text-center">File</th>
                                         <th class="text-center">Reg.No / Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PVEB</td>
                                        <td class="text-center"><?php echo $file_pveb ? "<a target='_blank' href='" . base_url() . "file_upload/client_document/" . $file_pveb . "' class='label label-success'>$file_pveb</a>" : '-'; ?></td>
                                        <td class="text-center"><?php echo $no_pveb;?>  <?php echo $date_pveb!='0000-00-00' ? ' / ' .date('d F Y',strtotime($date_pveb)):' - ';?></td>
                                        <td class="text-center"><?php echo $file_pveb ? "<i class='fa fa-check txt-color-green'></i>" : "<i class='fa fa-remove txt-color-red'></i>"; ?></td>

                                    </tr>
                                    <tr>
                                        <td>Packing List/ Cargo Manifest</td>
                                        <td class="text-center "><?php echo $file_packing_list ? "<a target='_blank' href='" . base_url() . "file_upload/client_document/" . $file_packing_list . "' class='label label-success'>$file_packing_list</a>" : '-'; ?></td>
                                        <td class="text-center"> - </td>
                                        <td class="text-center"><?php echo $file_packing_list ? "<i class='fa fa-check txt-color-green'></i>" : "<i class='fa fa-remove txt-color-red'></i>"; ?></td>

                                    </tr>
                                    <tr>
                                        <td>Commercial Invoice</td>
                                        <td class="text-center"><?php echo $file_commercial_invoice ? "<a target='_blank' href='" . base_url() . "file_upload/client_document/" . $file_commercial_invoice . "'class='label label-success'>$file_commercial_invoice</a>" : '-'; ?></td>
                                        <td class="text-center"> - </td>
                                        <td class="text-center"><?php echo $file_commercial_invoice ? "<i class='fa fa-check txt-color-green'></i>" : "<i class='fa fa-remove txt-color-red'></i>"; ?></td>

                                    </tr>
                                    <tr>
                                        <td>Bukti Surat Setoran Bukan Pajak atau <br/>Bukti Setoran Royalti di Muka(BANK)</td>
                                        <td class="text-center"><?php echo $file_ssbp ? "<a target='_blank' href='" . base_url() . "file_upload/client_document/" . $file_ssbp . "' class='label label-success'>$file_ssbp</a>" : '-'; ?></td>
                                        <td class="text-center"> - </td>
                                        <td class="text-center"><?php echo $file_ssbp ? "<i class='fa fa-check txt-color-green'></i>" : "<i class='fa fa-remove txt-color-red'></i>"; ?></td>

                                    </tr>
                                    <tr>
                                        <td>Surat Blending (not mandatory)</td>
                                        <td class="text-center"><?php echo $file_surat_blending ? "<a target='_blank' href='" . base_url() . "file_upload/client_document/" . $file_surat_blending . "'  class='label label-success'>$file_surat_blending</a>" : '-'; ?></td>
                                        <td class="text-center"> - </td>
                                        <td class="text-center"><?php echo $file_surat_blending ? "<i class='fa fa-check txt-color-green'></i>" : "<i class='fa fa-remove txt-color-red'></i>"; ?></td>

                                    </tr>
                                    <tr>
                                        <td>Surat Pernyataan penggunaal LC</td>
                                        <td class="text-center"><?php echo $file_spplc ? "<a target='_blank' href='" . base_url() . "file_upload/client_document/" . $file_spplc . "' class='label label-success'>$file_spplc</a>" : '-'; ?></td>
                                        <td class="text-center"> - </td>
                                        <td class="text-center"><?php echo $file_spplc ? "<i class='fa fa-check txt-color-green'></i>" : "<i class='fa fa-remove txt-color-red'></i>"; ?></td>

                                    </tr>
                                    <tr>
                                        <td>Copy L/C</td>
                                        <td class="text-center" ><?php echo $file_copylc ? "<a target='_blank' href='" . base_url() . "file_upload/client_document/" . $file_copylc . "' class='label label-success'>$file_copylc</a>" : '-'; ?></td>
                                        <td class="text-center"> - </td>
                                        <td class="text-center"><?php echo $file_copylc ? "<i class='fa fa-check txt-color-green'></i>" : "<i class='fa fa-remove txt-color-red'></i>"; ?></td>

                                    </tr>

                                </tbody>

                            </table>
                        </div>
                        <div class="clearfix"></div><br/>
                        <legend><strong class="text-info">Upload Documents</strong></legend>
                        <br/>
                        <?php
                        echo form_open_multipart($url, array('class' => 'form-horizontal', 'id' => 'form-upload',
                        ));
                        ?>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="TypeID" class="col-md-4 control-label" >Document Type<span class="text-danger"> *</span></label>
                                <div class="col-md-6" >
                                    <?php
                                    echo form_dropdown('document_type', $option_document, '', 'id ="document_type" class="form-control" data-bv-notempty="true" ');
                                    ?>
                                </div>

                            </div>
                            <div id="pveb" style="display: none;">
                                <div class="form-group">
                                    <label for="TypeID" class="col-md-4 control-label" >No PVEB<span class="text-danger"> *</span></label>
                                    <div class="col-md-6" >
                                        <input type="text" name="no_pveb" class="form-control" placeholder="Nomor PVEB"  data-bv-notempty = "true">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="TypeID" class="col-md-4 control-label" >Registered Date<span class="text-danger"> *</span></label>
                                    <div class="col-md-6" > 
                                        <?php
                                        $input = array('name' => 'date_pveb', 'placeholder' => "Tanggal PVEB",'data-dateformat' => 'yy-mm-dd', 'class' => 'form-control datepicker ', 'data-bv-notempty' => 'true');
                                        echo form_input($input);
                                        ?>

                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="TypeID" class="col-md-4 control-label">Upload Document<span class="text-danger"> *</span></label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="file_upload" id="id-input-file-1" accept=".pdf" data-bv-notempty ="true">
                                    <input type="hidden" value="<?php echo $exporter;?>" name="client_id">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div><br/>
                        <div class="col-md-8"><i><strong><span class="text-danger">*</span>) Required</strong></i>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-right"> 

                                            <button type="submit" name="btn_upload" value="Save" class="btn btn-small btn-primary"><i class="fa fa-upload"></i> Upload</button></div>
                                    </div>  </div></div>
                        </div>
                        <?php echo form_close(); ?>



                    </div>
                </fieldset>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            echo anchor('lse', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                            echo nbs(1);
                            echo form_hidden('id', $id);
                            ?>

                        </div>
                    </div>
                </div>

                <!-- end widget content -->
            </div>
            <!-- end widget div -->

            <!-- end widget -->
        </article>
    </div>

</div>