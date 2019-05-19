<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
class UserController extends Controller
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
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit')->with('user',$user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'rfid_code'=>'required'
        ]);
        $input = $request->only(['name', 'email','rfid_code']);
        $user->fill($input)->save();
        return redirect()->route('users.index')
            ->with('flash_message',
                'User successfully edited.');
    }
}

