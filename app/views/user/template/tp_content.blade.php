<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?
    $seo = DB::table('tb_config')->where('id','=',1)->first();
    echo "
        <meta name='description' content='".$seo->description."'>
        <meta name='keyword' content='".$seo->keyword."'>
        <meta name='author' content='".$seo->author."'>
        
        <link rel='shortcut icon' href='".Url()."/assets/img/other/thumb/".$seo->img_icon."' >
        <title>";
            if(isset($title)){
                echo ucwords($title);
            }else{
                echo $seo->title;   
            }
        echo "</title>
    ";
    
    ?>
    
    
    @include('user.template.tp_top')
    
</head><!--/head-->

<body>
    <header id="header">
        
        @include('user.template.tp_header')
        
    </header><!--/header-->
    
    

    <section id="blog" class="container">
        <div class="blog">
            <div class="row">
                
                @yield('content')
                
                
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->

    @include('user.template.tp_bottom')
    @include('user.template.tp_footer')

    
</body>
</html>