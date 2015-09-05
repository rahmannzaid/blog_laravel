<?php
class DashboardController extends \BaseController{
	
	var $title	= 'Dashboard';
	
    function __construct(){
        $this->beforeFilter('auth.zadmin');
    }
    
    function getIndex(){
		$data['title']	= $this->title;;
        return View::make('admin/template/dashboard',$data);
    }
    
    function getTes(){
		Session::put('key', 'value');
		return Session::get('key');
	}
}
