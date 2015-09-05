<?php

class SettingController extends \BaseController{
    var $title 	= 'Setting';
	var $ctrl	= 'setting';
    
    function __construct(){
		$this->beforeFilter('auth.zadmin');
        $this->model = new Setting;
    }
    
	//=================INDEX==================//
    function getIndex(){
        $data['title']	= $this->title;
		$data['ctrl']	= $this->ctrl;
        $data['data']   = $this->model->edit();
		return View::make('admin/'.$this->ctrl.'/bg_view',$data);
    }
	
	function postSave(){
		$input 	= Input::all();
		$rules 	= array(
			//'name' => 'required',
			//'phone' => 'required',
		);
		$valid	= Validator::make($input,$rules);
		if($valid->passes()){
			$this->model->simpan($input);
			return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',' Profile sucessfully edited');
		}
		return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to edit profile');
	}
	
	function anyImages(){
		if($_POST){
			$input 	= Input::all();
			$rules 	= array(
				'icon'=>'image|max:100|mimes:jpeg,jpg,bmp,png,gif',
				'logo'=>'image|max:2000|mimes:jpeg,jpg,bmp,png,gif'
			);
			$valid	= Validator::make($input,$rules);
			if($valid->passes()){
				$this->model->image($input);
				return Redirect::to('zadmin/'.$this->ctrl.'/images')->with('success',' Profile sucessfully edited');
			}
			return Redirect::to('zadmin/'.$this->ctrl.'/images')->with('failed','Failed to edit profile');
		}else{
			$data['title']	= $this->title;
			$data['ctrl']	= $this->ctrl;
			$data['data']   = $this->model->edit();
			return View::make('admin/'.$this->ctrl.'/bg_image',$data);
		}
	}
	
	
	//=================CHANGE PASSWORD==================//
	function postPassword(){
		Validator::extend('passcheck', function($attribute, $value, $parameters) {
			return Hash::check($value, Auth::user()->password);
		});
		$messages = array(
			'passcheck' => 'Your old password was incorrect',
		);
		$input	=Input::all();
		$rules	= array(
			'old_pass' => 'required|passcheck',
			'new_pass' => 'required|min:5',
			're_new_pass' => 'required|min:5|same:new_pass'
		);
		$valid=Validator::make($input,$rules,$messages);
		if($valid->passes()){
			$this->model->password($input);
			return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' sucessfully changed');
		}
		return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to change '.$this->title.', Because your old password is incorresct ');
	}
	
	//=================NOTIFICATION==================//
	function getSuccess(){
		return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' sucessfully deleted');
	}
    
	function getFailed(){
		return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to delete '.$this->title);
	}
    
}
