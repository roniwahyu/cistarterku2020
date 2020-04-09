
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

<section class="panel panel-default">
    <header class="panel-heading">
        <div class="row">
          <div class="col-md-12 col-xs-12" style="margin-top: 10px;margin-bottom: 20px;">    

                   <?php

                       $remote=base_url('groups_permissions/add/');
                       $target="#kt_modal_4 .modal-body";
                       
                       echo themodal('genmodal','<i class="fa fa-plus"></i> Tambah','kt_modal_4','panel-success','lazur-bg','<i class="fa fa-info-circle"></i> Tambah','btn-success btn-sm','modal-lg',$remote,$target); 
                       ?>            
                
            </div>
         
           
            </form> 
        </div>
    </header>
    
    
    <div class="panel-body">
         <?php if ($groups_permissionss) : ?>
         <div class="container-fluid">
            <table id="datatables" class="table table-hover table-condensed table-striped table-responsive" style="width: 100%;display:table-cell" width="100%">
                
              <thead>
                <tr>
                  <th class="header">#</th>
                  
                      <th>Groups</th>   
                  
                      <th>Perm</th>   
                  
                      <th>Isactive</th>   
                  
                      <th>Userid</th>   
                  
                      <th>Created</th>   
                  
                      <th>Modified</th>   
                  
                  <th class="red header" align="right" width="120">Aksi</th>
                </tr>
              </thead>
              
              
              <tbody>
                  <tr><td colspan="2">Loading</td></tr>
              </tbody>
            </table>
          </div>
          <?php else: ?>
                <?php  echo notify('Data groups_permissions belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
          
        </div>
    </div>
</section>