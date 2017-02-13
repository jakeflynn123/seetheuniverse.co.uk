@extends('layouts.admin')

@section('title', 'Role')
@section('content')
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/adminhome">Home</a></li>
        <li><a href="/admin/roles">Roles</a></li>
        <li class="active"><a href="/admin/roles/{{ $roles->id }}">{{ $roles->name }}</a></li>
    </ol>
    <h1>{{ $roles->name }}</h1>
    <!-------Table to show all the roles------>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Role Name</th>
            <th>Role Detail</th>
            <th>Permissions</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                {{ $roles->name }}
            </td>
            <td>
                {{ $roles->detail }}
            </td>
            <td>
                <ul>
                    @foreach($roles->permissions as $permission)
                        <li>{{ $permission->name }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <a href="/admin/roles/{{ $roles->id }}/edit" class="btn btn-primary">Update Role</a>
            </td>
            <td>
                <!--------Delete Form-------->
                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $roles->id]]) !!}
                {!! Form::submit('Delete Role', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        </tbody>
    </table>
@endsection