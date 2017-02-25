@extends('layouts.master')

@section('title', 'Weekly Segments')
@section('content')
    <div class="col-lg-12 noborder">
        <div class="col-lg-12 border">
            <h1><u>Weekly Segments</u></h1>
            <section>
                @if (isset ($categories))
                    @foreach ($categories as $category)
                        <div class="col-lg-4 noborder">
                            <div class="col-lg-12 border">
                                <h1><a href="/segments/{{ $category->id }}" title="{{ $category->title }}">{{ $category->title }}</a></h1>
                                <p>{{ $category->content }}</p>
                                {{ $category->author }}
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
