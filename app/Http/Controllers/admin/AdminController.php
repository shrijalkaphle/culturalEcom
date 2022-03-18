<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('role', function($q) {
            $q->where('name','=','admin');
        })->paginate(15);

        return view('admin.user.admin.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::where(['name' => 'admin'])->first();
        return view('admin.user.admin.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  'required',
            'role_id'   =>  'required|exists:roles,id',
            'email'     =>  'required|email|unique:users',
            'number'    =>  'required|digits:10',
            'password'  =>  'required|confirmed|min:6',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        User::create($input);

        return redirect()->route('admin.index')->with('success', 'New Admin created!');
    }
    
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.user.admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'password'  =>  'nullable|min:6|confirmed',
        ]);
        $user = User::findorfail($id);
        $input = array_filter($request->all());
        if(array_key_exists('password', $input))
            $input['password'] = Hash::make($input['password']);

        $user->update($input);
        return redirect()->route('admin.index')->with('success', 'Admin detail updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Admin deleted!');
    }
}
