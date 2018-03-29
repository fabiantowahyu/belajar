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
                <fieldset>
                    <legend><strong class="text-info">DOCUMENTS INFORMATION</strong></legend>
                    <div>
                        <?php
                        echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form',
                            'data-bv-message' => 'This value is not valid',
                            'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok',
                            'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove',
                            'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh'
                        ));
                        ?>
                        <div class="alert alert-warning fade in" id="notification_error">
                            <button class="close" data-dismiss="alert"> × </button>
                            <i class="fa-fw fa fa-info"></i>
                            <strong>Info!</strong>
                            Please carefully check every documents by clicking view attachment. All checkboxs must be checked to approve LSE Request.
                        </div>
                        <table class="table table-striped table-hover" border="0">
                            <thead>
                                <tr>
                                    <th>Documents Name</th>
                                    <th>Documents</th>
                                    <th class="text-center">Checkbox</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="NPWP">
                                    <th width="50%"><label>Nomer Pokok Wajib Pajak</label></th>
                                    <td width="35%">
                                        <?php if ($npwp_upload) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $npwp_upload; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td width="15%" class="text-center">
                                        <label>
                                            <?php echo form_checkbox('npwp_upload', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="TDP">
                                    <th><label>Tanda Daftar Perusahaan</label></th>
                                    <td>
                                        <?php if ($tdp) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $tdp; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('tdp', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="SIUP">
                                    <th><label>Surat Izin Usaha Perdagangan</label></th>
                                    <td>
                                        <?php if ($siup) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $siup; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('siup', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="SITU">
                                    <th><label>Surat Izin Tempat Usaha</label></th>
                                    <td>
                                        <?php if ($situ) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $situ; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('situ', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="PKP">
                                    <th><label>Penghasilan Kena Pajak</label></th>
                                    <td>
                                        <?php if ($pkp) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $pkp; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('pkp', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="IUPOP">
                                    <th><label>Izin Usaha Pertambangan (Operasi Produksi)</label></th>
                                    <td>
                                        <?php if ($iupop) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $iupop; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>    
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('iupop', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="IUKOP">
                                    <th><label>IUKOP </label></th>
                                    <td>
                                        <?php if ($iukop) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $iukop; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('iukop', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="PKP2B">
                                    <th><label>Perjanjian Karya Pengusahaan Pertambangan Batubara</label></th>
                                    <td>
                                        <?php if ($pkp2b) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $pkp2b; ?>', 'mywindow', 800, 600, 'yes', 'yes');
                                                    return false;">View Attachment</a>
                                               <?php
                                           } else {
                                               echo "File Not Exist";
                                               ?>
                                           <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('pkp2b', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="IUPOPKPM">
                                    <th><label>IUPOPKPM </label></th>
                                    <td>
                                        <?php if ($iupopkpm) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $iupopkpm; ?>', 'mywindow', 800, 600, 'yes', 'yes');
                                                    return false;">View Attachment</a>
                                               <?php
                                           } else {
                                               echo "File Not Exist";
                                               ?>
                                           <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('iupopkpm', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="ET">
                                    <th><label>Exporter Terdaftar</label></th>
                                    <td>
                                        <?php if ($et) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $et; ?>', 'mywindow', 800, 600, 'yes', 'yes');
                                                    return false;">View Attachment</a>
                                               <?php
                                           } else {
                                               echo "File Not Exist";
                                               ?>
                                           <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('et', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <legend>Document</legend>
                        <table class="table table-striped table-hover" border="0">
                            <thead>
                                <tr>
                                    <th>Documents Name</th>
                                    <th>Documents</th>
                                    <th class="text-center">Checkbox</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="NPWP">
                                    <th width="50%"><label>PVEB</label></th>
                                    <td width="35%">
                                        <?php if ($file_pveb) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $file_pveb; ?>', 'mywindow', 800, 600, 'yes', 'yes');
                                                    return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td width="15%" class="text-center">
                                        <label>
                                            <?php echo form_checkbox('file_pveb', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="TDP">
                                    <th><label>Packing List/ Cargo Manifest</label></th>
                                    <td>
                                        <?php if ($file_packing_list) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $file_packing_list; ?>', 'mywindow', 800, 600, 'yes', 'yes');
                                                    return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('file_packing_list', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="SIUP">
                                    <th><label>Commercial Invoice</label></th>
                                    <td>
                                        <?php if ($file_commercial_invoice) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $file_commercial_invoice; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('file_commercial_invoice', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="SITU">
                                    <th><label>Bukti Surat Setoran Bukan Pajak atau <br/>Bukti Setoran Royalti di Muka(BANK)</label></th>
                                    <td>
                                        <?php if ($file_ssbp) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $file_ssbp; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('file_ssbp', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="PKP">
                                    <th><label>Surat Blending (not mandatory)</label></th>
                                    <td>
                                        <?php if ($file_surat_blending) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $file_surat_blending; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('file_surat_blending', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="IUPOP">
                                    <th><label>Surat Pernyataan penggunaal LC</label></th>
                                    <td>
                                        <?php if ($file_spplc) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $file_spplc; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>    
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('file_spplc', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>
                                <tr id="IUKOP">
                                    <th><label>Copy L/C </label></th>
                                    <td>
                                        <?php if ($file_copylc) { ?>
                                            <a href="#"  onclick="PopUpWindow('<?php echo base_url(); ?>file_upload/client_document/<?php echo $file_copylc; ?>', 'mywindow', 800, 600, 'yes', 'yes'); return false;">View Attachment</a>
                                            <?php
                                        } else {
                                            echo "File Not Exist";
                                            ?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <label>
                                            <?php echo form_checkbox('file_copylc', 1, 0, ' class="checkbox style-0" '); ?><span class="lbl"></span>
                                        </label>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </fieldset>
                <br/><br/>
                <legend class="text-info">Step of Approval</legend>
                <div class="row">
                    <div class="col-md-12">
                        <table width="100%" cellpadding="5" cellspacing="3" border="0" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td align="center"><b>No</b></td>
                                    <td align="center"><b>Manager Designated Supervisor</b></td>
                                    <td align="center"><b>Status</b></td>
                                    <td align="center"><b>Respon Date</b></td>
                                    <td align="center"><b>Notes</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($hasil_approveby as $row) {
                                    ?>
                                    <tr>
                                        <td align="center">
                                            <?php echo $no; ?>
                                        </td>
                                        <td align="center">
                                            <?php
                                            if ($row->status == '1') {
                                                $approver_names = $row->approver_name[0];
                                                if (isset($row->approver_name[1])) {
                                                    $approver_names .= ' / ' . $row->approver_name[1];
                                                }
                                                echo $approver_names;
                                            } else {
                                                echo $row->approval_name;
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php
                                            if ($row->status == '3' || $row->status == '4') {
                                                echo $row->status_name;
                                            } elseif ($approver != $row->approved_by) {
                                                echo $row->status_name;
                                            } else {
                                                echo form_dropdown('approval_status', $option_statement, $statement, 'id ="approval_status" class="form-control" onchange="setRequired(' . $row->id . ')"');
                                                echo form_hidden('approved_by', $row->approved_by);
                                                echo form_hidden('id_approval', $row->id);
                                            }
                                            ?>
                                        </td>
                                        <td align="center" class="blue bolder smaller">
                                            <?php
                                            if (($row->respon_date) == "0000-00-00 00:00:00") {
                                                echo "N/A";
                                            } else {
                                                echo date("d M Y H:i:s", strtotime($row->respon_date));
                                            }
                                            ?>
                                        </td>
                                        <td align="center" class="blue bolder smaller">
                                            <?php
                                            if ($approver == $row->approved_by) {
                                                $txtarea = array('name' => 'remark', 'value' => $row->remark, 'rows' => 3, 'class' => 'form-control', 'id' => 'remark' . $row->id);
                                                echo form_textarea($txtarea);
                                            } else {
                                                echo $row->remark;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $no ++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="form-actions">
                            <h3 class="header smaller lighter blue"></h3>
                            <input type="hidden" name="void_notes" id="void_notes"/>
                            <?php
                            echo anchor('Lse_approval', '<i class="fa fa-reply"></i>&nbsp;Back', array('class' => 'btn btn-small btn-info'));
                            echo nbs(1);
                            echo form_hidden('id_lse', $id_lse);
                            echo form_hidden('no_lse', $no_lse);
                            ?>
                            <?php if ($row->status == '1') { ?>
                                <button type="submit" name="btn_send" value="Done" class="btn btn-small btn-warning"><i class="fa fa-save"></i> Submit</button> &nbsp; 
                            <?php } ?>
                            <?php if ($last_status == '3') { ?>
                                <button name="btn_void" value="Void" class="btn btn-small btn-danger" onclick="void_request()"><i class="icon-save"></i> Void</button> &nbsp; 
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <!-- end widget content -->
            </div>
            <!-- end widget div -->

            <!-- end widget -->
        </article>
    </div>

</div>


<script type="text/javascript">
    function void_request() {
        void_notes = prompt('Please enter notes here');
        if (name) {
            $('#void_notes').val(void_notes);
            document.getElementById(validation - form).submit();
        }
    }
</script>