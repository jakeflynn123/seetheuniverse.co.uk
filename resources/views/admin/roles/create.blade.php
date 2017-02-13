@extends('layouts.admin')

@section('title', 'Create Role')
@section('content')
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/adminpage">Home</a></li>
        <li><a href="/admin/roles">Roles</a></li>
        <li class="active"><a href="/admin/roles/create">Create</a></li>
    </ol>
    <h1>Create a Role</h1>
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
    <!--------Form to create a role------>
    {!! Form::open(array('action' => 'RoleController@store', 'class' => 'createrole')) !!}
    {{ csrf_field() }}

    <div class="row col-lg-12 columns">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'large-8 columns']) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('detail', 'Detail:') !!}
        {!! Form::textarea('detail', null, ['class' => 'large-8 columns ']) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::submit('Add Role', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
@endsection
