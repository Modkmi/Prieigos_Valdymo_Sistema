<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index(){
         $id = auth()->user()->getAuthIdentifier();
         $rooms = User::find($id)->rooms()->get();
         //return $rooms->rooms()->get();
         return view('rooms.index')->with('rooms', $rooms);
    }
}
