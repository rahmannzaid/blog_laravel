<?php

class TagController extends \BaseController{
    var $title 	= 'Tag';
	var $ctrl	= 'tag';
    
    function __construct(){
		$this->beforeFilter('auth.zadmin');
        $this->model = new Tag;
    }
    
	//=================INDEX==================//
    function getIndex(){
        $data['title']	    = $this->title;
		$data['ctrl']	    = $this->ctrl;
        $data['data']   	= $this->model->get_data();
        return View::make('admin/'.$this->ctrl.'/bg_view',$data);
    }
	
	//=================FILTER==================//
	function anyFilter(){
		$data['title']	    = $this->title;
		$data['ctrl']	    = $this->ctrl;
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
    
	//=================ADD DATA==================//
    function postAdd(){
        $input 	= Input::all();
		$rules 	= array('tag' => 'required');
		$valid	= Validator::make($input,$rules);
		if($valid->passes()){
			$this->model->add($input);
			return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' '. $input['tag'].' sucessfully added');
		}
        return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to add '.$this->title.' '. $input['tag']);
    }
	
	//=================EDIT DATA==================//
	function anyEdit($id=null){
		if($id != null){
			$data['edit'] = $this->model->edit($id);
			return View::make('admin/'.$this->ctrl.'/bg_edit',$data);
		}else{
			$input 	= Input::all();
			$rules 	= array('tag' => 'required');
			$valid	= Validator::make($input,$rules);
			if($valid->passes()){
				$this->model->simpan($input);
				return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' '. $input['tag'].' sucessfully edited');
			}
			return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to edit '.$this->title.' '. $input['tag']);
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
