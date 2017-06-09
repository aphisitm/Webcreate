<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\User;


use Hash;
use Cookie;

class RegisterController extends Controller
{
    
    public function index(){
        
            return view('register');
    }
  public function store(Request $request){
       
       $input = $request->all();
        User::create([
            'accountname' => $input['accountname'],
            'name' => $input['name'],
            'email' => $input['email'],
            'usertype' => $input['usertype'],
            'phone' => $input['phone'],
            'password' => bcrypt($input['password']),
        ]);
  
       return redirect()->to('login');
    }
    


}