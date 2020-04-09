
<h2>Role Permissions</h2>

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

<?php echo form_open(site_url('role_permissions/' . $action),'role="form" class="form-horizontal" id="form_role_permissions" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-pencil-alt"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="role_id" class="col-sm-2 control-label">Role <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'role_id',
                           $role,  
                           set_value('role_id',$role_permissions['role_id']),
                           'class="form-control input-sm  required"  id="role_id"'
                           );             
                  ?>
                 <?php echo form_error('role_id');?>
                </div>
              </div> <!--/ Role -->
                          
               <div class="form-group">
                   <label for="perm_id" class="col-sm-2 control-label">Perm <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'perm_id',
                           $perm,  
                           set_value('perm_id',$role_permissions['perm_id']),
                           'class="form-control input-sm  required"  id="perm_id"'
                           );             
                  ?>
                 <?php echo form_error('perm_id');?>
                </div>
              </div> <!--/ Perm -->
                          
               <div class="form-group">
                   <label for="isactive" class="col-sm-2 control-label">Isactive <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_radio(
                            array(
                                 'name'  => 'isactive',
                                 'id'    => 'isactive',                       
                                 'class' => 'form-control input-sm  required',                                 
                                 ) 
                           );             
                  ?>
                 <?php echo form_error('isactive');?>
                </div>
              </div> <!--/ Isactive -->
                          
               <div class="form-group">
                   <label for="module_id" class="col-sm-2 control-label">Module</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'module_id',
                           $module,  
                           set_value('module_id',$role_permissions['module_id']),
                           'class="form-control input-sm "  id="module_id"'
                           );             
                  ?>
                 <?php echo form_error('module_id');?>
                </div>
              </div> <!--/ Module -->
                          
               <div class="form-group">
                   <label for="class" class="col-sm-2 control-label">Class</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'class',
                                 'id'           => 'class',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Class',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('class',$role_permissions['class'])
                           );             
                  ?>
                 <?php echo form_error('class');?>
                </div>
              </div> <!--/ Class -->
                          
               <div class="form-group">
                   <label for="method" class="col-sm-2 control-label">Method</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'method',
                                 'id'           => 'method',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Method',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('method',$role_permissions['method'])
                           );             
                  ?>
                 <?php echo form_error('method');?>
                </div>
              </div> <!--/ Method -->
                          
               <div class="form-group">
                   <label for="params" class="col-sm-2 control-label">Params</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'params',
                                 'id'           => 'params',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Params',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('params',$role_permissions['params'])
                           );             
                  ?>
                 <?php echo form_error('params');?>
                </div>
              </div> <!--/ Params -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <!-- <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"> -->
              <div class="col-md-12 col-sm-12 col-lg-12 text-right">

                   <a href="<?php echo site_url('role_permissions'); ?>" class="btn btn-default">
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