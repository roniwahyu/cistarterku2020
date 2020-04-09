
<h2>Groups Permissions</h2>

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

<?php echo form_open(site_url('groups_permissions/' . $action),'role="form" class="form-horizontal" id="form_groups_permissions" parsley-validate'); ?>        
<input type="hidden" class="form-control input-sm hidden" name="id" id="<?php echo !empty($groups_permissions['id'])?$groups_permissions['id']:'' ?>" value="<?php echo !empty($groups_permissions['id'])?$groups_permissions['id']:'' ?>">       
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-pencil-alt"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="groups_id" class="col-sm-2 control-label">Groups <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'groups_id',
                           $groups,  
                           set_value('groups_id',$groups_permissions['groups_id']),
                           'class="form-control input-sm  required"  id="groups_id"'
                           );             
                  ?>
                 <?php echo form_error('groups_id');?>
                </div>
              </div> <!--/ Groups -->
                          
               <div class="form-group">
                   <label for="perm_id" class="col-sm-2 control-label">Perm <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'perm_id',
                           $perm,  
                           set_value('perm_id',$groups_permissions['perm_id']),
                           'class="form-control input-sm  required"  id="perm_id"'
                           );             
                  ?>
                 <?php echo form_error('perm_id');?>
                </div>
              </div> <!--/ Perm -->
                          
               <div class="form-group">
                   <label for="isactive" class="col-sm-2 control-label">Isactive</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'isactive',
                                 'id'           => 'isactive',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Isactive',
                                 
                                 ),
                                 set_value('isactive',$groups_permissions['isactive'])
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

                   <a href="<?php echo site_url('groups_permissions'); ?>" class="btn btn-default">
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
<script type="text/javascript">
    $('form').on('submit',function(e){
        e.preventDefault();
        // $(this).parsley().validate();
        var isvalid=$('form').parsley();
        var data = $('form').serializeArray();

        if(isvalid.isValid()===true){
            $('.modal').modal('toggle');
            $.ajax({
                url:baseurl+'save',
                type:'POST',
                data:data,
                // dataType:"html",
                success: function(msg) {
                        alert('Sukses');
                    }
            })
            dtables.ajax.reload()
        };
        console.log(isvalid.isValid());
    });
    

</script>