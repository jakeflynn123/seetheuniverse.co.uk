<?php

namespace App\Http\Controllers;
use Gate;

use Illuminate\Http\Request;
use App\permissions;
use App\roles;

class PermissionController extends Controller
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

    /*default page for permissions*/
    public function index()
    {
        /*checks if user has this permission*/
        if (Gate::allows('see_all_permissions')){

            $permissions = permissions::all();

            return view('admin/permissions', ['permissions' => $permissions]);
        }
        return view('/adminpage');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*create page for permissions*/

    public function create()
    {
        /*checks if user has this permission*/
        if (Gate::allows('create_permission')){

            $permissions = permissions::all();

            return view('admin/permissions/create', ['permissions' => $permissions]);
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
        /*validates the form to stop blank fields*/
        $this->validate($request, [
            'name' => 'bail|required|unique:users|min:3|max:255',
            'detail' => 'required',
        ]);
        /*where to store it*/
        $input = $request->all();

        permissions::create($input);

        return redirect('admin/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*for the permissions show page*/
        $permissions = permissions::where('id',$id)->first();


        if(!$permissions)
        {
            return redirect('/admin/permissions');
        }
        return view('/admin/permissions/show')->withpermissions($permissions);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*edit function for permissions*/
        $permissions = permissions::where('id',$id)->first();
        $roles = roles::all();

        if(!$permissions)
        {
            return redirect('/admin/permissions');
        }
        return view('admin/permissions/edit')->with('permissions', $permissions)->with('roles', $roles);
    }

    public function update(Request $request, $id)
    {
        /*update function for permissions*/
        $permissions = permissions::findOrFail($id);
        $roles = $request->get('role');

        $permissions->roles()->sync($roles);

        return redirect('/admin/permissions');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*delete function for permissions*/
        $permission = permissions::findorFail($id);

        $permission->delete();

        return redirect('/admin/permissions');
    }
}