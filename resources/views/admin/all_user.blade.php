@extends('admin_layout')
@section('admin_content')	
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>
    <p class="alert-success">
        <?php
            $message=Session::get('message');
            if($message){
                echo $message;
                Session::put('message',NULL);
            }
        ?>
    </p>
    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Users</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>User ID </th>
                            <th>User Name</th>
                            <th>User Description</th>
                            <th>User Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                    @foreach( $all_user_info as $v_user)
                    <tr>
                        <td>{{$v_user->user_id}}</td>
                        <td class="center">{{$v_user->user_name}}</td>
                        <td class="center">{{$v_user->user_short_description}}</td>
                        <td><img src="{{URL::to($v_user->user_photo)}}" style="width: 80px; height: 80px;"></td>
                        <td class="center">
                            @if($v_user->user_status)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Unactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($v_user->user_status==1)
                                <a class="btn btn-danger" href="{{URL::to('/unactive_user/'.$v_user->user_id)}}">
                                    <i class="halflings-icon white thumbs-down"></i>  
                                </a>
                            @else
                                <a class="btn btn-success" href="{{URL::to('/active_user/'.$v_user->user_id)}}">
                                    <i class="halflings-icon white thumbs-up"></i>  
                                </a>
                            @endif

                            <a class="btn btn-info" href="{{URL::to('/edit-user/'.$v_user->user_id)}}">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="{{URL::to('/delete-user/'.$v_user->user_id)}} id="delete">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->
    
    </div><!--/row-->
@endsection