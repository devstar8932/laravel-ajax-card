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
            <a href="#">Add Card</a>
        </li>
    </ul>
    
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Card</h2>
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
                <form class="form-horizontal" action="{{URL::to('/save-card')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <fieldset>
                    <div class="control-group">
                      <label class="control-label" for="date01">Card Name</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" name="card_name" required="">
                      </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">User Name</label>
                        <div class="controls">
                        <select id="selectError3" name="user_id">
                            <option>select user</option>
                            <?php
                                $all_published_user=DB::table('tbl_users')
                                                        ->where('user_status',1)
                                                        ->get();
                                foreach($all_published_user as $v_user){?>	
                                    <option value="{{$v_user->user_id}}">{{$v_user->user_name}}</option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                      <label class="control-label" for="textarea2">User description</label>
                      <div class="controls">
                        <textarea class="cleditor" name="user_description" rows="3" required=""></textarea>
                      </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Star MaxCount</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="max_star" required="">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="fileInput">Image</label>
                        <div class="controls">
                            <input class="input-file uniform_on" name="card_image" id="fileInput" type="file">
                        </div>
                    </div>  

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Publication status</label>
                        <div class="controls">
                            <input rel="active" type="checkbox" name="publication_status" value="1" />
                        </div>
                    </div>

                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Add Card</button>
                      <button type="reset" class="btn">Cancel</button>
                    </div>
                  </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection