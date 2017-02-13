<?php

namespace App\Http\Controllers;
use Gate;

use Illuminate\Http\Request;
use App\roles;
use App\permissions;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
* Secure the set of pages to the admin.
*/
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Gate::allows('see_all_roles')){

            $roles = roles::all();

            return view('admin/roles', ['roles' => $roles]);
        }
        return view('/adminpage');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('create_role')){

            $roles = roles::all();

            return view('admin/roles/create', ['roles' => $roles]);
        }
        return view('/adminpage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $this->validate($request, [
            'name' => 'bail|required|unique:users|min:3|max:255',
            'detail' => 'required',
        ]);

        $input = $request->all();

        roles::create($input);

        return redirect('admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = roles::where('id',$id)->first();


        if(!$roles)
        {
            return redirect('/admin/roles');
        }
        return view('/admin/roles/show')->withroles($roles);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = roles::where('id',$id)->first();
        $permissions = permissions::all();

        if(!$roles)
        {
            return redirect('/admin/roles');
        }
        return view('admin/roles/edit')->with('roles', $roles)->with('permissions', $permissions);
    }

    public function update(Request $request, $id)
    {
        $roles = roles::findOrFail($id);

        $roles->permissions()->sync($request->get('permission', []));

        return redirect('/admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findorFail($id);

        $role->delete();

        return redirect('/admin/roles');
    }
}