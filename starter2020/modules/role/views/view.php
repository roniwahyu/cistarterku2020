
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

<section class="panel panel-default">
    <header class="panel-heading">
        <div class="row">
            <div class="col-md-8 col-xs-3">                
                <?php
                      echo anchor(
                               site_url('role/add'),
                                '<i class="fa fa-plus"></i> Tambah',
                                'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah Data"'
                              );
                ?>
            </div>
            <div class="col-md-4 col-xs-9">
                                           
                 <?php echo form_open(site_url('role/search'), 'role="search" class="form"') ;?>       
                           <div class="input-group pull-right">                      
                                 <input type="text" class="form-control input-sm" placeholder="Cari data" name="q" autocomplete="off"> 
                                 <span class="input-group-btn">
                                      <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i> Cari</button>
                                 </span>
                           </div>
                           
               </form> 
                <?php echo form_close(); ?>
            </div>
        </div>
    </header>
    
    
    <div class="panel-body">
         <?php if ($roles) : ?>
          <table class="table table-hover table-condensed table-striped table-responsive">
              
            <thead>
              <tr>
                <th class="header">#</th>
                
                    <th>Name</th>   
                
                    <th>Description</th>   
                
                    <th>Isactive</th>   
                
                    <th>Userid</th>   
                
                    <th>Created</th>   
                
                    <th>Modified</th>   
                
                    <th>Deleted</th>   
                
                    <th>Key</th>   
                
                <th class="red header" align="right" width="120">Aksi</th>
              </tr>
            </thead>
            
            
            <tbody>
             
               <?php foreach ($roles as $role) : ?>
              <tr>
              	<td><?php echo $number++;; ?> </td>
               
               <td><?php echo $role['name']; ?></td>
               
               <td><?php echo $role['description']; ?></td>
               
               <td><?php echo $role['isactive']; ?></td>
               
               <td><?php echo $role['userid']; ?></td>
               
               <td><?php echo $role['created']; ?></td>
               
               <td><?php echo $role['modified']; ?></td>
               
               <td><?php echo $role['deleted']; ?></td>
               
               <td><?php echo $role['key']; ?></td>
               
                <td nowrap>    
                    
                    <?php
                                  echo anchor(
                                          site_url('role/show/' . $role['id']),
                                            '<i class="fa fa-eye"></i>',
                                            'class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="top" title="Detail"'
                                          );
                   ?>
                    
                    <?php
                                  echo anchor(
                                          site_url('role/edit/' . $role['id']),
                                            '<i class="fa fa-pencil-alt"></i>',
                                            'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Edit"'
                                          );
                   ?>
                   
                   <?php
                                  echo anchor(
                                          site_url('role/destroy/' . $role['id']),
                                            '<i class="fa fa-trash-alt"></i>',
                                            'onclick="return confirm(\'Apakah anda yakin ingin menghapus?\');" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="top" title="Hapus"'
                                          );
                   ?>   
                                 
                </td>
              </tr>     
               <?php endforeach; ?>
            </tbody>
          </table>
          <?php else: ?>
                <?php  echo notify('Data role belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
           <div class="col-md-3">
               Role
               <span class="label label-info">
                    <?php echo $total; ?>
               </span>
           </div>  
           <div class="col-md-9">
                 <?php echo $pagination; ?>
           </div>
        </div>
    </div>
</section>