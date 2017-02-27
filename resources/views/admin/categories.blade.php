@extends('layouts.admin')

@section('title', 'Categories')
@section('content')
    <div class="container">
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li class="active"><a href="/admin/categories">Categories</a></li>
    </ol>
    <!-------Header with create button-------->
    <header class="row">
        <div class="col-md-8">
            <h1>All Categories</h1>
        </div>
        <div class="col-md-4">
            <a href="/admin/categories/create" class="btn btn-success buffer-top"> Create a Category</a>
        </div>
    </header>
    <section>
        <!-----if any roles exist display them in this table if not display no roles--->
        @if (isset ($categories))

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Category</th>
                    <th>Category Content</th>
                    <th>Articles</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td><a href="/admin/categories/{{ $category->id }}" title="{{ $category->title }}">{{ $category->title }}</a></td>
                        <td>{{ $category->content }}</td>
                        <td>
                            <ul>
                                @foreach($category->articles as $article)
                                    <li>{{ $article->title }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>no categories</p>
        @endif
    </section>
    </div>
@endsection