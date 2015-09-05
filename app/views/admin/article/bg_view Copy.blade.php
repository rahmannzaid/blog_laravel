@extends('admin.template.layout')
@section('content')
    <script src="{{ URL::asset('assets/js/ckeditor/ckeditor.js') }}"></script>
    
    <?="
    
    
    <div id='modal-add' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='width:800px'>
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true' onclick=\"closeModal('modal-add') \">x</button>
            <h3 id='myModalLabel'>Add $title</h3>
        </div>
        <form action='".Url()."/zadmin/$ctrl/add' method='post' class='form-horizontal' id='form-add-$ctrl' enctype='multipart/form-data'>
        <div class='modal-body'>
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
            <a class='btn' data-dismiss='modal' aria-hidden='true' onclick=\"closeModal('modal-add') \">Close</a>
            <input type='submit' class='btn btn-primary' value='Save' />
        </div>
        </form>
    </div>
    
    <div class='span12'>
        <div class='widget widget-nopad'>
            <div class='widget-header'> <i class='icon-list-alt'></i>
                <h3> $title </h3>
                <span class='search-right'>
                    <form method='post' action='".url()."/zadmin/$ctrl/filter'>";
                        $value='';
                        if(isset($filter)){
                            $value=$filter;
                        }
                        echo "<input type='text' class='search-input search' placeholder='Search $title' name='filter' value='$value'/>
                        <input type='submit' value='Search' class='btn btn-info search-btn' />
                    </form>
                </span>
            </div>
            <!-- /widget-header -->
            <div class='widget-content'>
                <span class='btn-area'>
                    <a class='btn btn-success btn-margin' href='#modal-add'  data-toggle='modal' >Add</a>
                    <a class='btn btn-danger btn-margin' onClick=javascript:confirm_table('$ctrl','delete') >Delete</a>
                </span>";
                if(Session::has('success')){
                    echo "
                        <div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            ".Session::get('success')."
                        </div>
                    ";
                }
                if(Session::has('failed')){
                    echo "
                        <div class='alert'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Warning!</strong> ".Session::get('failed')."
                        </div>
                    ";
                }
                echo "<table class='table table-striped'>
                    <thead>
                        <tr>
                            <th width='50px'><input type='checkbox' id='checkall'/></th>
                            <th>Category Name</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Created Date</th>
                            <th>Author</th> 
                            <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>";
                        if(count($data)>0){
                            foreach($data as $row){
                                echo"
                                    <tr>
                                        <td><input type='checkbox' name='delete[]' class='checkboxDelete' value='".$row->id."'></td>
                                        <td>".$row->category."</td>
                                        <td>".$row->title."</td>
                                        <td>".$row->content."</td>
                                        <td>".$row->created_at."</td>
                                        <td>".$row->user."</td>
                                        <td>
                                            <a  onclick=javascript:access_link('$ctrl/edit/".$row->id."','$title')  data-toggle='modal' class='btn btn-info' data-target='#modal-edit'>Edit</a>
                                        </td>
                                    </tr>
                                ";
                            }
                        }else{
                            if(isset($filter)){
                                echo "<tr><td colspan='6' style='text-align:center'>No data with keyword <b>$filter</b><td></tr>";
                            }else{
                                echo "<tr><td colspan='6' style='text-align:center'>Empty Data<td></tr>";    
                            }
                            
                        }
                        
                    echo "</tbody>
                </table>
                <div class='pagination-area'>
                    ".$data->links()."
                </div>
            </div>
        </div>
        <!-- /widget -->
    </div>";
    /*foreach($tes as $t){
        print_r($t->title);
        echo '<br>';
        print_r($t->user->name);
        echo '<br>';
        print_r($t->category->name);
        
    }
    echo $tes->links();*/
    ?>
    
    <script type="text/javascript">
        CKEDITOR.replace( 'content' );
    </script>
@stop