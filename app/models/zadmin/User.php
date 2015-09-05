<?php
class Userg extends Eloquent{
    #code
    protected $primaryKey   = 'id';
    protected $table        = 'users';
    
    function article(){
        return $this->hasMany('article','user_id');
    }
    
    function pasword($input){
        
    }
    
    
}
