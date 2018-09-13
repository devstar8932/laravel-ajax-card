<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class UserController extends Controller
{
    public function index(){
        return view('admin.add_user');
    }

    public function save_user(Request $request){ 
        $data=array();
        $data['user_name']=$request->user_name;
        $data['user_short_description']=$request->user_short_description;
        $data['user_status']=$request->user_status;
        if(isset($request->user_status)){
            $data['user_status']=1;
        } else {
            $data['user_status']=0;
        } 
        $image=$request->file('user_photo');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['user_photo']=$image_url;
                DB::table('tbl_users')->insert($data);
                Session::put('message','User added successfully!!');
                return Redirect::to('/add-user');
            }
        }

        $data['user_photo']='';
        DB::table('tbl_users')->insert($data);
        Session::put('message', 'User added successfully without photo!!');
        return Redirect::to('/add-user');
    }

    public function all_user(){

        $all_user_info=DB::table('tbl_users')->get();                  
        $manage_user=view('admin.all_user')
            ->with('all_user_info',$all_user_info);

        return view('admin_layout')
            ->with('admin.all_user', $manage_user);
    }

    public function edit_user($user_id){
        $user_info=DB::table('tbl_users')
            ->where('user_id', $user_id)
            ->first();
        $user_info=view('admin.edit_user')
            ->with('user_info',$user_info);

        return view('admin_layout')
            ->with('admin.edit_user', $user_info);
    }

    public function update_user(Request $request,$user_id){
        $data=array();
        $data['user_name']=$request->user_name;
        $data['user_short_description']=$request->user_short_description;
        $data['user_status']=$request->user_status;
        if(isset($request->user_status)){
            $data['user_status']=1;
        } else {
            $data['user_status']=0;
        } 
        $image=$request->file('user_photo');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['user_photo']=$image_url;
                DB::table('tbl_users')->insert($data);
                Session::put('message','User updated successfully!!');
                return Redirect::to('/add-user');
            }
        }

        $data['user_photo']='';
        DB::table('tbl_users')
            ->where('user_id', $user_id)
            ->update($data);
        Session::put('message', 'User updated successfully without photo!!');
        return Redirect::to('/all-user');
    }

    public function delete_user($user_id){
        DB::table('tbl_users')
            ->where('user_id', $user_id)
            ->delete();
        Session::put('message', 'User delete successfully!!');
        return Redirect::to('/all-user');
    }

    public function unactive_user($user_id){
        
        DB::table('tbl_users')
            ->where('user_id', $user_id)
            ->update(['user_status' => 0]);
        Session::put('message', 'User Unactive Successfully!!');
        return Redirect::to('/all-user');
    }

    public function active_user($user_id){
        
        DB::table('tbl_users')
            ->where('user_id', $user_id)
            ->update(['user_status' => 1]);
        Session::put('message', 'User Active Successfully!!');
        return Redirect::to('/all-user');
    }

}
