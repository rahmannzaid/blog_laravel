//============== Global =================//
function submit_form(id,url) {
    if ($(id).valid()) {
        $.ajax({
            type    : 'POST',
            data    : $(id).serialize(),
            url     : base_url+url,
            success : function(msg) {
                if (msg == 'success') {
                    ambeyen('Comment succes. Wait confirmation from admin','','success')
                    $(id)[0].reset();
                }else{
                    ambeyen('Failed to comment this article. Pleace try again later','','error')
                }
                
            },
            error : function(){
                ambeyen('Failed to comment this article. Pleace try again later','','error')
            }
        });
    }
}

function ambeyen(msg, ttle, tipe) {
    $.ambiance({message: msg,
                    title: ttle,
                    type: tipe});
                
}

function add_view(id,url) {
    //if ($(id).valid()) {
        $.ajax({
            type    : 'POST',
            data    : 'id='+id,
            url     : base_url+url,
            success: function(msg) {
                //$('.div-paging').html(msg);
            }
        });
    //}
}

function search() {
    $.ajax({
        type    : 'GET',
        data    : $('#form-search').serialize(),
        url     : base_url+url,
        success: function(msg) {
            //$('.div-paging').html(msg);
        }
    });
}
//=======================================//

//============== Comment ================//
$(function(){
    $('#main-contact-form').validate({
        rules:{
            name    : {required: true},
            email   : {required: true, email:true},
            message : {required: true},
        }
    });
})
//=======================================//










//============== Global =================//

//=======================================//
