@extends('layouts.master')

@section('title', 'Weekly Segments')
@section('content')
  <div class="col-lg-12 noborder">
    <div class="col-lg-12 border">
      <h1><u>Weekly Segments</u></h1>
      <section>
        @if (isset ($articles))
            @foreach ($articles as $article)
            <div class="col-lg-12 noborder">
              <div class="col-lg-12 border">
              <h1>{{ $article->title }}</h1>
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
