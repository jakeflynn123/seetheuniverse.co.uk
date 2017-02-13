@extends('layouts.admin')

@section('title', 'Permission')
@section('content')
<!-----Breadcrumb header-------->
<ol class="breadcrumb">
    <li><a href="/home">Home</a></li>
    <li><a href="/admin/permissions">Permissions</a></li>
    <li class="active"><a href="/admin/permissions/{{ $permissions->id }}">{{ $permissions->name }}</a></li>
</ol>

<h1>{{ $permissions->name }}</h1>
<!-------Table to show all the permissions------>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Permission Name</th>
        <th>Permission Detail</th>
        <th>Roles</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            {{ $permissions->name }}
        </td>
        <td>
            {{ $permissions->detail }}
        </td>
        <td>
            <ul>
                @foreach($permissions->roles as $role)
                    <li>{{ $role->name }}</li>
                @endforeach
            </ul>
        </td>
        <td>
            <a href="/admin/permissions/{{ $permissions->id }}/edit" class="btn btn-primary">Update Permission</a>
        </td>
        <td>
            <!--------Delete Form-------->
            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permissions->id]]) !!}
            {!! Form::submit('Delete Permission', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    </tbody>
</table>
@endsection