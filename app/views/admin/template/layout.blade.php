<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Rahmannzaid Blog</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
	
	@include('admin.template.top')
		
</head>

<body>
	
	@include('admin.template.header')
	
	<div class="main">
		<div class="main-inner">
			<div class="container">
				<div class="row">
					
				
				@yield('content')
					
				</div>
				<!-- /row --> 
			</div>
			<!-- /container --> 
		</div>
		<!-- /main-inner --> 
	</div>
	<!-- /main -->
	
	
	@include('admin.template.footer')
	@include('admin.template.bottom')
</body>
</html>
