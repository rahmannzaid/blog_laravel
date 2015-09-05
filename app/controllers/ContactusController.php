<?php

class ContactusController extends BaseController {
    var $title 	= 'Contact';
    var $ctrl	= 'contact';
	
    function __construct(){
		$this->model = new Contactus;
    }

    function getIndex(){
		return View::make('user/'.$this->ctrl.'/bg_view');
    }
	
	function postSend_message(){
		$input	= Input::all();
		$rules 	= array(
			'email' => 'required|email|max:100',
			'gender'=>'required|numeric|max:1',
			'id'=>'required',
			'message'=>'required',
			'name'=>'required|max:100'
		);
		$valid	= Validator::make($input,$rules);
		if($valid->passes()){
			$this->model->message($input);
			//return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' sucessfully added');
		}
	}

}
