
<h2>Permissions</h2>

<?php 
    echo $this->session->flashdata('notify');
?>


<!-- <div class="row">
    <div class="col-lg-12 col-md-12">        
        <?php 
                
                echo create_breadcrumb();        
                echo $this->session->flashdata('notify');
                
    ?>
    </div>
</div> -->

<?php echo form_open(site_url('permissions/' . $action),'role="form" class="form-horizontal" id="form_permissions" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-pencil-alt"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Name <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'name',
                                 'id'           => 'name',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Name',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('name',$permissions['name'])
                           );             
                  ?>
                 <?php echo form_error('name');?>
                </div>
              </div> <!--/ Name -->
                          
               <div class="form-group">
                   <label for="description" class="col-sm-2 control-label">Description <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'description',
                                 'id'           => 'description',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Description',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('description',$permissions['description'])
                           );             
                  ?>
                 <?php echo form_error('description');?>
                </div>
              </div> <!--/ Description -->
                          
               <div class="form-group">
                   <label for="isactive" class="col-sm-2 control-label">Isactive</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_radio(
                            array(
                                 'name'  => 'isactive',
                                 'id'    => 'isactive',                       
                                 'class' => 'form-control input-sm ',                                 
                                 ) 
                           );             
                  ?>
                 <?php echo form_error('isactive');?>
                </div>
              </div> <!--/ Isactive -->
                          
               <div class="form-group">
                   <label for="create" class="col-sm-2 control-label">Create</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_checkbox(
                            array(
                                 'name'  => 'create',
                                 'id'    => 'create',                       
                                 'class' => 'form-control input-sm ',                                 
                                 )
                            )             
                  ?>
                 <?php echo form_error('create');?>
                </div>
              </div> <!--/ Create -->
                          
               <div class="form-group">
                   <label for="read" class="col-sm-2 control-label">Read</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_checkbox(
                            array(
                                 'name'  => 'read',
                                 'id'    => 'read',                       
                                 'class' => 'form-control input-sm ',                                 
                                 )
                            )             
                  ?>
                 <?php echo form_error('read');?>
                </div>
              </div> <!--/ Read -->
                          
               <div class="form-group">
                   <label for="update" class="col-sm-2 control-label">Update</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_checkbox(
                            array(
                                 'name'  => 'update',
                                 'id'    => 'update',                       
                                 'class' => 'form-control input-sm ',                                 
                                 )
                            )             
                  ?>
                 <?php echo form_error('update');?>
                </div>
              </div> <!--/ Update -->
                          
               <div class="form-group">
                   <label for="delete" class="col-sm-2 control-label">Delete</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_checkbox(
                            array(
                                 'name'  => 'delete',
                                 'id'    => 'delete',                       
                                 'class' => 'form-control input-sm ',                                 
                                 )
                            )             
                  ?>
                 <?php echo form_error('delete');?>
                </div>
              </div> <!--/ Delete -->
                          
               <div class="form-group">
                   <label for="setup" class="col-sm-2 control-label">Setup</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_checkbox(
                            array(
                                 'name'  => 'setup',
                                 'id'    => 'setup',                       
                                 'class' => 'form-control input-sm ',                                 
                                 )
                            )             
                  ?>
                 <?php echo form_error('setup');?>
                </div>
              </div> <!--/ Setup -->
                          
               <div class="form-group">
                   <label for="report" class="col-sm-2 control-label">Report</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_checkbox(
                            array(
                                 'name'  => 'report',
                                 'id'    => 'report',                       
                                 'class' => 'form-control input-sm ',                                 
                                 )
                            )             
                  ?>
                 <?php echo form_error('report');?>
                </div>
              </div> <!--/ Report -->
                          
               <div class="form-group">
                   <label for="print" class="col-sm-2 control-label">Print</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_checkbox(
                            array(
                                 'name'  => 'print',
                                 'id'    => 'print',                       
                                 'class' => 'form-control input-sm ',                                 
                                 )
                            )             
                  ?>
                 <?php echo form_error('print');?>
                </div>
              </div> <!--/ Print -->
                          
               <div class="form-group">
                   <label for="export" class="col-sm-2 control-label">Export</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_checkbox(
                            array(
                                 'name'  => 'export',
                                 'id'    => 'export',                       
                                 'class' => 'form-control input-sm ',                                 
                                 )
                            )             
                  ?>
                 <?php echo form_error('export');?>
                </div>
              </div> <!--/ Export -->
                          
               <div class="form-group">
                   <label for="import" class="col-sm-2 control-label">Import</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_checkbox(
                            array(
                                 'name'  => 'import',
                                 'id'    => 'import',                       
                                 'class' => 'form-control input-sm ',                                 
                                 )
                            )             
                  ?>
                 <?php echo form_error('import');?>
                </div>
              </div> <!--/ Import -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <!-- <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"> -->
              <div class="col-md-12 col-sm-12 col-lg-12 text-right">

                   <a href="<?php echo site_url('permissions'); ?>" class="btn btn-default">
                       <i class="fa fa-chevron-left"></i> Kembali
                   </a> 
                    <button type="submit" class="btn btn-primary" name="post">
                        <i class="fa fa-save"></i> Simpan 
                    </button>                  
              </div>
          </div>
    </div><!--/ Panel Footer -->       
</div><!--/ Panel -->
<?php echo form_close(); ?>  