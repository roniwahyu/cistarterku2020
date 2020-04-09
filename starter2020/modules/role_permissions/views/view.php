
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

<section class="panel panel-default">
    <header class="panel-heading">
        <div class="row">
            <div class="col-md-8 col-xs-3">                
                <?php
                      echo anchor(
                               site_url('role_permissions/add'),
                                '<i class="fa fa-plus"></i> Tambah',
                                'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah Data"'
                              );
                ?>
            </div>
           
            </form> 
        </div>
    </header>
    
    
    <div class="panel-body">
         <?php if ($role_permissionss) : ?>
          <table id="datatables" class="table table-hover table-condensed table-striped table-responsive" style="width: 100%;" width="100%">
              
            <thead>
              <tr>
                <th class="header">#</th>
                
                    <th>Role</th>   
                
                    <th>Perm</th>   
                
                    <th>Isactive</th>   
                
                    <th>Module</th>   
                
                    <th>Class</th>   
                
                    <th>Method</th>   
                
                    <th>Params</th>   
                
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
          <?php else: ?>
                <?php  echo notify('Data role_permissions belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
          
        </div>
    </div>
</section>