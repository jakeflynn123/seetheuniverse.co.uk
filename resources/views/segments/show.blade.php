@extends('layouts.master')

@section('title', 'Articles')
@section('content')
    <div class="col-lg-12 noborder">
        <div class="col-lg-12 border">
            <h1><u>Articles</u></h1>
            <section>
                @if (isset ($categories->articles))
                    @foreach ($categories->articles as $article)
                        <div class="col-lg-12 noborder">
                            <div class="col-lg-12 border">
                                <h1><a href="/articles/{{ $article->id }}" title="{{ $article->title }}">{{ $article->title }}</a></h1>
                                <p>{{ $article->content }}</p>
                                {{ $article->author }}
                            </div>
                        </div>
                    @endforeach
                @else
                    <p> No Articles Added Yet </p>
                @endif
            </section>
        </div>
    </div>
@endsection
