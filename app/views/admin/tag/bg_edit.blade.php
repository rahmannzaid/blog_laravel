<?
foreach($edit as $row){
echo "
    <form action='".Url()."/zadmin/tag/edit' method='post' class='form-horizontal' id='form-edit-tag'>
        <div class='modal-body'>
            <input type='hidden' name='id' value='".$row->id."'/>
            <fieldset>
                <div class='control-group'>											
                    <label class='control-label' for='tag'>Tag Name</label>
                    <div class='controls'>
                        <input type='text' class='span3' id='tag' name='tag' value='".$row->name."'>
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
            </fieldset>
        
        </div>
        <div class='modal-footer'>
            <a class='btn' onclick=javascript:closeModal('modal-edit') >Close</a>
            <input type='submit' class='btn btn-primary' value='Save' />
        </div>
    </form>
";
}
?>
<script>
    $(function(){
        $('#form-edit-tag').validate({
            rules:{
                tag: {required: true,maxlength: 100}
            }
        });
    })
</script>