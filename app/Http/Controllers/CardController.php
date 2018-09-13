<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CardController extends Controller
{
    public function index(){
        return view('admin.add_card');
    }

    public function save_card(Request $request){
        $data=array();
        $data['card_name']=$request->card_name;
        $data['user_id']=$request->user_id;
        $data['user_description']=$request->user_description;
        $data['uncoverd_description']="Uncoverd";
        $data['max_star']=$request->max_star;
        $data['count_star']=0;
        $data['publication_status']=$request->publication_status;
        $image=$request->file('card_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['card_image']=$image_url;
                DB::table('tbl_userdata')->insert($data);
                Session::put('message','Card added successfully!!');
                return Redirect::to('/add-card');
            }
        }

        $data['product_image']='';
        DB::table('tbl_products')->insert($data);
        Session::put('message', 'Pruduct added successfully without image!!');
        return Redirect::to('/add-product');
    }

    public function all_card(){

        $all_card_info=DB::table('tbl_userdata')
                            ->leftjoin('tbl_users', 'tbl_userdata.user_id','=','tbl_users.user_id')
                            ->select('tbl_userdata.*','tbl_users.user_name','tbl_users.user_photo')
                            ->get();
        $manage_card=view('admin.all_card')
            ->with('all_card_info',$all_card_info);

        return view('admin_layout')
            ->with('admin.all_card', $manage_card);
    }

    public function unactive_card($card_id){
        
        DB::table('tbl_userdata')
            ->where('userdata_id', $card_id)
            ->update(['publication_status' => 0]);
        Session::put('message', 'Card Unactive Successfully!!');
        return Redirect::to('/all-card');
    }

    public function active_card($card_id){
        
        DB::table('tbl_userdata')
            ->where('userdata_id', $card_id)
            ->update(['publication_status' => 1]);
        Session::put('message', 'Card Active Successfully!!');
        return Redirect::to('/all-card');
    }

    public function delete_card($card_id){
        DB::table('tbl_userdata')
            ->where('userdata_id', $card_id)
            ->delete();
        Session::put('message', 'Card delete successfully!!');
        return Redirect::to('/all-card');
    }
}
