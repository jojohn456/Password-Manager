<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class SigninController extends Controller
{
    public function signinUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:1|max:255',
            'password' => 'required|alpha_num|min:1|max:255',
        ]);

        if ($validator->fails()) {

            return response()->json(['error' => 'invalid']);
        };

        $username = htmlspecialchars($request->input('username'));
        $password = htmlspecialchars($request->input('password'));

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            if (Auth::attempt(['email' => $username, 'password' => $password])) {
                if (Auth::user()->role_id == 1) {
                    return response()->json(['role_id' => '1']);
                } else if (Auth::user()->role_id == 0) {
                    return response()->json(['role_id' => '0']);
                } else {
                    return redirect('/');
                }
            } else {

                return response()->json(['error' => 'passnotmatch']);
            }
        } else {
            if (Auth::attempt(['username' => $username, 'password' => $password])) {
                if (Auth::user()->role_id == 1) {
                    return response()->json(['role_id' => '1']);
                } else if (Auth::user()->role_id == 0) {
                    return response()->json(['role_id' => '0']);
                } else {
                    return redirect('/');
                }
            } else {

                return response()->json(['error' => 'passnotmatch']);
            }
        }
    }

    public function APISigninUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:1|max:255',
            'password' => 'required|alpha_num|min:1|max:255',
        ]);

        if ($validator->fails()) {

            return response()->json(['message' => 'invalid']);
        };

        $username = htmlspecialchars($request->input('username'));
        $password = htmlspecialchars($request->input('password'));

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            if (Auth::attempt(['email' => $username, 'password' => $password])) {
                if (Auth::user()->role_id == 1) {

                    $usersid = Auth::user()->id;
                    $stringusersid = strval($usersid);
                    $apitoken = Auth::user()->username . Str::random(20);

                    $users = User::where('id', '=', $usersid)
                        ->update([
                            'api_token' => Hash::make($apitoken),
                            'mobile_api_token' => Hash::make($apitoken),
                        ]);

                    return response()->json(['token' => $apitoken, 'userid' => $stringusersid, 'error' => 'success']);
                } else if (Auth::user()->role_id == 0) {
                    return response()->json(['error' => 'notverified']);
                } else {
                    return response()->json(['error' => 'invalid']);
                }
            } else {

                return response()->json(['error' => 'passnotmatch']);
            }
        } else {
            if (Auth::attempt(['username' => $username, 'password' => $password])) {
                if (Auth::user()->role_id == 1) {

                    $usersid = Auth::user()->id;
                    $stringusersid = strval($usersid);
                    $apitoken = Auth::user()->username . Str::random(20);
                    $mobileapitoken = Auth::user()->username . Str::random(20);

                    $users = User::where('id', '=', $usersid)
                        ->update([
                            'api_token' => Hash::make($apitoken),
                            'mobile_api_token' => Hash::make($mobileapitoken),
                        ]);

                    return response()->json(['token' => $apitoken, 'userid' => $stringusersid, 'error' => 'success']);
                } else if (Auth::user()->role_id == 0) {
                    return response()->json(['error' => 'notverified']);
                } else {
                    return response()->json(['error' => 'invalid']);
                }
            } else {

                return response()->json(['error' => 'passnotmatch']);
            }
        }
    }

    public function authCheck(Request $request)
    {
        $role_id = htmlspecialchars($request->input('role_id'));

        if (Auth::check()) {

            if (Auth::user()->role_id == $role_id) {

                return response()->json(['authenticated' => '1']);
            } else {
                return response()->json(['authenticated' => '0']);
            }
        } else if (!Auth::check()) {
            return response()->json(['authenticated' => '0']);
        }
    }
    public function userName()
    {
        $firstname = Auth::user()->firstname;
        $lastname = Auth::user()->lastname;

        return response()->json(['firstname' => $firstname, 'lastname' => $lastname]);
    }
    public function signoutUser()
    {
        Auth::logout();
    }
}
