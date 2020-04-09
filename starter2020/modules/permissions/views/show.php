

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


<?php 
    if($permissions) :
?> 

<div class="table-responsive">
    <table id="detail" class="table table-striped table-condensed">
        <tbody>
        <?php     
            foreach($permissions as $table => $value) :    
        ?>
        <tr>
            <td width="20%" align="right"><strong><?php echo ucwords(str_replace("_"," ","$table")); ?></strong></td>
            <td><?php echo $value ?></td>
        </tr>
         <?php 
            endforeach;
         ?>
         </tbody>
    </table>
</div>


	<?php 
	
		echo anchor(site_url('permissions'), '<span class="fa fa-chevron-left"></span> Kembali', 'class="btn btn-sm btn-default"');
	
	?>


<br /><br />

<?php 
    endif;
?>

