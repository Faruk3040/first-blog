<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WelcomeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $categories = DB::table('categories')->count();
        $products = DB::table('products')->count();
        $customers = DB::table('customers')->count();
        return view('dashboard/dashboard',compact('categories','products','customers'));

    }

}