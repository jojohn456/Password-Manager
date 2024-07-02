<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\User;

class AccountController extends Controller
{
    public function userIndexAccountGet()
    {
        $userid = Auth::user()->id;

        $accounts = Account::where('users_id', '=', $userid)
            ->select('name', 'id')
            ->get();

        return response()->json(['item' => $accounts]);
    }

    public function APIUserIndexAccountGet(Request $request)
    {
        $apitoken = $request->input('apitoken');
        $usersid = $request->input('userid');

        $users = User::where('id', '=', $usersid)
            ->select('api_token', 'id')
            ->get();

        if (Hash::check($apitoken, $users[0]->api_token)) {

            $accounts = Account::where('users_id', '=', $usersid)
                ->select('name', 'id')
                ->get();

            foreach ($accounts as $account) {

                $stringaccounts[] = json_encode($account);
            }

            return response()->json(['item' => $stringaccounts, 'error' => 'success']);
        } else {
            return response()->json(['error' => 'Forbidden', 403]);
        }

        /*
        if (Auth::attempt(['api_token' => $apitoken])) {
        }
        */
    }

    public function userIndexAccountDataGet(Request $request)
    {
        $userid = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'id' => 'required|integer'
        ]);

        if ($validator->fails()) {

            return response()->json(['error' => 'invalid']);
        };

        $id = htmlspecialchars($request->input('id'));

        $accountdata = Account::where('users_id', '=', $userid)
            ->where('id', '=', $id)
            ->select('id', 'name', 'uri', 'username', 'email', 'password', 'notes')
            ->get();

        return response()->json(['item' => $accountdata]);
    }

    public function userIndexAccountCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1|max:255',
            'uri' => 'min:0|max:255',
            'username' => 'min:0|max:255',
            'email' => 'min:0|max:255',
            'username' => 'min:0|max:255',
            'password' => 'min:0|max:255',
            'notes' => 'min:0|max:60000'
        ]);

        if ($validator->fails()) {

            return response()->json(['error' => 'invalid']);
        };

        $usersid = Auth::user()->id;
        $name = ucwords(htmlspecialchars($request->input('name')));
        $uri = htmlspecialchars($request->input('uri'));
        $username = htmlspecialchars($request->input('username'));
        $email = htmlspecialchars($request->input('email'));
        $password = htmlspecialchars($request->input('password'));
        $notes = htmlspecialchars($request->input('notes'));

        $account = Account::create([
            'status' => 1,
            'users_id' => $usersid,
            'name' => $name,
            'uri' => $uri,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'notes' => $notes
        ]);

        return response()->json(['error' => "success"]);
    }
    public function userIndexAccountUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'name' => 'required|min:1|max:255',
            'uri' => 'min:0|max:255',
            'username' => 'min:0|max:255',
            'email' => 'min:0|max:255',
            'username' => 'min:0|max:255',
            'password' => 'min:0|max:255',
            'notes' => 'min:0|max:60000'
        ]);

        if ($validator->fails()) {

            return response()->json(['error' => 'invalid']);
        };

        $usersid = Auth::user()->id;
        $id = htmlspecialchars($request->input('id'));
        $name = ucwords(htmlspecialchars($request->input('name')));
        $uri = htmlspecialchars($request->input('uri'));
        $username = htmlspecialchars($request->input('username'));
        $email = htmlspecialchars($request->input('email'));
        $password = htmlspecialchars($request->input('password'));
        $notes = htmlspecialchars($request->input('notes'));

        $accounts = Account::where('users_id', '=', $usersid)
            ->where('id', '=', $id)
            ->update([
                'name' => $name,
                'uri' => $uri,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'notes' => $notes
            ]);

        return response()->json(['error' => "success"]);
    }
    public function userIndexAccountDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
        ]);

        if ($validator->fails()) {

            return response()->json(['error' => 'invalid']);
        };

        $usersid = Auth::user()->id;
        $id = htmlspecialchars($request->input('id'));

        $accounts = Account::where('users_id', '=', $usersid)
            ->where('id', '=', $id)
            ->delete();

        return response()->json(['error' => "success"]);
    }
}
