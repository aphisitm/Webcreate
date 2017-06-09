<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\user;
use Hash;

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
    $data = user::where('id',$user_id)->first();

    return view('Brand.profilebrand',compact('data','obj_model'));
    }

   
   
}
