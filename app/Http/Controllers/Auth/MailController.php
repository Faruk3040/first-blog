<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Mail\Mailable;


class MailController extends Controller
{
    public function mail(){
        return view('emails.mails');
    }

    public function save(Request $request){
        $user = User::find('email_verification_token');

        Mail::to($request->user())->send(new MailableClass($user));
    }
}