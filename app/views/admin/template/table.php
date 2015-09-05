@extends('admin.template.layout')
@section('content')
    <?="
    <div class='span12'>
        <div class='widget widget-nopad'>
            <div class='widget-header'> <i class='icon-list-alt'></i>
                <h3> $title </h3>
            </div>
            <!-- /widget-header -->
            <div class='widget-content'>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <td>Category Name</td>
                            <td>Action</td>
                        </tr> 
                    </thead>
                    <tbody>
                        <tr>
                            <td>dfsdf</td>
                            <td>
                                <a href=''>Edit</a> | 
                                <a href=''>Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /widget -->
    </div>";
    ?>
    
@stop