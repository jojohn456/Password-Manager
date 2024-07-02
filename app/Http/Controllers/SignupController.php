<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignupVerification;
use Carbon\Carbon;

class SignupController extends Controller
{
    public function signupUserCreate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'firstname' => 'required|min:1|max:50',
                'lastname' => 'required|min:1|max:50',
                'email' => 'required|email|min:1|max:70',
                'username' => 'required|alpha_num|min:1|max:50',
                'password' => 'required|alpha_num|min:1|max:255',
                'repassword' => 'required|alpha_num|min:1|max:255'
            ]);

            if ($validator->fails()) {

                return response()->json(['message' => 'invalid']);
            };

            $first_name = ucwords(htmlspecialchars($request->input('firstname')));
            $last_name = ucwords(htmlspecialchars($request->input('lastname')));
            $email = htmlspecialchars($request->input('email'));
            $username = htmlspecialchars($request->input('username'));
            $password = htmlspecialchars($request->input('password'));
            $re_password = htmlspecialchars($request->input('repassword'));

            if ($password != $re_password) {

                return response()->json(['message' => 'passnotmatch']);
            } else if ($password == $re_password) {

                $userexist = User::where('firstname', '=', $first_name)
                    ->where('lastname', '=', $last_name)
                    ->orWhere('email', '=', $email)
                    ->orWhere('username', '=', $username)
                    ->count();

                if ($userexist == 0) {

                    User::create([
                        'role_id' => 0,
                        'firstname' => $first_name,
                        'lastname' => $last_name,
                        'email' => $email,
                        'username' => $username,
                        'password' => Hash::make($password),
                        'verification_token' => '',
                        'verification_token_expiry' => Carbon::now(),
                        'remember_token' => '',
                        'remember_token_expiry' => Carbon::now(),
                        'datetime' => Carbon::now(),
                    ]);

                    return response()->json(['message' => "success"]);
                } else if ($userexist >= 1) {
                    return response()->json(['message' => "userexist"]);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['message' => "error"]);
        }
    }
}
