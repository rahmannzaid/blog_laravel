<?= "
<div class='top-bar'>
	<div class='container'>
		<div class='row'>
			<div class='col-sm-6 col-xs-4'>
				
			</div>
			<div class='col-sm-6 col-xs-8'>
			   <div class='social'>
					<ul class='social-share'>";
						$head_config = DB::table('tb_config')->where('id','=',1)->first();
						$head_search = '';
						if(isset($search)){
							$head_search = str_replace('+',' ', $search);
						}
						echo "
						<li><a target='_blank' href='http://facebook.com/".$head_config->facebook."'><i class='fa fa-facebook'></i></a></li>
						<li><a target='_blank' href='http://twitter.com/".$head_config->twitter."'><i class='fa fa-twitter'></i></a></li>
						<li><a target='_blank' href='http://linkedin.com/in/".$head_config->linkedin."'><i class='fa fa-linkedin'></i></a></li> 
						<li><a target='_blank' href='skype:".$head_config->skype."?userinfo'><i class='fa fa-skype'></i></a></li>
					</ul>
					<div class='search'>
						<form role='form' action='".Url()."/home/search' method='get' id='form-search'>
							<input type='text' class='search-form' autocomplete='off' placeholder='Search' name='search' onChange=javascript:search('/home/search') value='$head_search' >
							<i class='fa fa-search'></i>
						</form>
				   </div>
			   </div>
			</div>
		</div>
	</div><!--/.container-->
</div><!--/.top-bar-->

<nav class='navbar navbar-inverse' role='banner'>
	<div class='container'>
		<div class='navbar-header'>
			<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
				<span class='sr-only'>Toggle navigation</span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
			</button>
			<a class='navbar-brand' href='".Url()."'><img src='".Url()."/assets/img/other/thumb/".$head_config->img_logo."' alt='logo'></a>
		</div>
		<div class='collapse navbar-collapse navbar-right'>
			<ul class='nav navbar-nav'>";
				$url = Request::segment(2);
				$ur2 = Request::segment(5);
				$active ='';
				if($url == ''){$active = 'active';}
				echo "<li class='$active'><a href='".Url()."'>Home</a></li>";
				
				$head_cat = DB::table('tb_category')->orderBy('name','asc')->where('prnt','=',0)->get();
				foreach($head_cat as $row){
					//echo "<li><a href='".Url()."/category/".Convert_string::tosmall($row->name)."'>".$row->name."</a></li>";
					$active ='';
					if($url == strtolower($row->name) || $ur2 == $row->id){$active = 'active';}
					$head_cat_sub = DB::table('tb_category')->orderBy('name','asc')->where('prnt','=',$row->id)->get();
					if(count($head_cat_sub) > 0){
						$link 	= array();
						$id		= array();
						foreach($head_cat_sub as $item){
							$link[] = strtolower($item->name);
							$id[]	= $item->id;
						}
						$active ='';
						if(in_array($url,$link) || in_array($ur2,$id)){$active = 'active';}
						
						echo "
							<li class='dropdown $active'>
								<a href='".Url()."/category/".Convert_string::tosmall($row->name)."' class='dropdown-toggle' data-toggle='dropdown'>".$row->name." <i class='fa fa-angle-down'></i></a>
								<ul class='dropdown-menu'>";
									foreach($head_cat_sub as $item){
										echo "<li><a href='".Url()."/category/".Convert_string::tosmall($item->name)."'>".$item->name."</a></li>";
									}
									
								echo "</ul>
							</li>
						";
					}else{
						echo "<li class='$active'><a href='".Url()."/category/".Convert_string::tosmall($row->name)."'>".$row->name."</a></li>";
					}
				}
				echo "
				
				<!--<li class='dropdown'>
					<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Categories <i class='fa fa-angle-down'></i></a>
					<ul class='dropdown-menu'>
						<li><a href='".Url()."'>Blog Single</a></li>
						<li><a href='pricing.html'>Pricing</a></li>
						<li><a href='404.html'>404</a></li>
						<li><a href='shortcodes.html'>Shortcodes</a></li>
					</ul>
				</li>
				<li><a href='about-us.html'>Profile</a></li>
				<li><a href='services.html'>Skills</a></li>
				<li><a href='portfolio.html'>Portfolio</a></li>
				<li><a href='contact-us.html'>Contact</a></li>
				-->
			</ul>
		</div>
	</div><!--/.container-->
</nav><!--/nav-->";
?>