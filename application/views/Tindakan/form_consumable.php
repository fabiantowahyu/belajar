<div class="ibox-content">
		    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>

		      <div class="form-group">
                    <label for="TypeName" class="col-md-2 control-label">Nama Produk</label>
                    <div class="col-md-4">
                        <?php
                        $input = array('name' => 'nama', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                   
                <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Jumlah</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'jumlah', 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>


                
		    <div class="hr-line-dashed"></div>

		    <div class="form-group">
                        <div class="pull-right">
                            <div class="col-md-12">
				
                                <button type="submit" name="btn_submit_consumable" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button> &nbsp;
                                <a href="#" id="cdelete" data-toggle="modal" data-target="#myModal" class="btn btn-small btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                            </div>
                        </div>
                    </div>

		    <?php echo form_close(); ?>
		   
                    
                    <div class="col-md-12">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <td> No</td>
                                    <td> Nama Produk</td>
                                    <td> Jumlah</td>
                                    <td> Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $no=1;  foreach ($results_consumable as $row) { ?>
                                
                              
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $row->nama_produk;?></td>
                                    <td><?php echo $row->jumlah;?></td>
                                    <td> <a class="btn btn-xs btn-danger" href="<?php echo base_url();?>tindakan/deleteConsumable/<?php echo $row->id.'/'.$id_tindakan;?>"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                  <?php
                                                        }
                                ?>
                            </tbody>
                            
                        </table>
                        
                        
                    </div>              
                    
                    
                    
		</div>