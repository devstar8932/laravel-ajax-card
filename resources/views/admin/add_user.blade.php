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
            <a href="#">Add User</a>
        </li>
    </ul>
    
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add User</h2>
            </div>
            <p class="alert-success">
                <?php
                    $message=Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',NULL);
                    }
                ?>
            </p>
            <div class="box-content">
                <form class="form-horizontal" action="{{URL::to('/save-user')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="date01">User Name</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" name="user_name" required="">
                      </div>
                    </div>

                    <div class="control-group hidden-phone">
                      <label class="control-label" for="textarea2">User short description</label>
                      <div class="controls">
                        <textarea class="cleditor" name="user_short_description" rows="3" required=""></textarea>
                      </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="fileInput">User photo</label>
                        <div class="controls">
                            <input class="input-file uniform_on" name="user_photo" id="fileInput" type="file">
                        </div>
                    </div>  

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">User status</label>
                        <div class="controls">
                            <input rel="active" type="checkbox" name="user_status" value="1" />
                        </div>
                    </div>

                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Add User</button>
                      <button type="reset" class="btn">Cancel</button>
                    </div>
                  </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection