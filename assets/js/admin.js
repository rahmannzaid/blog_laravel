$(function(){
	//lib filesize jquery validation
	$.validator.addMethod('filesize', function(value, element, param) {
		return this.optional(element) || (element.files[0].size <= param) 
	});

    //checkall cehckbox
	$('#checkall').click(function () {
		$(this).parents('table:eq(0)').find(':checkbox').attr('checked', this.checked);
	});
    
	//form add category
    $('#form-add-category').validate({
        rules:{
            category: {required: true,maxlength: 100,}
        }
    });
	
	//form add article
    $('#form-add-article').validate({
        rules:{
            category: {required: true},
			title: {required: true,maxlength: 100},
			//content: {required: true},
			picture: {required: true,accept: 'jpeg|jpg|bmp|gif|png',filesize: 1024000,},
        },
		messages: {
			picture: {
				accept: "File must be image extension (jpeg,bmp,gif,png)",
				filesize: "File size must be smaller than 1MB"
			}
		}
    });
	
	//form change password
    $('#form-change-password').validate({
        rules:{
            old_pass: {required: true},
			new_pass: {required: true,minlength:5},
			re_new_pass: {required: true,equalTo:'#new_pass'}
        }
    });
	
	//form add category
    $('#form-add-profile').validate({
        rules:{
            name		: {required: true,maxlength: 100,},
			address		: {maxlength: 250,},
			phone		: {required: true,maxlength: 100,number:true},
			whatsapp	: {maxlength: 100,number:true},
			bbm			: {maxlength: 100},
			facebook	: {maxlength: 100},
			twitter		: {maxlength: 100}
        }
    });
	
	//form add tag
	$('#form-add-tag').validate({
		rules:{
			tag: {required: true,maxlength: 100}
		}
	});
	
	$('#my-select').multiSelect();
})

function closeModal(args) {
    $('#'+args).modal('hide');
}

function cek_delete(){
	var values =   $('input:checkbox:checked.checkboxDelete').map(function (){
			return this.value;
			}).get();
	if(values == ""){
        $('#modal-empty').modal('show');
        exit;
	}
}

var tableval = '';
var controller='';
var link ='';

function delete_table() {
    if (tableval != null && link != null) {
        $.ajax({
            type: "POST",
            url: link,
            data: {delete:tableval},
            success : function(){    
                top.location.href = base_url+controller+'/success';
            },
            error : function(){
                top.location.href = base_url+controller+'/failed';
            }
        });
    }
}

function confirm_table(ctrl,method) {
    tableval =   $('input:checkbox:checked.checkboxDelete').map(function (){
        return this.value;
    }).get();
    link = base_url+ctrl+'/'+method;
    controller=ctrl;
	if(tableval == ""){
        $('#modal-empty').modal('show');
        exit;
	}else{
        $('#modal-confirmation').modal('show');
    }
}

function access_link(url,title) {
	$('.mod-title').html(title+' Edit');
	$.ajax({
		type: "get",
		url: base_url+url,
		success : function(msg){    
			$('.mod-content').html(msg);
		},
		error : function(){
			top.location.href = base_url+controller+'/failed';
		}
	});
}

function filter(id,url) {
	var fltr = $('#'+id).val();
	$.ajax({
		type: "POST",
		url: base_url+url,
		data: {filter:fltr},
		success : function(msg){    
			//$('.mod-content').html(msg);
		},
		error : function(){
			//top.location.href = base_url+controller+'/failed';
		}
	});
}

//upload picture
function click_picture(file) {
	$('#'+file).click();
}

function picture_upload(id){
	var URL = window.URL || window.webkitURL;
	var val = $('#'+id).val();
	var input = document.querySelector('#'+id);
	var preview = document.querySelector('#img_'+id);
	preview.src = URL.createObjectURL(input.files[0]);
	
	preview.addEventListener('load', function () {
		$('.add_'+id).hide();
		$('.preview_'+id).show();
		URL.revokeObjectURL(this.src);
		$('#remove_'+id).val('');
	});
}

function remove_picture(id) {
	$('#'+id).val('');
	$('.add_'+id).show();
	$('#remove_'+id).val('remove');
	$('.preview_'+id).hide();
}

function remove_picture_edit(id) {
	//$('input[name="'+id+'"]').rules('remove');
	$('#'+id).val('');
	$('#remove_'+id).val('remove');
	$('.add_'+id).show();
	$('.preview_'+id).hide();
	$('input[name="'+id+'"]').rules('add', {
		required: true,accept: 'gif,jpg,png,jpeg,bmp',filesize: 1024000
	});
}