<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class StarController extends Controller
{
    public function add_star(Request $request){
        $add_val=0;
        $id = $request->id;
        $star_info= DB::table('tbl_userdata')
        ->where('userdata_id','=', $id)
        ->select('count_star')
        ->get(); 
        $add_val = $star_info->first()->count_star + 1;
        DB::table('tbl_userdata')
            ->where('userdata_id', $id)
            ->update(['count_star' => $add_val]);
        return response()->json(['success'=>$add_val]);
    }
}
