@extends('layouts.admin')

@section('title', 'Create Permission')
@section('content')
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/adminpage">Home</a></li>
        <li><a href="/admin/permissions">Permissions</a></li>
        <li class="active"><a href="/admin/permissions/create">Create</a></li>
    </ol>
    <h1>Create a Permission</h1>
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
    <!--------Form to create a permission------>
    {!! Form::open(array('action' => 'PermissionController@store', 'class' => 'createpermission')) !!}
    {{ csrf_field() }}

    <div class="row col-lg-12 columns">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'large-8 columns']) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('detail', 'Detail:') !!}
        {!! Form::textarea('detail', null, ['class' => 'large-8 columns ']) !!}
    </div>

    <div class="row col-lg-4 columns">
        {!! Form::submit('Add Permission', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
@endsection
