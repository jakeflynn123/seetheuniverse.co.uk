@extends('layouts.admin')

@section('title', 'Edit Category')
@section('content')
    <div class="container">
        <!-----Breadcrumb header-------->
        <ol class="breadcrumb">
            <li><a href="/adminpage">Home</a></li>
            <li><a href="/admin/categories">Categories</a></li>
            <li><a href="/admin/categories/{{ $categories->id }}">{{ $categories->title }}</a></li>
            <li class="active"><a href="/admin/categories/{{ $categories->id }}/edit">Edit {{ $categories->title }}</a></li>
        </ol>
        <!----Checks for errors----->
        <h1>Edit - {{ $categories->title }}</h1>
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
            <!--------Form to edit a category------>
            {!! Form::model($categories, ['method' => 'PATCH', 'url' => '/admin/categories/' . $categories->id]) !!}

            <div class="row col-lg-12 columns">
                {!! Form::label('title', 'Name:') !!}
                {!! Form::text('title', null) !!}
            </div>

            <div class="row col-lg-12 columns">
                {!! Form::label('content', 'Detail:') !!}
                {!! Form::textarea('content', null) !!}
            </div>

            <div class="row col-lg-12 columns">
                {!! Form::label('articles', 'Article:') !!}
                @foreach($articles as $article)
                    {{ Form::label($article->title) }}
                    {{ Form::checkbox('article[]', $article->id, $categories->articles->contains($article->id), ['id' => $article->id]) }}
                @endforeach

            </div>
        </div>
        <div class="row col-lg-4 columns">
            {!! Form::submit('Update Articles and Category', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
