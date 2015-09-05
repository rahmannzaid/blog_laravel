<?="
<aside class='col-md-4'>
    <div class='widget categories'>
        <h3>Categories</h3>
        <div class='row'>
            <div class='col-sm-6'>
                <ul class='blog_category'>";
                    $right_cat = DB::table('tb_category')->orderBy('name','asc')->where('prnt','=',0)->get();
                    foreach($right_cat as $row){
                        $right_cat_sub = DB::table('tb_category')->orderBy('name','asc')->where('prnt','=',$row->id)->get();
                        if(count($right_cat_sub) > 0){
                            foreach($right_cat_sub as $item){
                                echo article($item->id,$item->name);
                            }
                            
                        }else{
                            echo article($row->id,$row->name);
                        }
                    }
                    
                    function article ($id,$name){
                        $data       = DB::table('tb_article')->where('category_id',$id)->where('status','=',1)->count();
                        $article    = '';
                        if($data >0){
                            $article = "<li><a href='".Url()."/category/".Convert_string::tosmall($name)."'>".$name." <span class='badge'>$data</span></a></li>";
                        }
                        return $article;
                    }
                    echo "
                </ul>
            </div>
        </div>                     
    </div><!--/.categories-->
    
    <div class='widget archieve'>
        <h3>Archieve</h3>
        <div class='row'>
            <div class='col-sm-12'>
                <ul class='blog_archieve'>";
                    for($i=0;$i<10;$i++){
                        $date = date('Y-m', strtotime("-$i months"));
                        $right_month = DB::table('tb_article')->where('created_at','like', $date.'%')->where('status','=',1)->get();
                        if(count($right_month) > 0){
                            echo "<li>
                                <a href='".Url()."/read/".date('Y/m',strtotime($date))."'><i class='fa fa-angle-double-right'></i> ".Convert_date::english(date('M Y',strtotime($date)))."
                                <span class='pull-right'>(".count($right_month).")</span></a>
                            </li>";
                        }
                        
                    }
                    echo "
                </ul>
            </div>
        </div>                     
    </div><!--/.archieve-->
    
    <div class='widget tags'>
        <h3>Tag Cloud</h3>
        <ul class='tag-cloud'>";
            $right_tags = DB::table('tb_tag')->orderBy('name','asc')->get();
            foreach($right_tags as $row){
                echo "  <li><a class='btn btn-xs btn-primary' href='".Url()."/tags/".strtolower($row->name)."'>".$row->name."</a></li>";
            }
            echo "
        </ul>
    </div><!--/.tags-->
    
    <!--<div class='widget blog_gallery'>
        <h3>Our Gallery</h3>
        <ul class='sidebar-gallery'>
            <li><a href='#'><img src='{{ URL::asset('templates/user/images/blog/gallery1.png') }}' alt='' /></a></li>
            <li><a href='#'><img src='{{ URL::asset('templates/user/images/blog/gallery2.png') }}' alt='' /></a></li>
            <li><a href='#'><img src='{{ URL::asset('templates/user/images/blog/gallery3.png') }}' alt='' /></a></li>
            <li><a href='#'><img src='{{ URL::asset('templates/user/images/blog/gallery4.png') }}' alt='' /></a></li>
            <li><a href='#'><img src='{{ URL::asset('templates/user/images/blog/gallery5.png') }}' alt='' /></a></li>
            <li><a href='#'><img src='{{ URL::asset('templates/user/images/blog/gallery6.png') }}' alt='' /></a></li>
        </ul>
    </div><!--/.blog_gallery-->
</aside>
";?>