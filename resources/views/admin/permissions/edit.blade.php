@extends('layouts.admin')

@section('title', 'Edit Permission')
@section('content')
    <div class="container">
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/adminpage">Home</a></li>
        <li><a href="/admin/permissions">Permissions</a></li>
        <li><a href="/admin/permissions/{{ $permissions->id }}">{{ $permissions->name }}</a></li>
        <li class="active"><a href="/admin/permissions/{{ $permissions->id }}/edit">Edit {{ $permissions->name }}</a></li>
    </ol>
    <!----Checks for errors----->
    <h1>Edit - {{ $permissions->name }}</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--------Form to edit a permission------>
    {!! Form::model($permissions, ['method' => 'PATCH', 'url' => '/admin/permissions/' . $permissions->id]) !!}

    <div class="row col-lg-12 columns">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('detail', 'Detail:') !!}
        {!! Form::textarea('detail', null) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('roles', 'Roles:') !!}
        @foreach($roles as $role)
            {{ Form::label($role->name) }}
            {{ Form::checkbox('role[]', $role->id, $permissions->roles->contains($role->id), ['id' => $role->id]) }}
        @endforeach

    </div>

    <div class="row col-lg-4 columns">
        {!! Form::submit('Update Permission and Roles', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    </div>
@endsection
