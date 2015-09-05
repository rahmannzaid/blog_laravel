<?
foreach($edit as $row){
echo "
    <form action='".Url()."/zadmin/category/edit' method='post' class='form-horizontal' id='form-edit-category'>
        <div class='modal-body'>
            <input type='hidden' name='id' value='".$row->id."'/>
            <fieldset>
                <div class='control-group'>											
                    <label class='control-label' for=''>Parent</label>
                    <div class='controls'>
                        <select class='form-control' name='prnt'>
                            <option value=''>-- Parent --</option>";
                            foreach($data as $item){
                                $select='';
                                if($item->id == $row->prnt){$select='selected';}
                                echo "<option value='".$item->id."' $select>".$item->name."</option>";
                            }
                            echo"
                        </select>
                    </div> <!-- /controls -->				
                </div> <!-- /control-group -->
                
                
                <div class='control-group'>											
                    <label class='control-label' for='name'>Category Name</label>
                    <div class='controls'>
                        <input type='text' class='span3' id='name' name='category' value='".$row->name."'>
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
        $('#form-edit-category').validate({
            rules:{
                category: {required: true,maxlength: 100}
            }
        });
    })
</script>