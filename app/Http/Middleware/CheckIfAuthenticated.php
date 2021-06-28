<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Email;

use function PHPUnit\Framework\matches;

class CheckIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       if (Auth::check()==false)
       {
           return redirect('login');
       }


        return $next($request);
    }
}

//
//if(!session()->has('LoggedUser') && ($request->path() !='login' && $request->path() !='register' )){
//    return redirect('login')->with('fail','You must be logged in');
//}

//if(session()->has('LoggedUser') && ($request->path() == 'login' || $request->path() == 'register' ) ){
//    return back();
//}
