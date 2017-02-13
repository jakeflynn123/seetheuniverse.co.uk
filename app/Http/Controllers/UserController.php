<?php

namespace App\Http\Controllers;
use App\User;
use App\roles;
use Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Gate::allows('see_all_users')) {
            $users = User::all();

            return view('admin/users', ['users' => $users]);
        }
        return view('/adminpage');
    }

    public function edit($id)
    {
        // get the user
        $user = User::where('id',$id)->first();
        $roles = roles::all();

        if(!$user)
        {
            return redirect('/admin/users');
        }
        return view('admin/users/edit')->with('user', $user)->with('roles', $roles);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->roles()->sync($request->get('role', []));
        return redirect('/admin/users');
    }
    public function show($id)
    {
        $users = User::where('id',$id)->first();


        if(!$users)
        {
            return redirect('/admin/users');
        }
        return view('/admin/users/show')->withUser($users);

    }

    public function create()
    {
        if (Gate::allows('create_user')){

            $users = User::all();

            return view('admin/users/create', ['users' => $users]);
        }
        return view('/adminpage');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|unique:users|min:3|max:255',
            'email' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();

        User::create($input);

        return redirect('/admin/users');

    }
    public function destroy($id)
    {
        $user = User::findorFail($id);

        $user->delete();

        return redirect('/admin/users');
    }


}