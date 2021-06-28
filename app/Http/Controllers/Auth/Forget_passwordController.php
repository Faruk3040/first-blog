<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Forget_passwordController extends Controller
{
    public function forget_password()
    {
        return view('pages.forget-password');
    }

}
