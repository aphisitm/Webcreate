<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\user;
use App\campaign;
use Hash;
use DB;


class ProfileController extends Controller
{

    public function __construct()
    {
       $this->middleware('brand');
       
    }   

    public function index()
    {
    $this->model = 'App\User';
    $this->obj_model = new $this->model;
    $obj_model = $this->obj_model;

    $user_id = session()->get('s_user_id');
    $data = user::where('users.id',$user_id)->first();

    $datacount = user::join('campaigns', 'users.id', '=', 'campaigns.user_id')
            ->select(DB::raw('count(campaigns.user_id) as campaigns_count'))
            ->groupBy('campaigns.user_id')
            ->where('users.id',$user_id)->first();


    return view('Brand.profilebrand',compact('datacount','data','obj_model'));
    }

     public function update(Request $request, $id)
    {
        $this->validate($request, [
            'aboutme' => 'required',
            'phone' => 'required',
            
        ]);

       

         $edit = user::find($id);
            $edit->aboutme    = Input::get('aboutme');
            $edit->phone      = Input::get('phone');         
            $edit->save();

            // redirect
            
            return redirect()->to('brand/myprofile');
        
    }

   
   
}
