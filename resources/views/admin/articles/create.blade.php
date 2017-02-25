@extends('layouts.admin')

@section('title', 'Create a Article')
@section('content')
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/adminpage">Home</a></li>
        <li><a href="/admin/articles">Articles</a></li>
        <li class="active"><a href="/admin/articles/create">Create</a></li>
    </ol>
    <h1>Create an Article</h1>
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
    <!--------Form to create a article------>
    {!! Form::open(array('action' => 'ArticleController@store', 'class' => 'createarticle')) !!}
    {{ csrf_field() }}

    <div class="row col-lg-12 columns">
        {!! Form::label('title', 'Name:') !!}
        {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('content', 'Detail:') !!}
        {!! Form::textarea('content', null, ['class' => 'large-8 columns ']) !!}
    </div>

    <div class="row col-lg-4 columns">
        {!! Form::submit('Create Article', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
@endsection
