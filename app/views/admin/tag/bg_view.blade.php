@extends('admin.template.layout')
@section('content')
    <?="
    
    
    <div id='modal-add' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-hidden='true' onclick=\"closeModal('modal-add') \">x</button>
            <h3 id='myModalLabel'>Add $title</h3>
        </div>
        <form action='".Url()."/zadmin/$ctrl/add' method='post' class='form-horizontal' id='form-add-$ctrl'>
        <div class='modal-body'>
            
                <fieldset>
                    <div class='control-group'>											
                        <label class='control-label' for='name'>$title Name</label>
                        <div class='controls'>
                            <input type='text' class='span3' id='name' name='tag'>
                        </div> <!-- /controls -->				
                    </div> <!-- /control-group -->
                </fieldset>
            
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn' data-dismiss='modal' aria-hidden='true' onclick=\"closeModal('modal-add') \">Close</button>
            <input type='submit' class='btn btn-primary' value='Save' />
        </div>
        </form>
    </div>
    
    <div class='span12'>
        <div class='widget widget-nopad'>
            <div class='widget-header'> <i class='icon-list-alt'></i>
                <h3> $title </h3>
                <span class='search-right'>
                    <form method='post' action='".url()."/zadmin/$ctrl/filter'>";
                        $value='';
                        if(isset($filter)){
                            $value=$filter;
                        }
                        echo "<input type='text' class='search-input search' placeholder='Search $title' name='filter' value='$value'/>
                        <input type='submit' value='Search' class='btn btn-info search-btn' />
                    </form>
                </span>
            </div>
            <!-- /widget-header -->
            <div class='widget-content'>
                <span class='btn-area'>
                    <a class='btn btn-success btn-margin' href='#modal-add'  data-toggle='modal' >Add</a>
                    <a class='btn btn-danger btn-margin' onClick=javascript:confirm_table('$ctrl','delete') >Delete</a>
                </span>";
                if(Session::has('success')){
                    echo "
                        <div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            ".Session::get('success')."
                        </div>
                    ";
                }
                if(Session::has('failed')){
                    echo "
                        <div class='alert'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Warning!</strong> ".Session::get('failed')."
                        </div>
                    ";
                }
                echo "<table class='table table-striped'>
                    <thead>
                        <tr>
                            <th width='50px'><input type='checkbox' id='checkall'/></th>
                            <th>$title Name</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>";
                        if(count($data)>0){
                            foreach($data as $row){
                                echo"
                                    <tr>
                                        <td><input type='checkbox' name='delete[]' class='checkboxDelete' value='".$row->id."'></td>
                                        <td>".$row->name."</td>
                                        <td>
                                            <a  onclick=javascript:access_link('$ctrl/edit/".$row['id']."','$title')  data-toggle='modal' class='btn btn-info' data-target='#modal-edit'>Edit</a>
                                        </td>
                                    </tr>
                                ";
                            }
                        }else{
                            if(isset($filter)){
                                echo "<tr><td colspan='3' style='text-align:center'>No data with keyword <b>$filter</b><td></tr>";
                            }else{
                                echo "<tr><td colspan='3' style='text-align:center'>Empty Data<td></tr>";    
                            }
                            
                        }
                        
                    echo "</tbody>
                </table>
                <div class='pagination-area'>
                    ".$data->links()."
                </div>
            </div>
        </div>
        <!-- /widget -->
    </div>";
    ?>
    
@stop