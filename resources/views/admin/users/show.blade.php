@extends('layouts.admin')

@section('title', 'User')
@section('content')
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li><a href="/admin/users">Users</a></li>
        <li class="active"><a href="/admin/users/{{ $user->id }}">{{ $user->name }}</a></li>
    </ol>

    <h1>{{ $user->name }}</h1>
    <!-------Table to show all the users------>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Roles</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                @foreach($user->roles as $role)
                    {{ $role->name }}
                @endforeach
            </td>
            <td>
                <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-primary">Update User</a>
            </td>
            <td>
                <!--------Delete Form-------->
                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
                {!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        </tbody>
    </table>
@endsection