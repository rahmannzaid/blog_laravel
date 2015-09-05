<?php
class CatController extends BaseController {
    var $title 	= 'Category';
	var $ctrl	= 'category';
	
	function __construct(){
		$this->model = new Read;
    }

	public function getIndex(){
        $name           = Request::segment(2);
		$data['data']   = $this->model->get_category($name);
		return View::make('user/'.$this->ctrl.'/bg_view',$data);
	}

}
