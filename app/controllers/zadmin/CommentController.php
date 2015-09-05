<?php

class CommentController extends \BaseController{
    var $title 	= 'Comment';
	var $ctrl	= 'comment';
    
    function __construct(){
		$this->beforeFilter('auth.zadmin');
        $this->model = new Comment;
    }
    
	//=================INDEX==================//
    function getIndex(){
        $data['title']	= $this->title;
		$data['ctrl']	= $this->ctrl;
        $data['data']   = $this->model->get_data();
		return View::make('admin/'.$this->ctrl.'/bg_view',$data);
    }
	
	
	//=================FILTER==================//
	function anyFilter(){
		$data['title']	= $this->title;
        $data['ctrl']	= $this->ctrl;
        
		if($_POST){
			$filter = Input::get('filter');
			if($filter == null || $filter == ''){
				return Redirect::to('zadmin/'.$this->ctrl.'');
			}
			Session::put('filter',$filter);
			$data['data']   = $this->model->filter($filter);
			$data['filter'] = $filter;
		}else{
			$data['filter'] = Session::get('filter');
			$data['data']   = $this->model->filter(Session::get('filter'));
		}
		return View::make('admin/'.$this->ctrl.'/bg_view',$data);
	}
    
	//=================View DATA==================//
	function getRead($id=null){
		if($id != null){
			$data['title']	= $this->title;
			$data['ctrl']	= $this->ctrl;
			$data['read'] = $this->model->edit($id);
			return View::make('admin/'.$this->ctrl.'/bg_read',$data);
		}
	}
	
	function getInactive(){
        $id = Request::segment(4);
        if($id){
			$change = $this->model->change_status($id,1);
			if($change == "success"){
				return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' sucessfully inactivated');
			}else{
				return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to inactivated '.$this->title);
			}
		}
    }
	
	function getActive(){
        $id = Request::segment(4);
        if($id){
			$change = $this->model->change_status($id,0);
			if($change){
				return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' sucessfully inactivated');
			}else{
				return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to inactivated '.$this->title);
			}
		}
    }
    
	
	//=================DELETE==================//
	function postDelete(){
		$delete = Input::get('delete');
		$delAll = array('');
		for($i=0;$i<count($delete);$i++) {
			$delAll[] = $delete[$i];
		}
		$this->model->hapus($delAll);
	}
	
	//=================NOTIFICATION==================//
	function getSuccess(){
		return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' sucessfully deleted');
	}
    
	function getFailed(){
		return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to delete '.$this->title);
	}
    
}
