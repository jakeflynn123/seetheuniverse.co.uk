@extends('layouts.admin')

@section('title', 'Articles')
@section('content')
    <div class="container">
    <!-----Breadcrumb header-------->
    <ol class="breadcrumb">
        <li><a href="/home">Home</a></li>
        <li class="active"><a href="/admin/articles">Articles</a></li>
    </ol>
    <!-------Header with create button-------->
    <header class="row">
        <div class="col-md-8">
            <h1>All Articles</h1>
        </div>
        <div class="col-md-4">
            <a href="/admin/articles/create" class="btn btn-success buffer-top"> Create a Article</a>
        </div>
    </header>
    <section>
        <!-----if any roles exist display them in this table if not display no roles--->
        @if (isset ($articles))

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Article</th>
                    <th>Article Content</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td><a href="/admin/articles/{{ $article->id }}" title="{{ $article->title }}">{{ $article->title }}</a></td>
                        <td>{{ $article->content }}</td>
                        <td>
                            <ul>
                                @foreach($article->categories as $category)
                                    <li>{{ $category->title }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>no articles</p>
        @endif
    </section>
    </div>
@endsection