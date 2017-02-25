@extends('layouts.admin')

@section('title', 'Article')
@section('content')
    <div class="container">
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li><a href="/admin/articles">articles</a></li>
        <li class="active"><a href="/admin/articles/{{ $articles->id }}">{{ $articles->title }}</a></li>
    </ol>

    <h1>{{ $articles->title}}</h1>
    <!-------Table to show all the articles------>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Article Title</th>
            <th>Article Content</th>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                {{ $articles->title }}
            </td>
            <td>
                {{ $articles->content }}
            </td>
            <td>
                <ul>
                    @foreach($articles->categories as $category)
                        <li>{{ $category->title }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <a href="/admin/articles/{{ $articles->id }}/edit" class="btn btn-primary">Update Article</a>
            </td>
            <td>
                <!--------Delete Form-------->
                {!! Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $articles->id]]) !!}
                {!! Form::submit('Delete Article', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        </tbody>
    </table>
    </div>
@endsection