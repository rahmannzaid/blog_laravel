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
                    <h3 id='myModalLabel'>Add $title</h3>
                </div>
                <form action='".Url()."/zadmin/$ctrl/add' method='post' class='form-horizontal' id='form-add-$ctrl' enctype='multipart/form-data'>
                <div class='modal-body' style='max-height:800px'>
                    <fieldset>
                        <div class='control-group'>											
                            <label class='control-label' for='category'>Category</label>
                            <div class='controls'>
                                <select name='category'>
                                    $category
                                </select>
                            </div> <!-- /controls -->				
                        </div> <!-- /control-group -->
                        <div class='control-group'>											
                            <label class='control-label' for='category'>Tags</label>
                            <div class='controls'>
                                <select multiple='multiple' id='my-select' name='tags[]'>";
                                    $cat = DB::table('tb_tag')->orderBy('name','asc')->get();
                                    foreach($cat as $item){
                                        echo "<option value='".$item->id."' >".$item->name."</option>";
                                    }
                                echo "</select>
                            </div> <!-- /controls -->				
                        </div> <!-- /control-group -->
                        <div class='control-group'>											
                            <label class='control-label' for='title'>Title</label>
                            <div class='controls'>
                                <input type='text' class='span3' id='title' name='title'>
                            </div> <!-- /controls -->				
                        </div> <!-- /control-group -->
                        <div class='control-group'>											
                            <label class='control-label' for='content'>Content</label>
                            <div class='controls' style='clear:both'>
                                <textarea name='content' id='content' class='span3' ></textarea>
                            </div> <!-- /controls -->				
                        </div> <!-- /control-group -->
                        <div class='control-group'>											
                            <label class='control-label' for='picture'>Picture</label>
                            <div class='controls'>
                                <!--<input type='file' class='span3' id='picture' name='picture'>-->
                                <input type='file' name='picture' id='picture' style='opacity: 0.0;width:1px' OnChange=javascript:picture_upload(this.id)>
                                <div class='pic-lg add_picture'>
                                    <div class='viewPix' onclick=javascript:click_picture('picture')>
                                        <div class='plus plus_picture'>+</div>
                                    </div>
                                </div><!--pic-lg-->
                                <div class='pic-lg preview_picture'  style='display:none' >
                                    <div class='viewPix'>
                                        <img src='' id='img_picture'/>
                                        <div class='del' id='del_picture' onclick=javascript:remove_picture('picture')>x</div>
                                    </div>
                                </div><!--pic-lg-->
                                <div style='clear:both'></div>
                                <label style='display:none'  for='picture' class='error' generated='true' ></label>
                            </div> <!-- /controls -->				
                        </div> <!-- /control-group -->
                    </fieldset>
                </div>
                
                <div class='modal-footer'>
                    <a class='btn' href='".Url()."/zadmin/article' >Cancel</a>
                    <input type='submit' class='btn btn-primary' value='Save' />
                </div>
                </form>
                
            </div>
        </div>
        <!-- /widget -->
    </div>";
    
    ?>
    
    <script type="text/javascript">
        CKEDITOR.replace( 'content' );
    </script>
@stop