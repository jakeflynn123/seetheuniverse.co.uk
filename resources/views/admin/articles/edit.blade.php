@extends('layouts.admin')

@section('title', 'Edit Article')
@section('content')
    <div class="container">
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/adminpage">Home</a></li>
        <li><a href="/admin/articles">Permissions</a></li>
        <li><a href="/admin/articles/{{ $articles->id }}">{{ $articles->title }}</a></li>
        <li class="active"><a href="/admin/articles/{{ $articles->id }}/edit">Edit {{ $articles->title }}</a></li>
    </ol>
    <!----Checks for errors----->
    <h1>Edit - {{ $articles->title }}</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="container">
    <!--------Form to edit a permission------>
    {!! Form::model($articles, ['method' => 'PATCH', 'url' => '/admin/articles/' . $articles->id]) !!}

    <div class="row col-lg-12 columns">
        {!! Form::label('title', 'Name:') !!}
        {!! Form::text('title', null) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('content', 'Detail:') !!}
        {!! Form::textarea('content', null) !!}
    </div>

    <div class="row col-lg-12 columns">
        {!! Form::label('categories', 'Category:') !!}
        @foreach($categories as $category)
            {{ Form::label($category->title) }}
            {{ Form::select('category[]', $category->id, $articles->categories->contains($category->id), ['id' => $category->id]) }}
        @endforeach

    </div>
        </div>
    <div class="row col-lg-4 columns">
        {!! Form::submit('Update Articles and Category', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    </div>
@endsection
