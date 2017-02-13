@extends('layouts.admin')

@section('title', 'Create User')
@section('content')
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li><a href="/admin/users">Users</a></li>
        <li class="active"><a href="/admin/users/create">Create</a></li>
    </ol>
    <h1>Create a User</h1>
    <!----Checks for errors----->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--------Form to create a user------>
    {!! Form::open(array('action' => 'UserController@store', 'class' => 'createuser')) !!}
    {{ csrf_field() }}

    <div class="row col-lg-12">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'large-8 columns']) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' => 'large-8 columns ']) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', null, ['class' => 'large-8 columns ']) !!}
    </div>

    <div class="row col-lg-4 columns">
        {!! Form::submit('Add User', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

@endsection