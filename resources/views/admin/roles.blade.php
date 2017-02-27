@extends('layouts.admin')

@section('title', 'All Roles')
@section('content')
    <div class="container">
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li class="active"><a href="/admin/roles">Roles</a></li>
    </ol>
    <!-------Header with create button-------->
    <header class="row">
        <div class="col-lg-10">
            <h1>All Roles</h1>
        </div>
        <div class="col-lg-2">
            <a href="/admin/roles/create" class="btn btn-success buffer-top"> Create a Role</a>
        </div>
    </header>
    <section>
        <!-----if any roles exist display them in this table if not display no roles--->
        @if (isset ($roles))

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Role</th>
                    <th>Role Detail</th>
                    <th>Permissions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td><a href="/admin/roles/{{ $role->id }}" name="{{ $role->name }}">{{ $role->name }}</a></td>
                        <td>{{ $role->detail }}</td>
                        <td>
                            <ul>
                                @foreach($role->permissions as $permission)
                                    <li>{{ $permission->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>no roles</p>
        @endif
    </section>
    </div>
@endsection