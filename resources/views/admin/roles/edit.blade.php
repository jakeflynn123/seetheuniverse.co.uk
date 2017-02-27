@extends('layouts.admin')

@section('title', 'Edit Role')
@section('content')
    <div class="container">
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li><a href="/admin/roles">Roles</a></li>
        <li><a href="/admin/roles/{{ $roles->id }}">{{ $roles->name }}</a></li>
        <li class="active"><a href="/admin/roles/{{ $roles->id }}/edit">Edit {{ $roles->name }}</a></li>
    </ol>
    <h1>Edit - {{ $roles->name }}</h1>
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
    <!--------Form to edit a role------>
    {!! Form::model($roles, ['method' => 'PATCH', 'url' => '/admin/roles/' . $roles->id]) !!}

    <div class="col-lg-12">
        {!! Form::label('name', 'Role:') !!}
        {!! Form::text('name', null) !!}
    </div>

    <div class="col-lg-12">
        {!! Form::label('detail', 'Detail:') !!}
        {!! Form::text('detail', null) !!}
    </div>

    <div class="col-lg-12">
        {!! Form::label('permissions', 'Permissions:') !!}
        @foreach($permissions as $permission)
            {{ Form::label($permission->name) }}
            {{ Form::checkbox('permission[]', $permission->id, $roles->permissions->contains($permission->id), ['id' => $permission->id]) }}
        @endforeach

    </div>

    <div class="col-lg-4">
        {!! Form::submit('Update Roles and Permissions', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    </div>
@endsection