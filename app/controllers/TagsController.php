<?php

class TagsController extends BaseController {
    var $title 	= 'Tags';
    var $ctrl	= 'tags';
	
    function __construct(){
		$this->model = new Read;
    }

    public function getIndex(){
        $name           = Request::segment(2);
		$data['data']   = $this->model->get_tags($name);
		return View::make('user/'.$this->ctrl.'/bg_view',$data);
	}
    

}
