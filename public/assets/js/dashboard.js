// $('document').ready(function(){
	$('form').on('submit',function(e){
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
        console.log(isvalid.isValid());
    });
// });
