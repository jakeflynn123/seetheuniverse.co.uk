@extends('layouts.admin')

@section('title', 'Category')
@section('content')
    <div class="container">
        <!-----Breadcrumb header-------->
        <ol class="breadcrumb">
            <li><a href="/home">Home</a></li>
            <li><a href="/admin/categories">categories</a></li>
            <li class="active"><a href="/admin/categories/{{ $categories->id }}">{{ $categories->title }}</a></li>
        </ol>

        <h1>{{ $categories->title}}</h1>
        <!-------Table to show all the articles------>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Category Title</th>
                <th>Category Content</th>
                <th>Articles</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    {{ $categories->title }}
                </td>
                <td>
                    {{ $categories->content }}
                </td>
                <td>
                    <ul>
                        @foreach($categories->articles as $article)
                            <li>{{ $article->title }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a href="/admin/categories/{{ $categories->id }}/edit" class="btn btn-primary">Update Category</a>
                </td>
                <td>
                    <!--------Delete Form-------->
                    {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $categories->id]]) !!}
                    {!! Form::submit('Delete Category', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection