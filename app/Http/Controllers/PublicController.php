<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Response;

class PublicController extends Controller
{
    public function index()
    {

        return view('index');
    }
}
