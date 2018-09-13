@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Update user</a>
        </li>
    </ul>
    
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add User</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{URL::to('/update-user',$user_info->user_id)}}" method="post">
                    {{ csrf_field() }}
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="date01">Category Name</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" name="user_name" value="{{$user_info->user_name}}">
                      </div>
                    </div>
      
                    <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">User short description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="user_short_description" rows="3" required="">
                            {{$user_info->user_short_description}}
                        </textarea>
                    </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="fileInput">User photo</label>
                        <div class="controls">
                            <input class="input-file uniform_on" name="user_photo" id="fileInput" type="file" >
                        </div>
                    </div>  

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">User status</label>
                        <div class="controls">
                            <input rel="active" type="checkbox" name="user_status" value="{{$user_info->user_status}}" />
                        </div>
                    </div>

                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection