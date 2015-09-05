@extends('admin.template.layout')
@section('content')
    <?="
    
    <div class='span12'>
        <div class='widget widget-nopad'>
            <div class='widget-header'> <i class='icon-list-alt'></i>
                <h3> $title </h3>
            </div>
            <!-- /widget-header -->
            <div class='widget-content'>";
                foreach($data as $row){
                $pic = Url()."/assets/img/setting/".$row->img_logo;
                $img='none';
                $def='block';
                if($row->img_logo != ''){
                    $def='none';
                    $img='block';
                    
                }
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
                echo "
                <div class='profile-content'>
                    <form action='".Url()."/zadmin/$ctrl/save' method='post' class='form-horizontal' id='form-add-$ctrl' enctype='multipart/form-data'>
                    
                    <div class='profile-right'>
                        
                        <div class='tabbable'>
                            <ul class='nav nav-tabs'>
                                <li class='active'>
                                    <a href='#formcontrols' data-toggle='tab'>Basic Information</a>
                                </li>
                                <li >
                                    <a href='#jscontrols' data-toggle='tab'>Contact Information</a>
                                </li>
                                <li >
                                    <a href='#seocontrols' data-toggle='tab'>SEO</a>
                                </li>
                            </ul>
                            <br>
                            <div class='tab-content'>
                                <div class='tab-pane active' id='formcontrols'>
                                    
                                    <div class='control-group'>											
                                        <label class='control-label' for='name'>Domain Name</label>
                                        <div class='controls'>
                                            <input type='text' class='span3' id='name' name='domain' value='".$row->domain."'>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='username'>Site Name</label>
                                        <div class='controls'>
                                            <input type='text' class='span3' name='sitename'  value='".$row->sitename."'>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='email'>Title</label>
                                        <div class='controls'>
                                            <input type='text' class='span3' name='title'  value='".$row->title."'>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='slogan'>Slogan</label>
                                        <div class='controls'>
                                            <textarea id='slogan' name='slogan' style='width:400px; height:100px'>".$row->slogan."</textarea>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    
                                </div>
                                
                                <div class='tab-pane ' id='jscontrols'>
                                    <div class='control-group'>											
                                        <label class='control-label' for='phone'>Phone</label>
                                        <div class='controls'>
                                            <div class='input-prepend input-append'>
                                                <span class='add-on'><i class='icon-large icon-phone'></i></span>
                                                <input class='span2' id='phone' name='phone' type='text'  value='".$row->phone1."'>
                                            </div>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='facebook'>Facebook</label>
                                        <div class='controls'>
                                            <div class='input-prepend input-append'>
                                                <span class='add-on'><i class='icon-large icon-facebook'></i></span>
                                                <input class='span2' id='facebook' name='facebook' type='text'  value='".$row->facebook."'>
                                            </div>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='twitter'>Twitter</label>
                                        <div class='controls'>
                                            <div class='input-prepend input-append'>
                                                <span class='add-on'><i class='icon-large icon-twitter'></i></span>
                                                <input class='span2' id='twitter' name='twitter' type='text'  value='".$row->twitter."'>
                                            </div>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='linkedin'>Linkedin</label>
                                        <div class='controls'>
                                            <div class='input-prepend input-append'>
                                                <span class='add-on'><i class='icon-large icon-linkedin-sign'></i></span>
                                                <input class='span2' id='linkedin' name='linkedin' type='text'  value='".$row->linkedin."'>
                                            </div>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='skype'>Skype</label>
                                        <div class='controls'>
                                            <div class='input-prepend input-append'>
                                                <span class='add-on'><b>S</b></span>
                                                <input class='span2' id='skype' name='skype' type='text'  value='".$row->skype."'>
                                            </div>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                </div>
                                
                                <div class='tab-pane' id='seocontrols'>
                                    <div class='control-group'>											
                                        <label class='control-label' for='description'>Description</label>
                                        <div class='controls'>
                                            <textarea id='description' name='description' style='width:400px; height:100px'>".$row->description."</textarea>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='keyword'>Keyword</label>
                                        <div class='controls'>
                                            <textarea id='keyword' name='keyword' style='width:400px; height:100px'>".$row->keyword."</textarea>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='author'>Author</label>
                                        <div class='controls'>
                                            <div class='input-prepend input-append'>
                                                <input class='span2' id='author' name='author' type='text'  value='".$row->author."'>
                                            </div>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class='form-actions'>
                            <button type='submit' class='btn btn-primary'>Save</button> 
                            <button class='btn'>Cancel</button>
                        </div> <!-- /form-actions -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /widget -->";
        }
    echo "
    </div>";
    
    ?>
@stop