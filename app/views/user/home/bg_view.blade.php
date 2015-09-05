@extends('user.template.tp_content')
@section('content')
    <? echo "
    <div class='col-md-8'>
        <div class='blog-item'>";
            foreach($data as $row){
                echo "
                    <div class='row'>
                        <div class='col-xs-12 col-sm-2 text-center'>
                            <div class='entry-meta'>
                                <span id='publish_date'>".date('d M', strtotime($row->created_at))."</span>
                                <span><i class='fa fa-user'></i> <a href='#'>".$row->user."</a></span>
                                <span><i class='fa fa-clock-o'></i> <a href='#'>".date('H:i:s', strtotime($row->created_at))."</a></span>
                                <span><i class='fa fa-eye'></i><a href='#'>".$row->read." View</a></span>
                                
                                <!--<span><i class='fa fa-comment'></i> <a href='blog-item.html#comments'>2 Comments</a></span>-->
                                
                            </div>
                        </div>
                            
                        <div class='col-xs-12 col-sm-10 blog-content'>
                            <a onclick=javascript:add_view('".$row->id."','/home/addview')  href='".Url()."/read/".date('Y/m/d', strtotime($row->created_at))."/".$row->cat."/".$row->id."/".Convert_string::sluggify($row->title)."'><img class='img-responsive img-blog' src='".Url()."/assets/img/article/".$row->picture."' width='100%' alt='".$row->title."' />
                            <h2>".$row->title."</h2></a>
                            <h3>".Convert_string::cut($row->content)."</h3>
                            <a onclick=javascript:add_view('".$row->id."','/home/addview')  class='btn btn-primary readmore' href='".Url()."/read/".date('Y/m/d', strtotime($row->created_at))."/".$row->cat."/".$row->id."/".Convert_string::sluggify($row->title)."'>Read More <i class='fa fa-angle-right'></i></a>
                        </div>
                    </div>    
                ";
            }
            if(isset($search)){
                echo "<center>".$data->appends(array('search' => $search))->links()."</center></div><!--/.blog-item-->";
            }else{
                echo "<center>".$data->links()."</center></div><!--/.blog-item-->";
            }
            
        
        
    echo "</div><!--/.col-md-8-->";
    ?>
@include('user.template.tp_right')
@stop
