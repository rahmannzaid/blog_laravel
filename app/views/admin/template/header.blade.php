<?="
<div class='navbar navbar-fixed-top'>
	<div class='navbar-inner'>
		<div class='container'> <a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'><span
						class='icon-bar'></span><span class='icon-bar'></span><span class='icon-bar'></span> </a><a class='brand' href='index.html'>Admin Blog rahmannzaid.com </a>
			<div class='nav-collapse'>
				<ul class='nav pull-right'>
					<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'><i
									  class='icon-user'></i> ".Session::get('blog.username')." <b class='caret'></b></a>
						<ul class='dropdown-menu'>
							<li><a href='".Url()."/zadmin/profile'>Profile</a></li>
							<!--<li><a href='#modal-change-password'  data-toggle='modal'>Change Password</a></li>
							<li><a href='".Url()."/zadmin/profile/setting'>Settings</a></li>-->
							<li><a href='".Url()."/zadmin/login/logout'>Logout</a></li>
						</ul>
					</li>
				</ul>
				<!--<form class='navbar-search pull-right'>
					<input type='text' class='search-query' placeholder='Search'>
				</form> --> 
			</div>
		  <!--/.nav-collapse --> 
		</div>
		<!-- /container --> 
	</div>
	<!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class='subnavbar'>
	<div class='subnavbar-inner'>
		<div class='container'>
			<ul class='mainnav'>";
				$this->menu = new Menu;
				$menu = $this->menu->get_data();
				$url = Request::segment(2);
				foreach($menu as $row){
					$class ='';
					$find = $this->menu->sub_menu($row->id);
					if(count($find) > 0){
						$link=array('');
						foreach($find as $item){
							$link[]=$item->ahref;
						}
						if(in_array($url,$link)){
							$class='active';
						}
					}else{
						if($url == $row->ahref){$class='active';}
					}
					echo "<li class='".$row->liclass." $class'>
						<a href='".Url()."/zadmin/".$row->ahref."' class='".$row->aclass."' data-toggle='".$row->atoggle."'>
							<i class='icon-".$row->icon."'></i>
							<span>".$row->name."</span>
						</a>";
						if($row->liclass == 'dropdown'){
							$sub = $this->menu->sub_menu($row->id);
							echo "<ul class='dropdown-menu'>";
							foreach($sub as $item){
								echo "<li><a href='".url()."/zadmin/".$item->ahref."'>".$item->name."</a></li>";
							}
							echo "</ul>";
						}
					echo "</li>";
				}
				echo "
				
			</ul>
		</div>
		<!-- /container --> 
	</div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->";
?>