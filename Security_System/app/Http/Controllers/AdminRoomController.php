<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\User;
class AdminRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('adminrooms.index')->with('rooms',$rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $users = Room::find($id)->Users()->get();
        $allUsers = User::all(['id','name']);
        return view('adminrooms.edit',compact('room','users','allUsers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:120',
            'floor'=>'required'
        ]);
        $input = $request->only(['name', 'floor']);
        $userid = $request->get('users');
        if($room->users()->where('id',$userid)->exists()){
            return redirect()->back()->with('alert','This user is already asigned to this room');
        }
        $room->users()->attach($userid);
        $room->fill($input)->save();
        return redirect()->route('adminrooms.index')
            ->with('flash_message',
                'User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
    }
}
