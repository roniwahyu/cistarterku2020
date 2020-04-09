
<h2>Users Permissions</h2>

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

<?php echo form_open(site_url('users_permissions/' . $action),'role="form" class="form-horizontal" id="form_users_permissions" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-pencil-alt"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="user_id" class="col-sm-2 control-label">User <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'user_id',
                                 'id'           => 'user_id',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'User',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('user_id',$users_permissions['user_id'])
                           );             
                  ?>
                 <?php echo form_error('user_id');?>
                </div>
              </div> <!--/ User -->
                          
               <div class="form-group">
                   <label for="perm_id" class="col-sm-2 control-label">Perm <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'perm_id',
                                 'id'           => 'perm_id',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Perm',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('perm_id',$users_permissions['perm_id'])
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
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <!-- <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"> -->
              <div class="col-md-12 col-sm-12 col-lg-12 text-right">

                   <a href="<?php echo site_url('users_permissions'); ?>" class="btn btn-default">
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