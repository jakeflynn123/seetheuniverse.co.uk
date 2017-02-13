@extends('layouts.admin')

@section('title', 'Edit User')
@section('content')
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li><a href="/admin/users">Users</a></li>
        <li><a href="/admin/users/{{ $user->id }}">{{ $user->name }}</a></li>
        <li class="active"><a href="/admin/users/{{ $user->id }}/edit">Edit {{ $user->name }}</a></li>
    </ol>
    <!----Checks for errors----->
    <h1>Edit User - {{$user->name }}</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--------Form to edit a user------>
    {!! Form::model($user, ['method' => 'PATCH', 'url' => '/admin/users/' . $user->id]) !!}
    <div class="row col-lg-12 columns">
        {!! Form::label('name', 'Username:') !!}
        {!! Form::text('name', null) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('email', 'Email Address:') !!}
        {!! Form::textarea('email', null) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', null) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('roles', 'Roles:') !!}
        @foreach($roles as $role)
            {{ Form::label($role->name) }}
            {{ Form::checkbox('role[]', $role->id, $user->roles->contains($role->id), ['id' => $role->id]) }}
        @endforeach

    </div>

    <div class="row col-lg-4 columns">
        {!! Form::submit('Update User and Roles', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection