<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	var $title 	= 'Home';
	var $ctrl	= 'home';
	
	function __construct(){
		$this->model = new Read;
    }

	public function getIndex(){
		$data['data']   = $this->model->get_article();
		return View::make('user/'.$this->ctrl.'/bg_view',$data);
	}
	
	function postAddview(){
		//print_r(Input::all());
		$this->model->add_view(Input::get('id'));
	}
	
	function getSearch(){
		$search=Input::get('search');
		$data['search'] = $search;
		$data['data']   = $this->model->get_search(Input::get('search'));
		return View::make('user/'.$this->ctrl.'/bg_view',$data);
	}

}
