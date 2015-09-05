<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{ URL::asset('templates/admin/js/jquery-1.7.2.min.js') }}"></script> 
<script src="{{ URL::asset('templates/admin/js/excanvas.min.js') }}"></script> 
<script src="{{ URL::asset('templates/admin/js/chart.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('templates/admin/js/bootstrap.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ URL::asset('templates/admin/js/full-calendar/fullcalendar.min.js') }}"></script>
 
<script src="{{ URL::asset('templates/admin/js/base.js') }}"></script> 
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<script> var base_url = '<?= url().'/zadmin/';?>'</script>
<script src="{{ URL::asset('assets/js/admin.js') }}"></script>
<script src="{{ URL::asset('assets/js/multiselect/js/jquery.multi-select.js') }}"></script>



<!-- Modal Empty Data-->
<div id='modal-empty' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'  onclick="closeModal('modal-empty') ">&times;</button>
        <h3 id='myModalLabel'>Confirmation</h3>
    </div>
    <div class='modal-body'>
        <p>No data is selected. Please select data first!!</p>
    </div>
    <div class='modal-footer'>
        <button class='btn' data-dismiss='modal' aria-hidden='true'  onclick="closeModal('modal-empty') " >Close</button>
    </div>
</div>

<!-- Modal Delete Confirmation -->
<div id='modal-confirmation' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'  onclick="closeModal('modal-confirmation') ">&times;</button>
        <h3 id='myModalLabel'>Delete selected data?</h3>
    </div>
    <div class='modal-body'>
        <p>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
    </div>
    <div class='modal-footer'>
        <button class='btn' data-dismiss='modal' aria-hidden='true'  onclick="closeModal('modal-confirmation') " >Close</button>
        <button class='btn btn-primary' onclick="delete_table('modal-confirmation') ">Delete</button> 
    </div>
</div>

<!-- Modal Edit-->
<div class='modal fade' id='modal-edit' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'  onclick="closeModal('modal-edit')" >&times;</button>
                 <h4 class='modal-title mod-title'>Edit</h4>
            </div>
            <div class='mod-content'>
                <center>
                    <img src='<?=Url();?>/assets/img/other/ajax-loader.gif'/>
                </center>
                <center>
                    Loading Content ..
                </center>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal Change Password-->
<div id='modal-change-password' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true' onclick="closeModal('modal-change-password') ">x</button>
        <h3 id='myModalLabel'>Change Password</h3>
    </div>
    <form action='<?= Url()."/zadmin/profile/password";?>' method='post' class='form-horizontal' id='form-change-password'>
    <div class='modal-body'>
        <fieldset>
            <div class='control-group'>											
                <label class='control-label' for='old_pass'>Old Password</label>
                <div class='controls'>
                    <input type='password' class='span3' id='old_pass' name='old_pass' autocomplete='off'>
                </div> <!-- /controls -->				
            </div> <!-- /control-group -->
            <div class='control-group'>											
                <label class='control-label' for='new_pass'>New Password</label>
                <div class='controls'>
                    <input type='password' class='span3' id='new_pass' name='new_pass'>
                </div> <!-- /controls -->				
            </div> <!-- /control-group -->
            <div class='control-group'>											
                <label class='control-label' for='re_new_pass'>Re-new Password</label>
                <div class='controls'>
                    <input type='password' class='span3' id='re_new_pass' name='re_new_pass'>
                </div> <!-- /controls -->				
            </div> <!-- /control-group -->
        </fieldset>
    </div>
    <div class='modal-footer'>
        <a class='btn' data-dismiss='modal' aria-hidden='true' onclick="closeModal('modal-change-password') ">Close</a>
        <input type='submit' class='btn btn-primary' value='Save' />
    </div>
    </form>
</div>
