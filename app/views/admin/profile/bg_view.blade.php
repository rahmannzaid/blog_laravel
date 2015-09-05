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
                $pic = Url()."/assets/img/profile/".$row->avatar;
                $img='none';
                $def='block';
                if($row->avatar != ''){
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
                    <div class='profile-left'>
                        <div class='profile-img-area'>
                            <div class=''>
                                <img class='profile-img add_picture' src='".Url()."/assets/img/other/default.jpg' style='display:$def'>
                                <img src='$pic' id='img_picture' class='profile-img preview_picture' style='display:$img'/>
                            </div>
                            <input type='file' name='picture' id='picture' style='opacity: 0.1;width:1px; height:1px' OnChange=javascript:picture_upload(this.id)>
                            <input type='hidden' name='remove_picture' id='remove_picture'/>
                        </div>
                        <div class='profile-img-container'>
                            <button type='button' class='btn btn-success'  onclick=javascript:click_picture('picture') >Change</button> | <a  class='btn btn-danger' onclick=javascript:remove_picture('picture') >Remove</a>
                            <center><p style='width:200px;padding:10px'>
                            Max file size: 2.000 bytes (2 Megabytes)<br>
                            Allowed extension: .JPG .JPEG .GIF .PNG .BMP
                            </p></center>
                            <button class='btn' style='width:180px' href='#modal-change-password'  data-toggle='modal'>Change Password</button>
                        </div>
                    </div>
                    <div class='profile-right'>
                        
                        <div class='tabbable'>
                            <ul class='nav nav-tabs'>
                                <li class='active'>
                                    <a href='#formcontrols' data-toggle='tab'>Basic Information</a>
                                </li>
                                <li >
                                    <a href='#jscontrols' data-toggle='tab'>Contact Information</a>
                                </li>
                            </ul>
                            <br>
                            <div class='tab-content'>
                                <div class='tab-pane active' id='formcontrols'>
                                    
                                    <div class='control-group'>											
                                        <label class='control-label' for='name'>Name</label>
                                        <div class='controls'>
                                            <input type='text' class='span3' id='name' name='name' value='".$row->name."'>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='username'>Username</label>
                                        <div class='controls'>
                                            <input type='text' class='span3'  disabled  value='".$row->username."'>   <a class='btn btn-mini'><i class='icon-pencil'></i> Change</a>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='email'>Email</label>
                                        <div class='controls'>
                                            <input type='text' class='span3'  disabled  value='".$row->email."'>   <a class='btn btn-mini'><i class='icon-pencil'></i> Change</a>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='description'>Description</label>
                                        <div class='controls'>
                                            <textarea id='description' name='description' style='width:400px; height:100px'>".$row->description."</textarea>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='address'>Address</label>
                                        <div class='controls'>
                                            <textarea id='address' name='address' style='width:400px; height:100px'>".$row->address."</textarea>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    
                                </div>
                                
                                <div class='tab-pane ' id='jscontrols'>
                                    <div class='control-group'>											
                                        <label class='control-label' for='phone'>Phone</label>
                                        <div class='controls'>
                                            <div class='input-prepend input-append'>
                                                <span class='add-on'><i class='icon-large icon-phone'></i></span>
                                                <input class='span2' id='phone' name='phone' type='text'  value='".$row->phone."'>
                                            </div>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='whatsapp'>WhatsApp</label>
                                        <div class='controls'>
                                        <div class='input-prepend input-append'>
                                                <span class='add-on'><i class='icon-large icon-phone-sign'></i></span>
                                                <input class='span2' id='whatsapp' name='whatsapp' type='text'  value='".$row->whatsapp."'>
                                            </div>
                                        </div> <!-- /controls -->				
                                    </div> <!-- /control-group -->
                                    <div class='control-group'>											
                                        <label class='control-label' for='bbm'>BBM</label>
                                        <div class='controls'>
                                            <input type='text' class='span3' id='bbm' name='bbm'  value='".$row->bbm."'>
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
                                                <span class='add-on'>@</span>
                                                <input class='span2' id='twitter' name='twitter' type='text'  value='".$row->twitter."'>
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