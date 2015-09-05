<?php

class CategoryController extends \BaseController{
    var $title 	= 'Category';
	var $ctrl	= 'category';
    
    function __construct(){
		$this->beforeFilter('auth.zadmin');
        $this->model = new Category;
    }
    
	//=================INDEX==================//
    function getIndex(){
        $data['title']	    = $this->title;
        $data['data']   = $this->model->get_data();
		$data['category'] 		= $this->model->get_all();
        return View::make('admin/'.$this->ctrl.'/bg_view',$data);
    }
	
	//=================FILTER==================//
	function anyFilter(){
		$data['title']	    = $this->title;
        $data['category'] 		= $this->model->get_all();
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
		$rules 	= array('category' => 'required');
		$valid	= Validator::make($input,$rules);
		if($valid->passes()){
			$this->model->add($input);
			return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' '. $input['category'].' sucessfully added');
		}
        return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to add '.$this->title.' '. $input['category']);
    }
	
	//=================EDIT DATA==================//
	function anyEdit($id=null){
		if($id != null){
			$data['data'] = $this->model->get_all_except($id);
			$data['edit'] = $this->model->edit($id);
			return View::make('admin/'.$this->ctrl.'/bg_edit',$data);
		}else{
			$input 	= Input::all();
			$rules 	= array('category' => 'required');
			$valid	= Validator::make($input,$rules);
			if($valid->passes()){
				$this->model->simpan($input);
				return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' '. $input['category'].' sucessfully edited');
			}
			return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to edit '.$this->title.' '. $input['category']);
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
