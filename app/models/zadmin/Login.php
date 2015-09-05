<?php
//namespace zadmin;

//use Eloquent;

class Login extends Eloquent{
    protected $primaryKey   = 'id';
    protected $table        = 'users';
    
    function get_data($user,$pass=null){
        $field = filter_var($user, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return User::where($field,$user)->get();
    }
}
