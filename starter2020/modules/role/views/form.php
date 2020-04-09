
<h2>Role</h2>

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

<?php echo form_open(site_url('role/' . $action),'role="form" class="form-horizontal" id="form_role" parsley-validate'); ?>               
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
                                 set_value('name',$role['name'])
                           );             
                  ?>
                 <?php echo form_error('name');?>
                </div>
              </div> <!--/ Name -->
                          
               <div class="form-group">
                   <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_textarea(
                            array(
                                'id'            =>'description',
                                'name'          =>'description',
                                'rows'          =>'3',
                                'class'         =>'form-control input-sm ',
                                'placeholder'   =>'Description',
                                
                                ),
                            set_value('description',$role['description'])                           
                            );             
                  ?>
                 <?php echo form_error('description');?>
                </div>
              </div> <!--/ Description -->
                          
               <div class="form-group">
                   <label for="isactive" class="col-sm-2 control-label">Aktif <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_radio(
                            array(
                                 'name'  => 'isactive',
                                 'id'    => 'isactive',  
                                 'value'=>'1',                     
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

                   <a href="<?php echo site_url('role'); ?>" class="btn btn-default">
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