<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog | Corlate</title>
    
    @include('user.template.top')
    
</head><!--/head-->

<body>
    <header id="header">
        
        @include('user.template.header')
        
    </header><!--/header-->
    
    

    <section id="blog" class="container">
        <div class="blog">
            <div class="row">
                
                @yield('content')
                @include('user.template.right')
                
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->

    @include('admin.template.bottom')

    
</body>
</html>