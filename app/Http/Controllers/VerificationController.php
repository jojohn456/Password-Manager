<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignupVerification;

class VerificationController extends Controller
{
    public function sendSignupVerification()
    {

        $email = Auth::user()->email;
        $firstname = Auth::user()->firstname;
        $verification_token = Str::random(10);

        User::where('id', Auth::user()->id)
            ->update(['verification_token' => $verification_token]);

        Mail::to($email)->send(new SignupVerification($verification_token, $firstname));
    }

    public function signupVerification($verification_token)
    {

        $userexist = user::where('verification_token', '=', $verification_token)
            ->count();

        if ($userexist >= 1) {

            $users = user::where('verification_token', '=', $verification_token)
                ->select('username')
                ->get();

            $verification_token = md5($users[0]->username) . Str::random(10);

            User::where('username', '=', $users[0]->username)
                ->update([
                    'role_id' => 1,
                    'remember_token' => $verification_token
                ]);

            Auth::logout();

            return redirect('/verified');
        } else if ($userexist == 0) {
            return redirect('/404');
        }
    }
}
