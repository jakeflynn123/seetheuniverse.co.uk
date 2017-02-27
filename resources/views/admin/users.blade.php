@extends('layouts.admin')

@section('title', 'All Users')
@section('content')
    <div class="container">
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li class="active"><a href="/admin/users">Users</a></li>
    </ol>
    <!-------Header with create button-------->
    <header class="row">
        <div class="col-lg-10">
            <h1>All Users</h1>
        </div>
        <div class="col-lg-2">
            <a href="/admin/users/create" class="btn btn-success buffer-top"> Create a User</a>
        </div>
    </header>
    <section>
        <!-----if any users exist display them in this table if not display no users--->
        @if (isset ($users))

            <table class="table table-bordered">
                <tr>
                    <th>Username</th>
                    <th>email</th>
                    <th>Role</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td><a href="/admin/users/{{ $user->id }}" name="{{ $user->name }}">{{ $user->name }}</a></td>
                        <td> {{ $user->email }}</td>
                        <td>
                            <ul>
                                @foreach($user->roles as $role)
                                    <li>{{ $role->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>no users</p>
        @endif
    </section>
    </div>
@endsection