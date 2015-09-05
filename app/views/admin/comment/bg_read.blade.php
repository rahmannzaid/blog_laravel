@extends('admin.template.layout')
@section('content')
    <script src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
    
    <?="
    <div class='span12'>
        <div class='widget widget-nopad'>
            <div class='widget-header'> <i class='icon-list-alt'></i>
                <h3> $title </h3>
                
            </div>
            <!-- /widget-header -->
            <div class='widget-content'>
                <div class='modal-header'>
                    <h3 id='myModalLabel'>Read $title</h3>
                </div>";
                
                foreach($read as $row){
                echo "
                    
                        <div class='modal-body' style='min-height:600px'>
                            <input type='hidden' name='id' value='".$row->id."'/>
                            <fieldset>
                                <div class='control-group'>											
                                    <label class='control-label' for='title_edit'>Name</label>
                                    <div class='controls'>
                                        <input type='text' class='span3' id='title' name='title_edit'  value='".$row->name."' readonly>
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                                <div class='control-group'>											
                                    <label class='control-label' for='title_edit'>Email</label>
                                    <div class='controls'>
                                        <input type='text' class='span3' id='title' name='title_edit'  value='".$row->email."' readonly>
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                                <div class='control-group'>											
                                    <label class='control-label' for='title_edit'>Title</label>
                                    <div class='controls'>
                                        <input type='text' class='span3' id='title' name='title_edit'  value='".$row->title."' readonly>
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                                <div class='control-group'>											
                                    <label class='control-label' for='content_edit'>Content</label>
                                    <div class='controls'>
                                        <textarea name='content_edit' id='content' class='span3' disabled>".$row->content."</textarea>
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                                
                            </fieldset>
                        
                        </div>
                        <div class='modal-footer'>
                            <a class='btn' onclick='window.history.back()' >Back</a>
                            <a class='btn btn-primary' href='mailto:".$row->email."?Subject=".$row->title."' target='_top'>Reply to email</a>
                        </div>
                    
                ";
                }
                
            echo "</div>
        </div>
        <!-- /widget -->
    </div>";
    
    ?>
    
    <script type="text/javascript">
        CKEDITOR.replace( 'content' );
        $(function(){
            $('#form-edit-article').validate({
                rules:{
                    category_edit   : {required: true},
                    title_edit      : {required: true,maxlength: 100},
                    content_edit    : {required: true},
                    //picture_edit    : {required: true,accept: 'jpeg|jpg|bmp|gif|png',filesize: 1024000,},
                },
                messages: {
                    picture_edit: {
                        accept  : "File must be image extension (jpeg,bmp,gif,png)",
                        filesize: "File size must be smaller than 1MB"
                    }
                }
            });
        })
    </script>
@stop