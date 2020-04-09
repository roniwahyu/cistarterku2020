function calculate(){
    alert('calculate');
};
$('form').on('submit',function(e){
    e.preventDefault();

    // alert($(this).parsley().isValid());
    if(($(this).parsley().isValid())===true){
        var data=$(this).serializeArray();
        $.ajax({
            url:baseurl+'save',
            type:'POST',
            data:data,
            success:function(msg){
                // alert(msg);
                var j=JSON.parse(msg);
                // alert (j.st);
                handleForm(j.st);
                
            }
        })
    }
});
function handleForm(id){
    if(id=='1'){
        $('.modal').modal('toggle');
                Swal.fire({
                    'type':'success',
                    'title':'Sukses',
                    'text':'Sukses ya'
                    });
                 dtables.ajax.reload();
            }else{
                Swal.fire({
                    'type':'warning',
                    'title':'Gagal',
                    'text':'Ada kesalahan input'
                    });
            }

}
// $('document').ready(function(){
	/*$('form').on('submit',function(e){
        e.preventDefault();
        // $(this).parsley().validate();
        var isvalid=$('form').parsley();
        var data = $('form').serializeArray();

        if(isvalid.isValid()===true){
            handleValid();
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
        // console.log(isvalid.isValid());
    });*/
// });
