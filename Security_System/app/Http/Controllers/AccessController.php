<?php

namespace App\Http\Controllers;

use App\Access;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $access_list = Access::all();
        return view('access.index')->with('access_list',$access_list);
    }
}
