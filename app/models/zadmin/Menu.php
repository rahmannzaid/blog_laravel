<?php
class Menu extends Eloquent{
    #code
    protected $table ='tb_menu';
    
    function get_data(){
        return Menu::orderBy('sort', 'ASC')->orderBy('id', 'ASC')->where('status',1)->where('prnt',null)->get();
    }
    
    function sub_menu($id){
        return Menu::where('prnt',$id)->get();
    }
    
}
