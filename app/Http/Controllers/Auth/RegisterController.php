<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Random;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register()
    {
        return view('pages.register');
    }
    public function save(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile_number' => 'required|unique:users,mobile_number',
        ]);

        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'mobile_number' => trim($request->input('mobile_number')),
            'email_verification_token' => Str::random(20),
        ]);

        session()->flash('success', 'Your account is created');

        return redirect()->route('login');
    }
}
