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
                    <h3 id='myModalLabel'>Edit $title</h3>
                </div>";
                
                foreach($edit as $row){
                echo "
                    <form action='".Url()."/zadmin/article/edit' method='post' class='form-horizontal' id='form-edit-article' enctype='multipart/form-data'>
                        <div class='modal-body'  style='min-height:600px'>
                            <input type='hidden' name='id' value='".$row->id."'/>
                            <fieldset>
                                <div class='control-group'>											
                                    <label class='control-label' for='category_edit'>Category</label>
                                    <div class='controls'>
                                        <select name='category_edit'>
                                            $category
                                        </select>
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                                <div class='control-group'>											
                                    <label class='control-label' for='category'>Tags</label>
                                    <div class='controls'>
                                        <select multiple='multiple' id='my-select' name='tags[]'>";
                                            $cat    = DB::table('tb_tag')->orderBy('name','asc')->get();
                                            $id     = array();
                                            $exp    = explode(';',$row->tag);
                                            for($i=0; $i < count($exp) ; $i++){
                                                $id[] = $exp[$i];
                                            }
                                            foreach($cat as $item){
                                                $select='';
                                                if(in_array($item->id,$id)){$select='selected';}
                                                echo "<option value='".$item->id."' $select>".$item->name."</option>";
                                            }
                                        echo "</select>
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                                <div class='control-group'>											
                                    <label class='control-label' for='title_edit'>Title</label>
                                    <div class='controls'>
                                        <input type='text' class='span3' id='title' name='title_edit'  value='".$row->title."'>
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                                <div class='control-group'>											
                                    <label class='control-label' for='content_edit'>Content</label>
                                    <div class='controls'>
                                        <textarea name='content_edit' id='content' class='span3' >".$row->content."</textarea>
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                                <div class='control-group'>											
                                    <label class='control-label' for='picture_edit'>Picture</label>
                                    <div class='controls'>
                                        <!--<input type='file' class='span3' id='picture_edit' name='picture_edit'>-->
                                        <input type='hidden' name='remove_picture_edit' id='remove_picture_edit'/>
                                        <input type='file' name='picture_edit' id='picture_edit' style='opacity: 0.0;width:1px' OnChange=javascript:picture_upload(this.id)>
                                        <div class='pic-lg add_picture_edit'   style='display:none' >
                                            <div class='viewPix' onclick=javascript:click_picture('picture_edit')>
                                                <div class='plus plus_picture_edit'>+</div>
                                            </div>
                                        </div><!--pic-lg-->
                                        <div class='pic-lg preview_picture_edit'>
                                            <div class='viewPix'>
                                                <img src='".Url()."/assets/img/article/thumb/".$row->picture."' id='img_picture_edit'/>
                                                <div class='del' id='del_picture_edit' onclick=javascript:remove_picture_edit('picture_edit')>x</div>
                                            </div>
                                        </div><!--pic-lg-->
                                        <div style='clear:both'></div>
                                        <label style='display:none'  for='picture_edit' class='error' generated='true' ></label>
                                    </div> <!-- /controls -->				
                                </div> <!-- /control-group -->
                            </fieldset>
                        
                        </div>
                        <div class='modal-footer'>
                            <a class='btn' onclick='window.history.back()' >Cancel</a>
                            <input type='submit' class='btn btn-primary' value='Save' />
                        </div>
                    </form>
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