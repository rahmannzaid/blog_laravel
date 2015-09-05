<?php

class LoginController extends \BaseController{
    function __construct(){
        $this->login = new Login;
    }
    
    function getIndex(){
        return View::make('admin/login/bg_login');
    }
    
    function postProcess(){
        $input=Input::all();
        $rules=array(
            'username'  => 'required',
            'password'  => 'required'
        );
        $valid  = Validator::make($input,$rules);
        if($valid->passes()){
            $username   = $input['username'];
            $password   = $input['password'];
            //$remember   = $input['remember'];
            $par= false;
            if(isset($input['remember'])){$par=true;}
            $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            
            if (Auth::attempt(array($field => $username, 'password' => $password), $par)) {
                $user = $this->login->get_data($username);
                foreach($user as $row){
                    Session::put('blog.id', $row->id);
                    Session::put('blog.name', $row->name);
                    Session::put('blog.username', $row->username);
                    Session::put('blog.email', $row->email);
                    
                    return Redirect::to('zadmin/dashboard');
                }
            }else{
                return Redirect::to('zadmin/login')->with('notification','Login failed. Your password or username is wrong');
            }
        }else{
            return Redirect::to('zadmin/login')->withErrors($valid)->withInput();
        }
    }
    
    function getLogout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('zadmin/login')->with('notification','Logout. You succesfully logout from system');
    }
}
