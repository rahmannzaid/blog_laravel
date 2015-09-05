<?php

class ReadController extends BaseController {
    var $title 	= 'Read';
    var $ctrl	= 'read';
	
    function __construct(){
		$this->model = new Read;
    }

    function getIndex(){
		$y      = Request::segment(2);
        $m      = Request::segment(3);
        $d      = Request::segment(4);
        $c     	= Request::segment(5);
		$id     = Request::segment(6);
        $title  = Request::segment(7);
        $data['data']   = $this->model->get_data('all','date',$id);
		$data['comment']= $this->model->get_comment($id);
		$data['title']	= str_replace('-',' ',$title);
		return View::make('user/'.$this->ctrl.'/bg_view',$data);
    }
	
	function getCat(){
		$y      = Request::segment(2);
        $m      = Request::segment(3);
        $d      = Request::segment(4);
        $c     	= Request::segment(5);
		$date	= $y.'-'.$m.'-'.$d;
        $data['data']   = $this->model->get_data('cat',$date,$c);
		return View::make('user/category/bg_view',$data);
    }
    
    function getDate(){
        $y      = Request::segment(2);
        $m      = Request::segment(3);
        $d      = Request::segment(4);
		$date	= $y.'-'.$m.'-'.$d;
        $data['data']   = $this->model->get_data('date',$date);
		return View::make('user/category/bg_view',$data);
    }
    
    function getMonth(){
        $y      = Request::segment(2);
        $m      = Request::segment(3);
        $date	= $y.'-'.$m;
        $data['data']   = $this->model->get_data('date',$date);
		return View::make('user/category/bg_view',$data);
	}
	
    function getYear(){
        $y      = Request::segment(2);
        $data['data']   = $this->model->get_data('date',$y);
		return View::make('user/category/bg_view',$data);
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
