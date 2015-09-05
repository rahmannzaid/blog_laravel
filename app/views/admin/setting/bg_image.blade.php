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
                $pic_icon   = Url()."/assets/img/other/".$row->img_icon;
                $img_icon   = 'none';
                $def_icon   = 'block';
                if($row->img_icon != ''){
                    $img_icon   ='block';
                    $def_icon   ='none';
                    
                }
                
                $pic_logo   = Url()."/assets/img/other/".$row->img_logo;
                $img_logo   = 'none';
                $def_logo   = 'block';
                if($row->img_logo != ''){
                    $img_logo   ='block';
                    $def_logo   ='none';
                    
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
                    <form action='".Url()."/zadmin/$ctrl/images' method='post' class='form-horizontal' id='form-add-$ctrl' enctype='multipart/form-data'>
                    <div class='profile-left'>
                        <center>Favicon</center>
                        <div class='profile-img-area'>
                            
                            <div class=''>
                                <img class='profile-img add_icon' src='".Url()."/assets/img/other/default.jpg' style='display:$def_icon'>
                                <img src='$pic_icon' id='img_icon' class='profile-img preview_icon' style='display:$img_icon'/>
                            </div>
                            <input type='file' name='icon' id='icon' style='opacity: 0.1;width:1px; height:1px' OnChange=javascript:picture_upload(this.id)>
                            <input type='hidden' name='remove_icon' id='remove_icon'/>
                        </div>
                        <div class='profile-img-container'>
                            <button type='button' class='btn btn-success'  onclick=javascript:click_picture('icon') >Change</button> | <a  class='btn btn-danger' onclick=javascript:remove_picture('icon') >Remove</a>
                            <center><p style='width:200px;padding:10px'>
                            Max file size: 100 bytes (100 Kilo Byte)<br>
                            Allowed extension: .JPG .JPEG .PNG .ICO
                            </p></center>
                        </div>
                    </div>
                    
                    <div class='profile-left'>
                        <center>Logo</center>
                        <div class='profile-img-area'>
                            
                            <div class=''>
                                <img class='profile-img add_logo' src='".Url()."/assets/img/other/default.jpg' style='display:$def_logo'>
                                <img src='$pic_logo' id='img_logo' class='profile-img preview_logo' style='display:$img_logo'/>
                            </div>
                            <input type='file' name='logo' id='logo' style='opacity: 0.1;width:1px; height:1px' OnChange=javascript:picture_upload(this.id)>
                            <input type='hidden' name='remove_logo' id='remove_logo'/>
                        </div>
                        <div class='profile-img-container'>
                            <button type='button' class='btn btn-success'  onclick=javascript:click_picture('logo') >Change</button> | <a  class='btn btn-danger' onclick=javascript:remove_picture('logo') >Remove</a>
                            <center><p style='width:200px;padding:10px'>
                            Max file size: 2.000 bytes (2 Megabytes)<br>
                            Allowed extension: .JPG .JPEG .GIF .PNG .BMP
                            </p></center>
                        </div>
                    </div>
                    
                    
                    
                </div>
                <div class='form-actions'>
                    <button type='submit' class='btn btn-primary'>Save</button> 
                    <button class='btn'>Cancel</button>
                </div> <!-- /form-actions -->
                </form>
            </div>
        </div>
        <!-- /widget -->";
        }
    echo "
    </div>";
    
    ?>
@stop