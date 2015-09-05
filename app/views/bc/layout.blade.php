<!DOCTYPE html>
<html lang='en'>
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset='utf-8'>
	<title>Free HTML5 Bootstrap Admin Template</title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta name='description' content='Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.'>
	<meta name='author' content='Muhammad Usman'>

	@include('top')
		
</head>

<body>
    <!-- topbar starts -->
	<div class='navbar'>
    
    @include('header')
    
    </div>
	<!-- topbar ends -->
    <div class='container-fluid'>
		<div class='row-fluid'>
            
            @include('sidebar')
            @yield('content')
            
        </div><!--/fluid-row-->
		<hr>
        
        @include('footer')
        
    </div><!--/.fluid-container-->
    
    @include('bottom')
    
</body>
</html>