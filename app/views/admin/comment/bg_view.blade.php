@extends('admin.template.layout')
@section('content')
    <?="
    
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>Gender</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr> 
                    </thead>
                    <tbody>";
                        if(count($data)>0){
                            foreach($data as $row){
                                $gender = 'Male'; if($row->gender == 1){$gender='Female';}
                                $status = "<a class='btn btn-success' href='".Url()."/zadmin/comment/inactive/".$row->id."'>Active</a>";
                                if($row->status == 0){$status = "<a class='btn btn-danger'  href='".Url()."/zadmin/comment/active/".$row->id."'>Inactive</a>";}
                                echo"
                                    <tr>
                                        <td><input type='checkbox' name='delete[]' class='checkboxDelete' value='".$row->id."'></td>
                                        <td>".$row->name."</td>
                                        <td>".$row->email."</td>
                                        <td>".$row->message."</td>
                                        <td>".$gender."</td>
                                        <td>".Convert_date::english($row->created_at)."</td>
                                        <td>".$status."</td>
                                        <td>
                                            <a href='".Url()."/zadmin/$ctrl/read/".$row->id."' class='btn btn-info'>Read</a>
                                        </td>
                                    </tr>
                                ";
                            }
                        }else{
                            if(isset($filter)){
                                echo "<tr><td colspan='7' style='text-align:center'>No data with keyword <b>$filter</b><td></tr>";
                            }else{
                                echo "<tr><td colspan='7' style='text-align:center'>Empty Data<td></tr>";    
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