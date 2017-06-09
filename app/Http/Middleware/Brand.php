<?php

namespace App\Http\Middleware;

use Closure;
use Hash;
use Cookie;
class Brand
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        $s_user_id = session()->get('s_user_id');
        $s_user_usertype = session()->get('s_user_usertype');
        
        if(empty($s_user_id) && empty($s_user_usertype)) {
            return redirect()->to('/login');
        }if($s_user_usertype == '0'){

         return $next($request); 
        }
        return redirect()->to('/login');
    }
}
