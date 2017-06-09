<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library\MainFunction;

use App\User;


use Hash;
use Cookie;

class LoginController extends Controller
{
    
    public function index(){
        if(!session()->has('s_user_id'))
            return view('login');
       else
             return redirect()->to('/brand/home');
    }
    public function postForm(Request $request){
        $data = User::where('email',$request->email)->first();
       

        if(empty($data))
            return redirect()->back()->with(['error','ไม่มีชื่อผู้ใช้งานนี้ในระบบค่ะ']);
        if(!Hash::check($request->password,$data->password))
            return redirect()->back()->with(['error','ระหัสผ่านไม่ถูกต้องค่ะ']);

        
        session()->put('s_user_id',$data->id);
        session()->put('s_user_name',$data->name);
        session()->put('s_user_email',$data->email);
        session()->put('s_user_usertype',$data->usertype);
       session()->put('s_user_accountname',$data->accountname);

        // if($remember_me == 1){
        //     Cookie::queue('c_host_id',$data->user_id,525600);
        // }else{
        //     Cookie::queue(Cookie::forget('c_host_id'));
        // }
       return redirect()->to('/brand/home');
    }


    public function logout(){
        session()->flush();
        Cookie::queue(Cookie::forget('c_user_id'));
        return redirect()->to('login');
    }
}