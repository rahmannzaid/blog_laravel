<?= "
<!DOCTYPE html>
<html lang='en'>
  
<head>
    <meta charset='utf-8'>
    <title>Login - Bootstrap Admin Template</title>

	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <meta name='apple-mobile-web-app-capable' content='yes'> 
    
<link href='".url()."/templates/admin/css/bootstrap.min.css' rel='stylesheet' type='text/css' />
<link href='".url()."/templates/admin/css/bootstrap-responsive.min.css' rel='stylesheet' type='text/css' />

<link href='".url()."/templates/admin/css/font-awesome.css' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    
<link href='".url()."/templates/admin/css/style.css' rel='stylesheet' type='text/css'>
<link href='".url()."/templates/admin/css/pages/signin.css' rel='stylesheet' type='text/css'>

</head>

<body>
    <div class='account-container'>
        
        <div class='content clearfix'>
            <form action='".url()."/zadmin/login/process' method='post'>
                <h1>Member Login</h1>";
                if(Session::has('notification')){
                    echo "
                        <div class='alert'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Warning!</strong> ".Session::get('notification')."
                        </div>
                    ";
                }
                
                echo "<div class='login-fields'>
                    <p>Please provide your details</p>
                    <div class='field'>
                        <label for='username'>Username</label> <span style='color:red; font-style:italic'>".$errors->first('username')."</span>
                        <input type='text' id='username' name='username' value='".Form::old('username')."' placeholder='Username' class='login username-field' />
                    </div> <!-- /field -->
                    
                    <div class='field'><span style='color:red; font-style:italic'>".$errors->first('password')."</span>
                        <label for='password'>Password:</label>
                        <input type='password' id='password' name='password' value='".Form::old('password')."' placeholder='Password' class='login password-field'/>
                    </div> <!-- /password -->
                </div> <!-- /login-fields -->
                <div class='login-actions'>
                    <span class='login-checkbox'>
                        <input id='Field' name='remember' type='checkbox' class='field login-checkbox' value='First Choice' tabindex='4' />
                        <label class='choice' for='Field'>Keep me signed in</label>
                        <br>
                        <a href='#modal-reset' data-toggle='modal' >Reset Password</a>
                    </span>
                    <button class='button btn btn-success btn-large'>Sign In</button>
                </div> <!-- .actions -->
            </form>
        </div> <!-- /content -->
    </div> <!-- /account-container -->
    
    <script src='".url()."/templates/admin/js/jquery-1.7.2.min.js'></script>
    <script src='".url()."/templates/admin/js/bootstrap.js'></script>
    <script src='".url()."/templates/admin/js/signin.js'></script>
</body>
</html>";
?>
<div id='modal-reset' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button>
      <h3 id='myModalLabel'>Reset Password</h3>
    </div>
    <div class='modal-body'>
      <p>One fine body...</p>
    </div>
    <div class='modal-footer'>
      <button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
      <button class='btn btn-primary'>Save changes</button>
    </div>
</div>
