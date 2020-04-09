 $('document').ready(function(){
    $(".modal").modal({ backdrop: 'static', keyboard: false, show: false });
    $(".modal").on("hidden.bs.modal", function() {
        $(".modal-body").html(null);
        // window.location = baseurl;
        // $('#datatables').DataTable().ajax.reload();
    }); 
 });
 $('body').on('click','[data-load-remote]',function(e) {
        e.preventDefault();
        
        var $this = $(this);
        var remote = $this.data('load-remote');
        var targets= $this.data('remote-target');
        var forms= $this.data('form');
        // var js=<?php echo assets_url('js/modules/ptrx.01.js');?>;
        // alert(js);
        if(remote) {
            // $(targets).load(remote);
            $.ajax({
                url:remote,
                type:"POST",
                dataType:"html",
                success:function(dt,status){
                    $(targets).html(dt);
                    $.getScript(jsurl+'form-handle.js',function(){

                    });
                },
                complete:function(){
                    // $.getScripts()
                }

            });
           
        }


    });
   
function deactivate(id) {
    var deactivate_data = {
        id: id,
        ajax: 1
    }
    // alert(deactivate_data.id);
    if (confirm('Anda yakin nonaktifkan status ini?')) {
        $(this).ready(function() {

            $.ajax({
                url: baseurl + "deactivate/",
                type: 'POST',
                data: deactivate_data,
                success: function(msg) {
                    // $('#datatables').DataTable({}).ajax.reload();
                    // $('#datatables').DataTable().clear(0).draw();
                    dtables.ajax.reload();
                }
            });
        });
    }
}

function activate(id) {
    var activate_data = {
        id: id,
        ajax: 1
    }
    // alert(activate_data.id);
    if (confirm('Anda yakin aktifkan status ini?')) {
        $(this).ready(function() {

            $.ajax({
                url: baseurl + "activate/",
                type: 'POST',
                data: activate_data,
                success: function(msg) {
                    // $('#datatables').DataTable().clear(0).draw();
                    // $('#datatables').DataTable().ajax.reload();
                    dtables.ajax.reload();
                }
            });
        });
    }
}

function destroy(id) {
    var activate_data = {
        id: id,
        ajax: 1
    }
    // alert(activate_data.id);
    if (confirm('Anda yakin akan menghapus data ini secara permanen?')) {
        $(this).ready(function() {

            $.ajax({
                url: baseurl + "destroy/",
                type: 'POST',
                data: activate_data,
                success: function(msg) {
                    // $('#datatables').DataTable().clear(0).draw();
                    // $('#datatables').DataTable().ajax.reload();
                    dtables.ajax.reload();
                }
            });
        });
    }
}

function handleValid(){
    $('.modal').modal('toggle');
}