<?php

class ArticleController extends \BaseController{
    var $title 	= 'Article';
	var $ctrl	= 'article';
    
    function __construct(){
		$this->beforeFilter('auth.zadmin');
        $this->model = new Article;
		$this->cat = new Category;
    }
    
	//=================INDEX==================//
    function getIndex(){
        $data['title']	= $this->title;
		$data['ctrl']	= $this->ctrl;
        $data['data']   = $this->model->get_data();
		$data['category']= $this->component();
		
		return View::make('admin/'.$this->ctrl.'/bg_view',$data);
    }
	
	private function component($id=null){
		$category= $this->cat->get_all();
		$single=array();
		$component='';
		if($id == null){
			foreach($category as $item){
				$sub = $this->cat->get_sub($item->id);
				if(count($sub)>0){
					$component .= "<optgroup label='".$item->name."'>";
						foreach($sub as $items){
							$component .= "<option value='".$item->id."'>".$items->name."</option>";
						}
					$component .= "</optgroup>";
				}else{
					array_push($single,$item);
				}
			}
			foreach($single as $itms){
				$component .= "<option value='".$itms->id."'>".$itms->name."</option>";
			}
		}else{
			foreach($category as $item){
				
				$sub = $this->cat->get_sub($item->id);
				if(count($sub)>0){
					$component .= "<optgroup label='".$item->name."'>";
						foreach($sub as $items){
							$select='';if($items->id == $id){$select='selected';}
							$component .= "<option value='".$items->id."' $select>".$items->name."</option>";
						}
					$component .= "</optgroup>";
				}else{
					array_push($single,$item);
				}
			}
			foreach($single as $itms){
				$select='';if($itms->id == $id){$select='selected';}
				$component .= "<option value='".$itms->id."' $select>".$itms->name."</option>";
			}
		}
		
		return $component;
	}
	
	//=================FILTER==================//
	function anyFilter(){
		$data['title']	= $this->title;
        $data['ctrl']	= $this->ctrl;
		$data['category']= $this->component();
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
    function anyAdd(){
		if(!$_POST){
			$data['title']	= $this->title;
			$data['ctrl']	= $this->ctrl;
			$data['data']   = $this->model->get_data();
			$data['category']= $this->component();
			
			return View::make('admin/'.$this->ctrl.'/bg_add',$data);
		}else{
			$input 	= Input::all();
			$rules 	= array('category' => 'required','title'=>'required','picture'=>'required|image|max:2000|mimes:jpeg,jpg,bmp,png,gif');
			$valid	= Validator::make($input,$rules);
			if($valid->passes()){
				$this->model->add($input);
				return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.' sucessfully added');
			}
			return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to add '.$this->title);
		}
    }
	
	//=================EDIT DATA==================//
	function anyEdit($id=null){
		if($id != null){
			$data['title']	= $this->title;
			$data['ctrl']	= $this->ctrl;
			$data['edit'] = $this->model->edit($id);
			$id_category='';
			foreach($data['edit'] as $row){
				$id_category = $row->category_id;
			}
			$data['category']= $this->component($id_category);
			return View::make('admin/'.$this->ctrl.'/bg_edit',$data);
		}else{
			$input 	= Input::all();
			$rules 	= array('category_edit' => 'required','title_edit'=>'required','content_edit'=>'required','picture_edit'=>'image|max:2000|mimes:jpeg,jpg,bmp,png,gif');
			$valid	= Validator::make($input,$rules);
			if($valid->passes()){
				$this->model->simpan($input);
				return Redirect::to('zadmin/'.$this->ctrl.'')->with('success',$this->title.'  sucessfully edited');
			}
			return Redirect::to('zadmin/'.$this->ctrl.'')->with('failed','Failed to edit '.$this->title);
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
